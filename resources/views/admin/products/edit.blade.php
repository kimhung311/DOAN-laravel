@extends('admin.layouts.master')

{{-- set page title --}}
@section('title', 'Edit Post')

{{-- set breadcrumbName --}}
@section('breadcrumbName', 'Post Management')

{{-- set breadcrumbMenu --}}
@section('breadcrumbMenu', 'Edit Post')

{{-- import file css (private) --}}
@push('css')
    <link rel="stylesheet" href="/admin/css/product/product-edit.css">
@endpush

@section('content')
    <h4>Update Products</h4>
    
    @include('errors.error')
    
    <form action="{{ route('admin.product.update', request()->route('id')) }}" method="post" enctype="multipart/form-data">
        @csrf

        @method('put')

        
        <div class="form-group mb-5">
            <label for="">Post Name</label>
            <input type="text" name="name" placeholder="post name" value="{{ old('name', $product->name) }}" class="form-control">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mb-5">
            <label for="">Post description</label>
            <input type="text" name="description" placeholder="post description" value="{{ old('description', $product->description) }}" class="form-control">
            @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mb-5">
            <label for="">Post images</label>
            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="img-fluid">
            <input type="file" name="image" placeholder="product image" class="form-control">
            @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-group mb-5">
            <label for="">product price</label>
            <input type="text" name="price" placeholder="product price" value="{{ old('price', $product->price) }}" class="form-control">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mb-5">
            <label for="">product status</label>
            <input type="text" name="status" placeholder="product status" value="{{ old('status', $product->status) }}" class="form-control">
            @error('status')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mb-5">
            <label for="">product quantity</label>
            <input type="text" name="quantity" placeholder="product quantity" value="{{ old('quantity', $product->quantity) }}" class="form-control">
            @error('quantity')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mb-5">
            <label for="" value="{{ old('hot', $product->hot) }}">product hot </label>
            <input type="text" name="hot" placeholder="product hot" value="{{ old('hot', $product->hot) }}" class="form-control">
            @error('hot')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-group mb-5">
            <label for="">product Content</label>
            <textarea name="content" rows="5" class="form-control">{{ old('content', $product->product_detail ? $product->product_detail->content : null) }}</textarea>
            @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mb-5">
            <label for="">Product Image</label>
            <input type="file" name="new_url[]" multiple class="form-control">

            {{-- show all image of table product_images --}}
            @if (!empty($product->product_images))
                <ul class="row list-product-image">
                    @foreach ($product->product_images as $url)
                        <li class="col-4">
                            <div class="product-image-group">
                                <img src="{{ asset($url->url) }}" alt="image" class="img-fluid">
                                <input type="hidden" name="url[]" value="{{ $url->url }}">
                                <button type="button" class="btn btn-danger form-control mt-1" onclick="$(this).closest('li').remove()">Remove Image</button>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @endif

            @error('url')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mb-5">
            <label for="">Category</label>
            <select name="category_id" class="form-control">
                <option value=""></option>
                @if(!empty($categories))
                    @foreach ($categories as $categoryId => $categoryName)
                        <option value="{{ $categoryId }}" {{ old('category_id', $product->category_id) == $categoryId ? 'selected' : ''  }}>{{ $categoryName }}</option>
                    @endforeach
                @endif
            </select>
            @error('category_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <a href="{{ route('admin.product.index') }}" class="btn btn-secondary">List Post</a>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>


    </form>
@endsection