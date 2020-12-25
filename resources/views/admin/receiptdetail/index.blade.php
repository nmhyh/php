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
          <a href="{{route('admin-receiptdetail-add')}}"  class="btn btn-primary btn-block">Thêm mới</a>
      </div>
  
      <div class="panel-heading">
        Danh sách chi tiết phiếu nhập
      </div>
      <div class="table-responsive">
        <table class="table table-striped b-t b-light">
          <thead>
            <tr>
                <th>Nhà cung cấp</th>
                <th>Sản phẩm</th>
                <th>Số lượng</th>
                <th>Giá</th>
                <th>Sửa</th>
                <th>Tình trạng</th>
                <th>Xóa</th> 
            </tr>
          </thead>
          <tbody>
            @foreach($receiptDetails ?? '' as $receiptDetail)
                <tr>
                    <td>{{$receiptDetail->id_receipt}} </td>
                    <td>{{$receiptDetail->id_product}} </td>
                    <td>{{$receiptDetail->quantity}} </td>
                    <td>{{$receiptDetail->price}} </td>
                    <td><a href="{{route('admin-receiptdetail-getedit', $receiptDetail->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i></a></td>
                    <td>
                        <?php
                        if ($receiptDetail->status == 1)
                        {
                            ?>
                            <a href="{{route("admin-receiptdetail-unactive", $receiptDetail->id)}}" class="btn btn-warning"><i class="fa fa-unlock-alt" id="clock"></i></a>
                        <?php }
                        else if ($receiptDetail->status == 0)
                        { ?>
                            <a href="{{route("admin-receiptdetail-active", $receiptDetail->id)}}" class="btn btn-warning"><i class="fa fa-lock" id="clock"></i></a>
                        <?php }
                        ?>
                    </td>
                    <td><a href="{{route('admin-receiptdetail-destroy', $receiptDetail->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
                </tr>
            @endforeach
          </tbody>
        </table>
        {{$receiptDetails->render()}}
      </div>
    </div>
  </div>
@if(Session::has('message'))
<div class="alert alert-success">
  {{ Session::get('message') }}
</div>
@endif
@stop
  