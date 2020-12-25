@extends('admin.layout')
@section('content')
<div class="form-w3layouts">
  <div class="row">
    <div class="panel-heading">
      Thêm sản phẩm
    </div>
    <form action="{{route("admin-product-store")}}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
          <label for="idcat">Loại sản phẩn:</label>
            <select name="idcat" class="form-control">
                @foreach ($category as $key =>$cat)
                <option value="{{$cat->id}}">{{$cat->name}}</option>   
                @endforeach
            </select>
        </div>
        <div class="form-group">
          <label for="idbra">Thương Hiệu:</label>
            <select name="idbra" class="form-control">
                @foreach ($brand as $key =>$bra)
                <option value="{{$bra->id}}">{{$bra->name}}</option>   
                @endforeach
            </select>
        </div>
        <div class="form-group">
          <label for="idsize">Kích cỡ:</label>
            <select name="idsize" class="form-control">
                @foreach ($size as $key =>$s)
                <option value="{{$s->id}}">{{$s->name}}</option>   
                @endforeach
            </select>
        </div>
        <div class="form-group">
          <label for="name">Tên:</label>
          <input type="text" class="form-control" name="name" required>
        </div>
        <div class="form-group">
          <label for="image">Hình ảnh 1:</label>
          <input type="file" class="form-control" name="image">
        </div>
        <div class="form-group">
          <label for="image2">Hình ảnh 2:</label>
          <input type="file" class="form-control" name="image2">
        </div>
        <div class="form-group">
          <label for="image3">Hình ảnh 3:</label>
          <input type="file" class="form-control" name="image3">
        </div>
        <div class="form-group">
          <label for="price">Giá:</label>
          <input type="number" class="form-control" name="price">
        </div>
        <div class="form-group">
          <label for="material">Chất liệu:</label>
          <input type="text" class="form-control" name="material">
        </div>
        <div class="form-group">
          <label for="strap_material">Chất liệu dây đeo:</label>
          <input type="text" class="form-control" name="strap_material">
        </div>
        <div class="form-group">
          <label for="patterns">Hoa văn:</label>
          <input type="text" class="form-control" name="patterns">
        </div>
        <div class="form-group">
          <label for="locktype">Kiểu khóa:</label>
          <select class="form-control" name="locktype" id="locktype">
            <option value="0" >Nút Cài</option>
            <option value="1" >Nút Bấm</option>
            <option value="2" >Khóa Kéo</option>
            <option value="3" >Khóa Đẩy</option>
            <option value="4" >Khóa Khớp</option>
          </select>
        </div>
        <div class="form-group">
          <label for="quantity">Số lượng:</label>
          <input type="text" class="form-control" name="quantity">
        </div>
        <div class="form-group">
          <label for="number_compartments">Số ngăn:</label>
          <input type="text" class="form-control" name="number_compartments">
        </div>
        <div class="form-group">
          <label for="dimensions">Kích thước:</label>
          <input type="text" class="form-control" name="dimensions">
        </div>
        <div class="form-group">
          <label for="color">Màu:</label>
          <input type="text" class="form-control" name="color">
        </div>
        <div class="form-group">
          <label for="discount">Giảm giá:</label>
          <input type="number" class="form-control" name="discount">
        </div>
        <div class="form-group">
          <label for="content">Nội dung:</label>
          <textarea class="form-control" name="content" id="contents"></textarea>
        </div>
        <button type="submit" name="btn_addproduct"class="btn btn-primary" style="float: left;">Thực Hiện</button>
        <div>
          <a href="{{route("admin-product-index")}}" class="btn btn-warning" style="margin-left: 10px;">Trở Về</a>
        </div>
    </form>
  </div>
</div>
 @stop
