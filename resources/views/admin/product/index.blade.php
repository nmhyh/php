@extends('admin.layout')
@section('content')
<div class="btn-group" role="group">
<h2>Danh sách sản phẩm</h2>
    <a href="" class="btn btn-primary">Quản lý</a>
    <a href="{{route("admin-product-add")}}" class="btn btn-success">Thêm mới</a>
</div>
<table class="table table-hover">
    <thead>
    <th>Idcat</th>
    <th>Image</th>
    <th>Name</th>
    <th>Price</th>
    <th>Discount</th>
    <th>Edit</th>
    <th>Lock</th>
    <th>Delete</th>
    </thead>
    <tbody>
    @foreach($products ?? '' as $product)
        <tr>
            <td>{{$product->idcat}} </td>
            <td>{{$product->image}} </td>
            <td>{{$product->name}} </td>
            <td>{{$product->price}} </td>
            <td>{{$product->discount}} </td>
            <td><a href="{{route('admin-product-getedit', $product->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i></a></td>
            <td><a href="" class="btn btn-warning"><i class="fa fa-lock"></i></a></td>
            <td><a href="{{route('admin-product-destroy', $product->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
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
  