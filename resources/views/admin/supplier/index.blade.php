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
        <a href="{{route('admin-supplier-add')}}"  class="btn btn-primary btn-block">Thêm mới</a>
    </div>

    <div class="panel-heading">
      Danh sách nhà cung cấp
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Tên</th>
            <th>Ngày tạo</th>
            <th>Email</th>
            <th>Điện thoại</th>
            <th>Sửa</th>
            <th>Tình trạng</th>
            <th>Xóa</th>
          </tr>
        </thead>
        <tbody>
          @foreach($suppliers ?? '' as $supplier)
          <tr>
            <td>{{$supplier->name}} </td>
            <td>{{$supplier->created_at}} </td>
            <td>{{$supplier->email}} </td>
            <td>{{$supplier->phone}} </td>
            <td>
              <a href="{{route('admin-supplier-getedit', $supplier->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
            </td>
            <td>
              <?php
              if ($supplier->status == 1)
              {
                ?>
                  <a href="{{route("admin-supplier-unactive", $supplier->id)}}" class="btn btn-warning"><i class="fa fa-unlock-alt" id="clock"></i></a>
              <?php }
              else if ($supplier->status == 0)
              { ?>
                  <a href="{{route("admin-supplier-active", $supplier->id)}}" class="btn btn-warning"><i class="fa fa-lock" id="clock"></i></a>
              <?php }
              ?>
            </td>
            <td>
              <a href="{{route('admin-supplier-destroy', $supplier->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {{$suppliers->render()}}
    </div>
  </div>
</div>
@if(Session::has('message'))
<div class="alert alert-success">
  {{ Session::get('message') }}
</div>
@endif
@stop
  