@extends('admin.layouts.master')

{{-- set page title --}}
@section('title', 'Create Category')

{{-- set breadcrumbName --}}
@section('breadcrumbName', 'Category Management')

{{-- set breadcrumbMenu --}}
@section('breadcrumbMenu', 'Create Category')

{{-- import file css (private) --}}
@push('css')
    <link rel="stylesheet" href="/admin/css/categories/category-create.css">
@endpush

@section('content')
    <h4>Create Category</h4>

    @include('errors.error')
    
    <form action="{{ route('admin.category.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="">Category Name</label>
            <input type="text" name="category_name" placeholder="category name">
        </div>

        <div class="form-group">
            <label for="">Parent_id</label>
            <input type="text" name="parent_id" placeholder="category name">
        </div>

        <div class="form-group">
            <a href="{{ route('admin.category.index') }}" class="btn btn-secondary">List Category</a>
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </form>
@endsection