@extends('admin.layout')
@section('content')
<div class="form-w3layouts">
  <div class="row">
    <div class="panel-heading">
      Chỉnh sửa hóa đơn
    </div>
    <form action="{{route('admin-order-postedit', $order->id)}}" method="POST" enctype="multipart/form-data">
      {{ csrf_field() }}
      <div class="form-group">
        <label for="id_customer">Loại sản phẩn:</label>
           <select name="id_customer" class="form-control">
               @foreach ($customer as $c)
               <option value="{{$c->id}}">{{$c->name}}</option>                     
               @endforeach
           </select>
      </div>
      <div class="form-group">
        <label for="total">Total:</label>
        <input type="text" class="form-control" name="total" value="{{$order->total}}">
      </div>
      <button type="submit" name="btn_editorder"class="btn btn-primary" style="float: left;">Thực Hiện</button>
      <div>
        <a href="{{route("admin-order-index")}}" class="btn btn-warning" style="margin-left: 10px;">Trở Về</a>
    </div>
    </form>
  </div>
</div>
@endsection