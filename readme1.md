#bây giờ khi DELETE 1 record tức là xóa đi 1 record thì sẽ 
---> xóa mềm tức là bật cờ deleted_at lên (giá trị của nó sẽ là khác NULL, mặc định là NULL )


#khi ở chức năng EDIT thì sẽ có thể xóa hình ảnh cũ nhé 
---> tức là khi ở FORM edit, em chọn 1 hình ảnh mới thì sẽ upload hình ảnh này 
lên và xóa hình ảnh cũ 

<?php
public function destroy($id)
    {
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
            $thumbnail = $product->thumbnail;
            
            // delete data of table product_detail
            $product->product_detail->delete();

            // delete data of table product_images
            ProductImage::where('product_id', $id)
                ->delete();

            // delete data of table products
            $product->delete();

            DB::commit();

            /**
             * Now use SoftDelete so can ignore function delete file
             */
            // // DELETE record into table products OK then delete thumbnail file
            // if (File::exists(public_path($thumbnail))) {
            //     File::delete(public_path($thumbnail));
            // }

            /**
             * Now use SoftDelete so can ignore function delete file
             */
            // // DELETE record into table product_images OK then delete url
            // if (!empty($listProductImages)) {
            //     foreach ($listProductImages as $img) {
            //         if (File::exists(public_path($img))) {
            //             File::delete(public_path($img));
            //         }
            //     }
            // }

            // success
            return redirect()->route('admin.product.index')->with('success', 'Delete successful!');
        } catch (\Exception $ex) {
            DB::rollback();

            return redirect()->back()->with('error', $ex->getMessage());
        }
    }