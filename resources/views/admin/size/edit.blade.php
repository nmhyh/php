@extends('admin.layout')
@section('content')
<div class="form-w3layouts">
  <div class="row">
    <div class="panel-heading">
      Chỉnh sửa nhà cung cấp
    </div>
    <form action="{{route('admin-size-postedit', $size->id)}}" method="POST">
      {{ csrf_field() }}
      <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" name="name" value="{{$size->name}}">
      </div>
      <button type="submit" name="btn_edit"class="btn btn-primary"  style="float: left;">Thực Hiện</button>
      <div>
        <a href="{{route("admin-size-index")}}" class="btn btn-warning" style="margin-left: 10px;">Trở Về</a>
      </div>
    </form>
  </div>
</div>
@endsection