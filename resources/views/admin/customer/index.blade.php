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
        <a href="{{route('admin-customer-getadd')}}"  class="btn btn-primary btn-block">Thêm mới</a>
    </div>

    <div class="panel-heading">
      Danh sách khách hàng
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
              <th data-breakpoints="xs">Name</th>
              <th>Email</th>
              <th>Ngày sinh</th>
              <th data-breakpoints="xs">Giới tính</th>
          
              <th data-breakpoints="xs sm md" data-title="DOB">Hình ảnh</th>
              <th>Sửa</th>
              <th>Tình trạng</th>
              <th>Xóa</th>
          </tr>
        </thead>
        <tbody>
          @foreach($customers ?? '' as $customer)
          <tr>
          <td>{{$customer->name}} </td>
          <td>{{$customer->email}} </td>
          <td>{{$customer->dateofbirth}} </td>
          <td>{{$customer->sex}} </td>
          <td><img src="{{asset('uploads/customer/'. $customer->image)}}" width="40" /> </td>
          <td><a href="{{route("admin-customer-getedit", $customer->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i></a></td>
          {{-- <td><a href="" class="btn btn-warning"><i class="fa fa-lock"></i></a></td> --}}
          <td>
            <?php
            if ($customer->status == 1)
            {
              ?>
                <a href="{{route("admin-customer-unactive", $customer->id)}}" class="btn btn-warning"><i class="fa fa-unlock-alt" id="clock"></i></a>
            <?php }
            else if ($customer->status == 0)
            { ?>
                <a href="{{route("admin-customer-active", $customer->id)}}" class="btn btn-warning"><i class="fa fa-lock" id="clock"></i></a>
            <?php }
            ?>
          </td>
          <td>
            <a href="{{route("admin-customer-destroy", $customer->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {{$customers->render()}}
    </div>
  </div>
</div>
        

@if(Session::has('message'))
<div class="alert alert-success">
  {{ Session::get('message') }}
</div>
@endif
@stop
  