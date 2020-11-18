@extends('admin.layout')
@section('content')
<div class="btn-group" role="group">
  <h2>Danh sách loại sản phẩm</h2>
    <a href="" class="btn btn-primary">Quản lý</a>
    <a href="{{route('admin-caterogy-add')}}" class="btn btn-success">Thêm mới</a>
</div>
<table class="table table-hover">
    <thead>
      <th>Image</th>
      <th>Name</th>
      <th>Created at</th>
      <th>Content</th>
      <th>Edit</th>
      <th>Lock</th>
      <th>Delete</th>
    </thead>
    <tbody>
      @foreach($cate ?? '' as $category)
        <tr>
          <td>{{$category->image}} </td>
          <td>{{$category->name}} </td>
          <td>{{$category->created_at}} </td>
          <td>{{$category->content}} </td>
          <td><a href="{{route('admin-caterogy-getedit',$category->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i></a></td>
          <td><a href="" class="btn btn-warning"><i class="fa fa-lock"></i></a></td>
          <td><a href="{{route('admin-caterogy-destroy', $category->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
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
  