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
          <a href="{{route('admin-orderdetail-add')}}"  class="btn btn-primary btn-block">Thêm mới</a>
      </div>
  
      <div class="panel-heading">
        Danh sách chi tiết hóa đơn
      </div>
      <div class="table-responsive">
        <table class="table table-striped b-t b-light">
          <thead>
            <tr>
                <th>Hóa đơn</th>
                <th>Sản phẩm</th>
                <th>Số lượng</th>
                <th>Sửa</th>
                <th>Tình trạng</th>
                <th>Xóa</th> 
            </tr>
          </thead>
          <tbody>
            @foreach($orderDetails ?? '' as $orderDetail)
                <tr>
                    <td>{{$orderDetail->id_order}} </td>
                    <td>{{$orderDetail->id_product}} </td>
                    <td>{{$orderDetail->quantity}} </td>
                    <td><a href="{{route('admin-orderdetail-getedit', $orderDetail->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i></a></td>
                    <td>
                        <?php
                        if ($orderDetail->status == 1)
                        {
                            ?>
                            <a href="{{route("admin-orderdetail-unactive", $orderDetail->id)}}" class="btn btn-warning"><i class="fa fa-unlock-alt" id="clock"></i></a>
                        <?php }
                        else if ($orderDetail->status == 0)
                        { ?>
                            <a href="{{route("admin-orderdetail-active", $orderDetail->id)}}" class="btn btn-warning"><i class="fa fa-lock" id="clock"></i></a>
                        <?php }
                        ?>
                    </td>
                    <td><a href="{{route('admin-orderdetail-destroy', $orderDetail->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
                </tr>
            @endforeach
          </tbody>
        </table>
        {{$orderDetails->render()}}
      </div>
    </div>
  </div>
@if(Session::has('message'))
<div class="alert alert-success">
  {{ Session::get('message') }}
</div>
@endif
@stop
  