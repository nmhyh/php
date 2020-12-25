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
      <a href="{{route("admin-order-add")}}"  class="btn btn-primary btn-block">Thêm mới</a>
    </div>

    <div class="panel-heading">
      Danh sách hóa đơn
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Tổng tiền</th>
            <th>Ngày tạo</th>
            <th>Sửa</th>
            <th>Tình trạng</th>
            <th>Xóa</th>        
          </tr>
        </thead>
        <tbody>
          @foreach($orders ?? '' as $order)
            <tr>
              <td>{{$order->total}} </td>
              <td>{{$order->created_at}} </td>
              <td><a href="{{route('admin-order-getedit',$order->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i></a></td>
              <td>
                <?php
                if ($order->status == 1)
                {
                  ?>
                    <a href="{{route("admin-order-unactive", $order->id)}}" class="btn btn-warning"><i class="fa fa-unlock-alt" id="clock"></i></a>
                <?php }
                else if ($order->status == 0)
                { ?>
                    <a href="{{route("admin-order-active", $order->id)}}" class="btn btn-warning"><i class="fa fa-lock" id="clock"></i></a>
                <?php }
                ?>
              </td>
              <td>
                <a href="{{route('admin-order-destroy', $order->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      {{$orders->render()}}
    </div>
  </div>
</div>
@if(Session::has('message'))
<div class="alert alert-success">
  {{ Session::get('message') }}
</div>
@endif
@stop
  