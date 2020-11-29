@extends('admin.layout')
@section('content')
<div class="form-w3layouts">
  <div class="row">
    <div class="panel-heading">
      Chỉnh sửa sản phẩm
    </div>
    <form action="{{route('admin-product-postedit', $product->id)}}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
      <div class="form-group">
        <label for="idcat">Category:</label>
        <input type="text" class="form-control" name="idcat" value="{{$product->idcat}}">
      </div>
      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" name="name" value="{{$product->name}}" required>
      </div>
      <div class="form-group">
        <label for="image">Image 1:</label>
        <input type="file" class="form-control" name="image" value="{{$product->image}}">
        <img src="{{asset('uploads/product/'. $product->image)}}" width="140px" />
      </div>
      <div class="form-group">
        <label for="image2">Image 2:</label>
        <input type="file" class="form-control" name="image2" value="{{$product->image2}}">
        <img src="{{asset('uploads/product/'. $product->image2)}}" width="140px" />
      </div>
      <div class="form-group">
        <label for="image3">Image 3:</label>
        <input type="file" class="form-control" name="image3" value="{{$product->image3}}">
        <img src="{{asset('uploads/product/'. $product->image3)}}" width="140px" />
      </div>
      <div class="form-group">
        <label for="price">Price:</label>
        <input type="number" class="form-control"name="price" value="{{$product->price}}">
      </div>
      <div class="form-group">
        <label for="size">Size:</label>
        <select class="form-control" name="size" value="{{$product->size}}">
          <option value="0" >S</option>
          <option value="1" >M</option>
          <option value="2" >L</option>
        </select>
      </div>
      <div class="form-group">
        <label for="material">Material:</label>
        <input type="text" class="form-control" name="material" value="{{$product->material}}">
      </div>
      <div class="form-group">
        <label for="strap_material">Strap material:</label>
        <input type="text" class="form-control" name="strap_material" value="{{$product->strap_material}}">
      </div>
      <div class="form-group">
        <label for="locktype">Lock type:</label>
        <select class="form-control" name="locktype" value="{{$product->locktype}}">
          <select class="form-control" name="locktype" id="locktype">
            <option value="0" >Nút cài</option>
            <option value="1" >Nút Bấm</option>
            <option value="2" >Khóa kéo</option>
            <option value="3" >Khóa đẩy</option>
            <option value="4" >Khóa khớp</option>
          </select>
        </select> 
         <label for="number_compartments">Number compartments:</label>
        <input type="text" class="form-control" name="number_compartments" value="{{$product->number_compartments}}">
      </div>
      <div class="form-group">
        <label for="dimensions">Dimensions:</label>
        <input type="text" class="form-control" name="dimensions" value="{{$product->dimensions}}">
      </div>
      <div class="form-group">
        <label for="color">Color:</label>
        <input type="text" class="form-control"name="color" value="{{$product->color}}">
      </div>
      <div class="form-group">
        <label for="discount" >Discount:</label>
        <input type="number" class="form-control"name="discount" value="{{$product->discount}}">
      </div>
      <div class="form-group">
        <label for="content">Content:</label>
        <textarea class="form-control" name="content" id="contents">{{$product->content}}</textarea>
      </div>
      <button type="submit" name="btn_editproductgory"class="btn btn-primary" style="float: left;">Thực Hiện</button>
      <div>
        <a href="{{route("admin-product-index")}}" class="btn btn-warning" style="margin-left: 10px;">Trở Về</a>
      </div>
    </form>
  </div>
</div>
@if(Session::has('message'))
    <div class="alert alert-success">
    {{ Session::get('message') }}
    </div>
@endif
@endsection