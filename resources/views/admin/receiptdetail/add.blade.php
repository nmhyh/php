@extends('admin.layout')
@section('content')
<div class="form-w3layouts">
  <div class="row">
    <div class="panel-heading">
      Thêm chi tiết phiếu nhập
    </div>
    <form action="{{route("admin-receiptdetail-store")}}" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
          <label for="id_receipt">Phiếu nhập:</label>
            <select name="id_receipt" class="form-control">
                @foreach ($receipt as $key =>$rep)
                <option value="{{$rep->id}}">{{$rep->name}}</option>   
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
          <input type="text" class="form-control" name="quantity" required>
        </div>
        <div class="form-group">
          <label for="price">Giá:</label>
          <input type="number" class="form-control" name="price" required>
        </div>
        <button type="submit" name="btn_addreceiptdetail"class="btn btn-primary" style="float: left;">Thực Hiện</button>
        <div>
          <a href="{{route("admin-receiptdetail-index")}}" class="btn btn-warning" style="margin-left: 10px;">Trở Về</a>
        </div>
    </form>
  </div>
</div>
 @stop
