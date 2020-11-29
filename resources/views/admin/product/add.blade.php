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
          <label for="idcat">Category:</label>
            <select name="idcat" class="form-control">
                @foreach ($category as $key =>$cat)
                <option value="{{$cat->id}}">{{($key+1).'. '.$cat->name}}</option>   
                @endforeach
            </select>
        </div>
        <div class="form-group">
          <label for="name">Name:</label>
          <input type="text" class="form-control" name="name" required>
        </div>
        <div class="form-group">
          <label for="image">Image 1:</label>
          <input type="file" class="form-control"name="image">
        </div>
        <div class="form-group">
          <label for="image2">Image 2:</label>
          <input type="file" class="form-control"name="imag2">
        </div>
        <div class="form-group">
          <label for="image3">Image 1:</label>
          <input type="file" class="form-control"name="imag3">
        </div>
        <div class="form-group">
          <label for="price">Price:</label>
          <input type="number" class="form-control"name="price">
        </div>
        <div class="form-group">
          <label for="size">Size:</label>
          <select class="form-control" name="size" id="size">
            <option value="0" >S</option>
            <option value="1" >M</option>
            <option value="2" >L</option>
          </select>
        </div>
        <div class="form-group">
          <label for="material">Material:</label>
          <input type="text" class="form-control"name="material">
        </div>
        <div class="form-group">
          <label for="strap_material">Strap material:</label>
          <input type="text" class="form-control"name="strap_material">
        </div>
        <div class="form-group">
          <label for="locktype">Lock type:</label>
          <select class="form-control" name="locktype" id="locktype">
            <option value="0" >Nút cài</option>
            <option value="1" >Khóa kéo</option>
            <option value="2" >Khóa đẩy</option>
            <option value="3" >Khóa khớp</option>
          </select>
        </div>
        <div class="form-group">
          <label for="number_compartments">Number compartments:</label>
          <input type="text" class="form-control"name="number_compartments">
        </div>
        <div class="form-group">
          <label for="dimensions">Dimensions:</label>
          <input type="text" class="form-control"name="dimensions">
        </div>
        <div class="form-group">
          <label for="color">Color:</label>
          <input type="text" class="form-control"name="color">
        </div>
        <div class="form-group">
          <label for="discount">Discount:</label>
          <input type="number" class="form-control"name="discount">
        </div>
        <div class="form-group">
          <label for="content">Content:</label>
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
