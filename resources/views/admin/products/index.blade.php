@extends('admin.layouts.master')

{{-- set page title --}}
@section('title', 'List Product')

{{-- set breadcrumbName --}}
@section('breadcrumbName', 'Post Management')

{{-- set breadcrumbMenu --}}
@section('breadcrumbMenu', 'List Post')

{{-- import file css (private) --}}
@push('css')
    <link rel="stylesheet" href="/admin/css/product/product-list.css">
@endpush

{{-- import file js (private) --}}
@push('js')
    {{-- <script src="/admin/js/posts/post-list.js"></script> --}}
@endpush

@section('content')
    {{-- form search --}}
    @include('admin.products._search')

    {{-- create post link --}}
    {{-- case 1 --}}
    <p ><a  class="btn btn-outline-success" href="{{ route('admin.product.create') }}">Create</a></p>
    
    {{-- case 2 --}}
    {{-- <p><a href="/post/create">Create</a></p> --}}

    {{-- show message --}}
    @if(Session::has('success'))
        <p class="text-success">{{ Session::get('success') }}</p>
    @endif

    {{-- show error message --}}
    @if(Session::has('error'))
        <p class="text-danger">{{ Session::get('error') }}</p>
    @endif

    {{-- display list post table --}}
    <table id="product-list" class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>description</th>
                <th>Images</th>
                <th>Prices</th>
                <th>Status</th>
                <th>Quantity</th>
                <th>Hot</th>
                <th>Category_name</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @if(!empty($products))
                @foreach ($products as $key => $product)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>
                            {{-- <img src="{{ asset($product->images) }}" alt="{{ $product->name }}" class="img-fluid" style="width: 40px; height: auto;"> --}}
                            {{-- <img src="{{asset('storage/products/'.$product->images) }}" alt="{{ $product->name }}" class="img-fluid" style="width: 240px; height: auto;"> --}}
                            <img src="/{{ $product->image }}" alt="{{ $product->name }}" class="img-fluid" style="width: 200px; height: auto;">
                        </td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->status }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>{{ $product->hot }}</td>
                        <td>{{ $product->category->name }}</td>
                        
                        <td><a href="{{ route('admin.product.show', $product->id) }}">Detail</a></td>
                        <td><a href="{{ route('admin.product.edit', $product->id) }}">Edit</a></td>
                        <td>
                            <form action="{{ route('admin.product.destroy', $product->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Delete" class="btn btn-danger" onclick="return confirm('Are you sure DELETE PRODUCT?')" class="btn btn-danger" />
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>

    {{ $products->links() }}
@endsection

