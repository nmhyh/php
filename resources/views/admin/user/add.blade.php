@extends('admin.layout')
@section('content')
<form action="{{route("admin-user-postadd")}}" method="POST">
    {{ csrf_field() }}
  <div class="form-group">
     <label for="name">Name:</label>
     <input type="text" class="form-control" id="name" name="txtname">
  </div>
  <div class="form-group">
     <label for="email">Email:</label>
     <input type="text" class="form-control" id="email" name="txtemail">
  </div>
  <div class="form-group">
     <label for="pwd">Password:</label>
     <input type="password" class="form-control" id="pwd" name="txtpassword">
  </div>
  <div class="form-group">
    <label for="dateofbirth">Date of Birth:</label>
    <input type="date" class="form-control" id="dateofbirth" name="txtdateofbirth">
  </div>
  <div class="form-group">
    <label for="sex" style="float: left;">Sex:</label>
    <div class="radio" style="margin-left: 40px;">
      <label><input type="radio" name="optradio" value="Nam" checked>Nam</label>
      <label><input type="radio" name="optradio" value="Nữ">Nữ</label>
    </div>  
  </div>
  <div class="form-group">
    <label for="image">Image:</label>
    <input type="file" class="form-control"name="txtimage">
  </div>
  <div class="form-group">
    <label for="phone">Phone:</label>
    <input type="number" class="form-control" id="phone" name="txtphone">
  </div>
  <div class="form-group">
    <label for="position">Position:</label>
    <select class="form-control" name="txtposition" id="position">
      <option value="1" >Quản Lí</option>
      <option value="0" selected >Nhân Viên</option>
    </select>
  </div>
   <button type="submit" name="btnadduser"class="btn btn-primary">Thực Hiện</button>
 </form>
@if(Session::has('message'))
<div class="alert alert-success">
{{ Session::get('message') }}
</div>
@endif
@endsection