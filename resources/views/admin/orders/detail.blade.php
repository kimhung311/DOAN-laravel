@extends('admin.layouts.master')

{{-- set page title --}}
@section('title', 'Detail Order')

{{-- set breadcrumbName --}}
@section('breadcrumbName', 'Order Management')

{{-- set breadcrumbMenu --}}
@section('breadcrumbMenu', 'Detail Order')

{{-- import file css (private) --}}
@push('css')
    <link rel="stylesheet" href="/backend/css/orders/order-list.css">
@endpush

{{-- import file js (private) --}}
@push('js')
    <script src="/backend/js/orders/order-list.js"></script>
@endpush

@section('content')
    {{-- show message --}}
    @include('errors.error')

    {{-- display form edit order --}}
    @include('admin.orders._list_order_detail')
@endsection