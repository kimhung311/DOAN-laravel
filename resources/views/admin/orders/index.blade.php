@extends('admin.layouts.master')

{{-- set page title --}}
@section('title', 'List Order')

{{-- set breadcrumbName --}}
@section('breadcrumbName', 'Order Management')

{{-- set breadcrumbMenu --}}
@section('breadcrumbMenu', 'List Order')

{{-- import file css (private) --}}
@push('css')
    <link rel="stylesheet" href="/backend/css/orders/order-list.css">
@endpush

{{-- import file js (private) --}}
@push('js')
    <script src="/backend/js/orders/order-list.js"></script>
@endpush

@section('content')
    {{-- form search --}}
    {{-- @include('admin.orders._search') --}}

    {{-- show message --}}
    @include('errors.error')

    {{-- display list order table --}}
    @include('admin.orders._table')

    {{-- modal update order status  --}}
    @include('admin.orders.parts.modal_update_order_status')
@endsection