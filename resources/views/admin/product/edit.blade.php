@extends('admin.layout')
@section('content')
<form action="{{route('admin-product-postedit', $product->id)}}" method="POST">
    {{ csrf_field() }}
  <div class="form-group">
    <label for="idcat">Category:</label>
    <input type="text" class="form-control" name="idcat" value="{{$product->idcat}}">
  </div>
  <div class="form-group">
    <label for="name">Name:</label>
    <input type="text" class="form-control" name="name" value="{{$product->name}}">
  </div>
  <div class="form-group">
    <label for="image">Image:</label>
    <input type="text" class="form-control"name="image"
    value="{{$product->image}}">
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
   <button type="submit" name="btn_editproductgory"class="btn btn-primary">Thực Hiện</button>
 </form>
@if(Session::has('message'))
    <div class="alert alert-success">
    {{ Session::get('message') }}
    </div>
@endif
@endsection