@extends('admin.layouts.master')

    @section('content')
        <table id="user-list" class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>email</th>
                    <th>email_verified_at</th>
                    {{-- <th>password</th> --}}
                    <th>phone_number</th>
                    <th>address</th>
                    <th>created_at</th>
                    <th colspan="3">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $key=> $user)
                    <tr>
                        <th>{{$key+1}}</th>
                        <th>{{$user->name}}</th>
                        <th>{{$user->email}}</th>
                        <th>{{$user->email_verified_at}}</th>
                        {{-- <th>{{$user->password}}</th> --}}
                        <th>{{$user->phone_number}}</th>
                        <th>{{$user->address}}</th>
                        <th>{{$user->created_at}}</th>
                        <td><a class="btn btn-info" href="{{ route('admin.user.show', $user->id) }}">Detail</a></td>
                        <td><a class="btn btn-success" href=" {{ route('admin.user.edit', $user->id) }}">Edit</a></td>
                        <td>
                            <form action="{{ route('admin.user.destroy', $user->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Delete" class="btn btn-danger" onclick="return confirm('Are you sure DELETE PRODUCT?')" class="btn btn-danger" />
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$users->links()}}
    @endsection    