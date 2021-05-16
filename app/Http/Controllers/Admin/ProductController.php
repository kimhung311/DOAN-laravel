<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use App\Models\ProductDetail;
use App\Http\Requests\Admin\StoreProductRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\Admin\UpdateProductRequest;

class ProductController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request )
    {
        $data = [];
        $product = Product::with('category');
        if (!empty($request->name)) {
            $product = $product->where('name', 'like', '%' . $request->name . '%');
        }
        
        // // search category_name
        if (!empty($request->category_id)) {
            $product = $product->where('category_id', $request->category_id);
        }

        $product = $product->orderBy('id', 'desc');

        // if(!empty($reques->name)){
        //     $products = products->where('name','like','%', $reques->name. '%');
        // }
        // if(!empty($reques->category_id)){
        //     $products
        // }
        $product = $product->paginate(3);
        // get list data of table categories
        $categories = Category::pluck('name')
           ->toArray();
           
        $data['categories'] = $categories;
        // dd($posts);
        $data['products'] = $product;

            return view('admin.products.index',$data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data = [];
        $products = Product::get();
        $data['products'] = $products;

        $categories = Category::pluck('name','id')->toArray();
        $data['categories'] = $categories;

        return view('admin.products.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        //
        $imagesPath = null;
        if ($request->hasFile('image') 
            && $request->file('image')->isValid()) {
            // Nếu có thì thục hiện lưu trữ file vào public/images
            $image = $request->file('image');
            $extension = $request->image->extension();

            $fileName = 'image_' . time() . '.' . $extension;
            $image->move('products', $fileName);
            $imagesPath = 'products/' . $fileName;
        }
        // dd($request->url);
        $listProductImages = [];
        $files = $request->file('url');
        if($request->hasFile('url')) {
            foreach ($files as $file) {
                // Nếu có thì thục hiện lưu trữ file vào public/url
                // $image = $request->file('url');
                $extension = $file->extension();
                $fileName = 'url_' . time() . rand() . '.' . $extension;
                $file->move('product_images', $fileName);
                $listProductImages[] = 'product_images/' . $fileName;
            }
        }

        $dataInsert = [
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imagesPath,
            'price'=> $request->price,
            'hot'=> $request->hot,
            'quantity'=> $request->quantity,
            'status' => $request->status,
            'category_id' => $request->category_id,
        ];

        DB::beginTransaction();

        try {
            // insert into table posts
            $product = Product::create($dataInsert);

            // insert into table post_details
            // todo
            $productDetail = new ProductDetail([
                'content'=> $request->content,
            ]);
            $product->product_detail()->save($productDetail);
            

            // save multiple image for table product_images
            if (!empty($listProductImages)) {
                foreach ($listProductImages as $productImage) {
                    $productImage = new ProductImage([
                        'url'=> $productImage,
                    ]);
                    $product->product_images()->save($productImage);
                }
            }

            DB::commit();

            // success
            return redirect()->route('admin.product.index')->with('success', 'Insert successful!');
        } catch (\Exception $ex) {
            echo $ex->getMessage(); exit();

            DB::rollback();

            return redirect()->back()->with('error', $ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $data = [];
        $product = Product::find($id);
        $data['product'] = $product;
        return view('admin.products.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = [];
        $categories = Category::pluck( 'name','id')
            ->toArray();
        // $post = Post::find($id); // case 1
        $product = Product::findOrFail($id); // case 2
        $data['product'] = $product;
        $data['categories'] = $categories;
        return view('admin.products.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, $id)
    {
        // dd($request->all());
        $product = Product::find($id);
        $productImage = ProductImage::find($id);
        // sao 2 bien deu la $product 
        // em bo vo coi no bao loi gi do thay
        $productDetailId = !empty($product->product_detail) ? $product->product_detail->id : null;
        $imagesOld = $product->image;

        Log::info("img old");
        Log::info($imagesOld);
        Log::info("img old");
        

         // get list product image from DB
         $listProductImageDB = [];
         if (!empty($product->product_images)) {
             foreach ($product->product_images as $img) {
                 $listProductImageDB[] = $img->url;
             }
         }

         // get list product image from FORM
        $listProductImageForm = [];
        if (!empty($request->url)) {
            foreach ($request->url as $img) {
                $listProductImageForm[] = $img;
            }
        }

        // dd($request->all());
        $imagePath = null;
        if ($request->hasFile('image') 
            && $request->file('image')->isValid()) { 
            // Nếu có thì thục hiện lưu trữ file vào public/images
            $image = $request->file('image');
            $extension = $request->image->extension();
            $fileName = 'image_' . time() . '.' . $extension;
            // $imagePath = $image->move('storage/products', $fileName);
            $imagePath = $image->move('products', $fileName);

            $product->image = 'products/' . $fileName;
            Log::info('imagePath: ' . $imagePath);
        }
        Log::info("img url");
        Log::info($imagePath);
        Log::info("img url");

        $listProductImages = [];
        $files = $request->file('url');
        if($request->hasFile('url')) {
            foreach ($files as $file) {
                // Nếu có thì thục hiện lưu trữ file vào public/url
                // $image = $request->file('url');
                $extension = $file->extension();
                $fileName = 'url_' . time() . rand() . '.' . $extension;
                $file->move('product_images', $fileName);
                $listProductImages[] = 'product_images/' . $fileName;
            }
        }
        // update data for table product
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->status = $request->status;
        $product->hot = $request->hot;
        $product->quantity = $request->quantity;
        $product->category_id = $request->category_id;
        
        // lưu bộ nhớ đệm, ko lưu vào DB.
        DB::beginTransaction();

        //dd($imagePath);
        
        try {
            $product->save();

            $dataDetailProduct = [
                'content' => $request->content,
                'product_id' => $id,
            ];

            // create or update data for table post_details
            if (!$productDetailId) { // create
                $productDetail = new ProductDetail($dataDetailProduct);
                $productDetail->save();
            } else { // update
                ProductDetail::find($productDetailId)
                    ->update($dataDetailProduct);
            }

            // create data for table product_images (with image new upload)
            if (!empty($listProductImageUpload)) {
                foreach ($listProductImageUpload as $img) {
                    $dataProductImageSave = [
                        'url' => $img,
                        'product_id' => $product->id,
                    ];
                    ProductImage::create($dataProductImageSave);
                }
            }
            
            DB::commit();

            // SAVE OK then delete OLD file
            if (File::exists(public_path($imagesOld))
                && $imagePath != null) {
                File::delete(public_path($imagesOld));
            }

            // compare data of 2 array (listProductImageForm, listProductImageDB) to get new an array (difference between 2 array)
            $listProductImageDiff = array_diff($listProductImageDB, $listProductImageForm);
            if (!empty($listProductImageDiff)) {
                foreach ($listProductImageDiff as $diff) {
                    ProductImage::where('url', $diff)
                        ->delete();
                    if (File::exists(public_path($diff))) {
                        File::delete(public_path($diff));
                    }
                }
            }

            // success
            return redirect()->route('admin.product.index')->with('success', 'Update successful!');
        } catch (\Exception $ex) {
            
            // DB::rollback();
            
            echo $ex->getMessage();
            // return redirect()->back()->with('error', $ex->getMessage());
            //return redirect()->route('product.index')->with('success', 'Update successful!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        DB::beginTransaction();
        
        try {
            $product = Product::with('product_detail')
                ->with('product_images')
                ->findOrFail($id);

            // get list product image into table product_images with product_id = $id
            $listProductImages = [];
            if (!empty($product->product_images)) {
                foreach ($product->product_images as $value) {
                    $listProductImages[] = $value->url;
                }
            }

            // get thumbnail
            $image = $product->image;
            
            // delete data of table product_detail
            $product->product_detail->delete();

            // delete data of table product_images
            ProductImage::where('product_id', $id)
                ->delete();

            // delete data of table products
            $product->delete();

            DB::commit();
            
            
            // success
            return redirect()->route('admin.product.index')->with('success', 'Delete successful!');
        } catch (\Exception $ex) {
            echo $ex->getMessage();exit;
            DB::rollback();

            return redirect()->back()->with('error', $ex->getMessage());
        }
    }
}

