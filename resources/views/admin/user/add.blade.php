@extends('admin.layout')
@section('content')
<div class="form-w3layouts">
  <div class="row">
    <div class="panel-heading">
      Thêm tài khoản
    </div>
    <form action="{{route("admin-user-postadd")}}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" id="name" name="name" required>
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="text" class="form-control" id="email" name="email" required>
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" class="form-control" id="password" name="password" required>
      </div>
      <div class="form-group">
        <label for="dateofbirth">Date of Birth:</label>
        <input type="date" class="form-control" id="dateofbirth" name="dateofbirth">
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
        <input type="file" class="form-control"name="image">
      </div>
      <div class="form-group">
        <label for="phone">Phone:</label>
        <input type="number" class="form-control" id="phone" name="phone">
      </div>
      <div class="form-group">
        <label for="position">Position:</label>
        <select class="form-control" name="position" id="position">
          <option value="1" >Quản Lí</option>
          <option value="0" selected >Nhân Viên</option>
        </select>
      </div>
      <button type="submit" name="btnadduser"class="btn btn-primary" style="float: left;">Thực Hiện</button>
      <div>
        <a href="{{route("admin-user-index")}}" class="btn btn-warning" style="margin-left: 10px;">Trở Về</a>
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