@extends('admin.layouts.master')

{{-- set page title --}}
@section('title', 'Create User')

{{-- set breadcrumbName --}}
@section('breadcrumbName', 'create user')

{{-- import file css (private) --}}
@push('css')
    <link rel="stylesheet" href="/admin/css/product/product-create.css">
@endpush
 
@section('content')
    <h4>Create User</h4>
    
    @include('errors.error')
    
    <form action="{{ route('admin.user.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-5">
            <label for="">User Name</label>
            <input type="text" name="name" placeholder=" Enter Product name" value="{{ old('name') }}" class="form-control">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mb-5">
            <label for="">Email</label>
            <input type="text" name="email" placeholder=" Enter Product email" value="{{ old('email') }}" class="form-control">
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mb-5">
            <label for="">Password</label>
            <input type="password" name="password" placeholder=" Enter Product password" class="form-control">
            @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mb-5">
            <label for="">phone_number</label>
            <input type="text" name="phone_number" placeholder=" Enter Product phone_number" value="{{ old('phone_number') }}" class="form-control">
            @error('phone_number')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection