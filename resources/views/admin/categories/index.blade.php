@extends('admin.layouts.master')

{{-- set page title --}}
@section('title', 'List Category')

{{-- set breadcrumbName --}}
@section('breadcrumbName', 'Category Management')

{{-- set breadcrumbMenu --}}
@section('breadcrumbMenu', 'List Category')

{{-- import file css (private) --}}
@push('css')
    <link rel="stylesheet" href="/admin/css/categories/category-list.css">
@endpush

@section('content')
    {{-- form search --}}

    {{-- create category link --}}
    {{-- case 1 --}}
    <p><a href="{{ route('admin.category.create') }}">Create</a></p>
    
    {{-- case 2 --}}
    {{-- <p><a href="/category/create">Create</a></p> --}}

    {{-- show message --}}
    @if(Session::has('success'))
        <p class="text-success">{{ Session::get('success') }}</p>
    @endif

    {{-- show error message --}}
    @if(Session::has('error'))
        <p class="text-danger">{{ Session::get('error') }}</p>
    @endif

    {{-- display list category table --}}
    <table id="category-list" class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Category Name</th>
                <th>Parent_id</th>
                <th>List Product</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @if(!empty($categories))
                @foreach ($categories as $key => $category)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->parent_id }}</td>
                        <td><a href="{{ route('admin.product.index', ['category_id' => $category->id]) }}">View List Category</a></td>
                        <td><a href="{{ route('admin.category.show', $category->id) }}">Detail</a></td>
                        <td><a href="{{ route('admin.category.edit', $category->id) }}">Edit</a></td>
                        <td>
                            <form action="{{ route('admin.category.destroy', $category->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="submit" name="submit" value="Delete" class="btn btn-danger">
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
@endsection