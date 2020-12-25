@extends('admin.layout')
@section('content')   

<div class="table-agile-info">
  <div class="panel-heading">Tài khoản của tôi</div>

  <div>
      <hr />
      <dl class="row">
          <dt class = "col-sm-2">
            Tên:
          </dt>
          <dd class = "col-sm-10">
            {{$user->name}}
          </dd>
          <dt class = "col-sm-2">
            Email:
          </dt>
          <dd class = "col-sm-10">
            {{$user->email}}
          </dd>
          <dt class="col-sm-2">
            Ngày sinh:
          </dt>
          <dd class = "col-sm-10">
            {{$user->dateofbirth}}
          </dd>
          <dt class = "col-sm-2">
            Giới tính:
          </dt>
          <dd class = "col-sm-10">
            <?php if($user->sex == 'Nam'){echo "Nam";}
            else if($user->sex == 'Nữ'){echo "Nữ";}?>
          </dd>
          <dt class = "col-sm-2">
            Hình ảnh:
          </dt>
          <dd class = "col-sm-10">
            <img src="{{asset('uploads/user/'. $user->image)}}" width="60" />
          </dd>
          <dt class = "col-sm-2">
            Điện thoại:
          </dt>
          <dd class = "col-sm-10">
            {{$user->phone}}
          </dd>
          <dt class = "col-sm-2">
            Vị trí:
          </dt>
          <dd class = "col-sm-10">
            <?php if($user->position == 1){echo "Quản lí";}
            else if($user->position == 0){echo "Nhân viên";}?>
          </dd>
          <dt class = "col-sm-2">
            Trạng Thái:
          </dt>
          <dd class = "col-sm-10">
            <?php if($user->status == 1){echo "Kích hoạt";}
            else if($user->status == 0){echo "Chưa kích hoạt";}?>
          </dd>
          
      </dl>
  </div>
</div>
@stop