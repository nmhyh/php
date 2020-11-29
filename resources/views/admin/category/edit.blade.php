@extends('admin.layout')
@section('content')
<div class="form-w3layouts">
  <div class="row">
    <div class="panel-heading">
      Chỉnh sửa loại sản phẩm
    </div>
    <form action="{{route('admin-category-postedit', $cate->id)}}" method="POST" enctype="multipart/form-data">
      {{ csrf_field() }}
      <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" name="name" value="{{$cate->name}}" required>
    </div>
      <div class="form-group">
        <label for="image">Image:</label>
        <input type="file" class="form-control" name="image" value="{{$cate->image}}">
        <img src="{{asset('uploads/category/'. $cate->image)}}" width="40" />
      </div>
      <div class="form-group">
        <label for="content">Content:</label>
        <textarea class="form-control" name="content" id="contents">{{$cate->content}}</textarea>
      </div>
      <button type="submit" name="btn_editcategory"class="btn btn-primary" style="float: left;">Thực Hiện</button>
      <div>
        <a href="{{route("admin-category-index")}}" class="btn btn-warning" style="margin-left: 10px;">Trở Về</a>
    </div>
    </form>
  </div>
</div>
@endsection