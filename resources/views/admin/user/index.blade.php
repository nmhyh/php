@extends('admin.layout')
@section('content')
<div class="btn-group" role="group">
  <h2>Danh sách tài khoản</h2>
    <a href="" class="btn btn-primary">Quản lý</a>
    <a href="{{route('admin-user-getadd')}}" class="btn btn-success">Thêm mới</a>
</div>
<table class="table table-hover">
    <thead>
    <th>Name</th>
    <th>Email</th>
    <th>Date Of Birth</th>
    <th>Created at</th>
    <th>Sex</th>
    <th>Phone</th>
    <th>Image</th>
    <th>Position</th>
    <th>Edit</th>
    <th>Lock</th>
    <th>Delete</th>
    </thead>
    <tbody>
    @foreach($users ?? '' as $user)
        <tr>
        <td>{{$user->name}} </td>
        <td>{{$user->email}} </td>
        <td>{{$user->dateofbirth}} </td>
        <td>{{$user->created_at}} </td>
        <td>{{$user->sex}} </td>
        <td>{{$user->phone}} </td>
        <td>{{$user->image}} </td>
        <td><?php if($user->position == 1){echo "Quản Lí";} if($user->position == 0){echo"Nhân Viên";}?> </td>
        <td><a href="{{route("admin-user-getedit", $user->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i></a></td>
        <td><a href="" class="btn btn-warning"><i class="fa fa-lock"></i></a></td>
        <td><a href="{{route("admin-user-delete", $user->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
        </tr>
    @endforeach
    </tbody>
</table>
@if(Session::has('message'))
<div class="alert alert-success">
  {{ Session::get('message') }}
</div>
@endif
@stop
  