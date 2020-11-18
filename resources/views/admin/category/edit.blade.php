@extends('admin.layout')
@section('content')
<form action="{{route('admin-caterogy-postedit', $cate->id)}}" method="POST">
  {{ csrf_field() }}
  <div class="form-group">
  <label for="name">Name:</label>
  <input type="text" class="form-control" name="name" value="{{$cate->name}}">
</div>
  <div class="form-group">
    <label for="image">Image:</label>
    <input type="file" class="form-control"name="image"
    value="{{$cate->image}}">
  </div>
  <div class="form-group">
    <label for="content">Content:</label>
    <textarea class="form-control" name="content" id="contents">{{$cate->content}}</textarea>
  </div>
   <button type="submit" name="btn_editcategory"class="btn btn-primary">Thực Hiện</button>
 </form>
@endsection