@extends('admin.layout')
@section('content')
<form action="{{route('admin-caterogy-store')}}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" name="name">
   </div>
   <div class="form-group">
      <label for="image">Image:</label>
      <input type="file" class="form-control"name="image">
   </div>
   <div class="form-group">
      <label for="content">Content:</label>
      <textarea class="form-control" name="content" id="contents"></textarea>
  </div>
   <button type="submit" name="btn_add"class="btn btn-primary">Thực Hiện</button>
 </form>
@if(Session::has('message'))
<div class="alert alert-success">
{{ Session::get('message') }}
</div>
@endif
@endsection