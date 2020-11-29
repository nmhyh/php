@extends('admin.layout')
@section('content')
<div class="form-w3layouts">
   <div class="row">
      <div class="panel-heading">
         Thêm loại sản phẩm
      </div>
      <form action="{{route('admin-category-store')}}" method="POST" enctype="multipart/form-data">
         {{ csrf_field() }}
         <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" name="name" required>
         </div>
         <div class="form-group">
            <label for="image">Image:</label>
            <input type="file" class="form-control"name="image">
         </div>
         <div class="form-group">
            <label for="content">Content:</label>
            <textarea class="form-control" name="content" id="contents"></textarea>
         </div>
         <button type="submit" name="btn_add"class="btn btn-primary" style="float: left;">Thực Hiện</button>
         <div>
            <a href="{{route("admin-category-index")}}" class="btn btn-warning" style="margin-left: 10px;">Trở Về</a>
         </div>
      </form>
   </div>
</div>
@if(Session::has('message'))
<div class="alert alert-success">
{{ Session::get('message') }}
</div>
@endif
@endsection