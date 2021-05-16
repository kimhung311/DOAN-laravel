@extends('admin.layouts.master')

{{-- set page title --}}
@section('title', 'Create Product')

{{-- set breadcrumbName --}}
@section('breadcrumbName', 'Product Management')

{{-- set breadcrumbMenu --}}
@section('breadcrumbMenu', 'Create Product')

{{-- import file css (private) --}}
@push('css')
    <link rel="stylesheet" href="/admin/css/product/product-create.css">
@endpush

@section('content')
    <h4>detail Product</h4>
    
    @include('errors.error')
    <h1>{{ $product->name }}</h1>
        <hr>
        {{-- <img src="{{ asset($product->images) }}" alt="{{ $product->name }}" class="img-fluid" style="width: 40px; height: auto;"> --}}
        <img src="/{{ $product->images }}" alt="{{ $product->name }}" class="img-fluid" style="width: 200px; height: auto;">
        <hr>
    <h1>{{ $product->price }}</h1>

    <a href="{{ route('admin.product.index') }}">BACKHOME</a>

@endsection