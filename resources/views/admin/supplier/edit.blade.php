@extends('admin.layout')
@section('content')
<div class="form-w3layouts">
  <div class="row">
    <div class="panel-heading">
      Chỉnh sửa nhà cung cấp
    </div>
    <form action="{{route('admin-supplier-postedit', $supplier->id)}}" method="POST">
      {{ csrf_field() }}
      <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" name="name" value="{{$supplier->name}}">
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="text" class="form-control" name="email" value="{{$supplier->email}}">
      </div>
      <div class="form-group">
        <label for="phone">Phone:</label>
        <input type="number" class="form-control" name="phone" value="{{$supplier->phone}}">
      </div>
      <button type="submit" name="btn_edit"class="btn btn-primary"  style="float: left;">Thực Hiện</button>
      <div>
        <a href="{{route("admin-supplier-index")}}" class="btn btn-warning" style="margin-left: 10px;">Trở Về</a>
      </div>
    </form>
  </div>
</div>
@endsection