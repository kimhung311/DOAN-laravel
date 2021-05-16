@extends('admin.layouts.master')


{{-- import file css (private) --}}
@push('css')
    <link rel="stylesheet" href="/admin/css/product/product-create.css">
@endpush
 
@section('content')
    
    @include('errors.error')
    {{-- url('admin/user/update/'.$users->id) --}}
    <form action="{{ route('admin.user.update', $users->id) }}" method="post">
        @csrf
        @method('PUT')
        {{-- <input name="_method" type="hidden" value="PUT"> --}}
        <div class="form-group mb-5">
            <label for="">User Name</label>
            <h2>{{$users->name}}</h2>
        </div>
        <div class="form-group mb-5">
            <label for="">Email</label>
            <h1>{{$users->email}}</h1>
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mb-5">
            <label for="">Old Password</label>
            <input type="password" value="{{ old('password', $users->password) }}" placeholder=" Enter password" class="form-control">
            <label for="">New Password</label>
            <input type="password" name="password" placeholder=" Enter new password" class="form-control">
            @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mb-5">
            <label for="">phone_number</label>
            <input type="text" name="phone_number" value="{{old('phone_number',$users->phone_number)}}" placeholder=" Enter phone_number" class="form-control">
            <label for="">New phone_number</label>
            <input type="text" name="phone_number" placeholder=" Enter new phone_number" class="form-control">
            @error('phone_number')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection