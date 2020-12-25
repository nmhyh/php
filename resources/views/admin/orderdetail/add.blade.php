@extends('admin.layout')
@section('content')
<div class="form-w3layouts">
  <div class="row">
    <div class="panel-heading">
      Thêm chi tiết hóa đơn
    </div>
    <form action="{{route("admin-orderdetail-store")}}" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
          <label for="id_order">Hóa đơn:</label>
            <select name="id_order" class="form-control">
                @foreach ($order as $key =>$o)
                <option value="{{$o->id}}">{{$o->id}}</option>   
                @endforeach
            </select>
        </div>
        <div class="form-group">
          <label for="id_product">Sản phẩm:</label>
            <select name="id_product" class="form-control">
                @foreach ($products as $key =>$product)
                <option value="{{$product->id}}">{{$product->name}}</option>   
                @endforeach
            </select>
        </div>
        <div class="form-group">
          <label for="quantity">Số lượng:</label>
          <input type="number" class="form-control" name="quantity" required>
        </div>
        <button type="submit" name="btn_addorderdetail"class="btn btn-primary" style="float: left;">Thực Hiện</button>
        <div>
          <a href="{{route("admin-orderdetail-index")}}" class="btn btn-warning" style="margin-left: 10px;">Trở Về</a>
        </div>
    </form>
  </div>
</div>
 @stop
