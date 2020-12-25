@extends('admin.layout')
@section('content')
<style>
  th {
      text-align: center;
  }

  td {
      font-size: 16px;
      text-align: center;
    
  }

  a i #clock{
    font-size: 20px;  
    display: block;
  }

  a i.fa.fa-lock {
      color: red;
  }

  a i.fa.fa-unlock-alt {
      color: #fff;
  }

  .flex{
        text-align: center;
    }
</style>
<div class="table-agile-info">
  <div class="panel panel-default">
    <div>
        <a href="{{route('admin-user-getadd')}}"  class="btn btn-primary btn-block">Thêm mới</a>
    </div>

    <div class="panel-heading">
      Danh sách tài khoản
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
              <th data-breakpoints="xs">ID</th>
              <th>Email</th>
              <th>Ngày sinh</th>
              <th data-breakpoints="xs">Giới tính</th>
          
              <th data-breakpoints="xs sm md" data-title="DOB">Hình ảnh</th>
              <th>Vị trí</th>
              <th>Sửa</th>
              <th>Tình trạng</th>
              <th>Xóa</th>
          </tr>
        </thead>
        <tbody>
          @foreach($users ?? '' as $user)
          <tr>
          <td>{{$user->name}} </td>
          <td>{{$user->email}} </td>
          <td>{{$user->dateofbirth}} </td>
          <td>{{$user->sex}} </td>
          <td><img src="{{asset('uploads/user/'. $user->image)}}" width="40" /> </td>
          <td><?php if($user->position == 1){echo "Quản Lí";} if($user->position == 0){echo"Nhân Viên";}?> </td>
          <td><a href="{{route("admin-user-getedit", $user->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i></a></td>
          {{-- <td><a href="" class="btn btn-warning"><i class="fa fa-lock"></i></a></td> --}}
          <td>
            <?php
            if ($user->status == 1)
            {
              ?>
                <a href="{{route("admin-user-unactive", $user->id)}}" class="btn btn-warning"><i class="fa fa-unlock-alt" id="clock"></i></a>
            <?php }
            else if ($user->status == 0)
            { ?>
                <a href="{{route("admin-user-active", $user->id)}}" class="btn btn-warning"><i class="fa fa-lock" id="clock"></i></a>
            <?php }
            ?>
          </td>
          <td><a href="{{route("admin-user-delete", $user->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {{$users->render()}}
    </div>
  </div>
</div>
@if(Session::has('message'))
<div class="alert alert-success">
  {{ Session::get('message') }}
</div>
@endif
@stop
  