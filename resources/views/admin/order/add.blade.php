@extends('admin.layout')
@section('content')
<div class="form-w3layouts">
   <div class="row">
      <div class="panel-heading">
         Thêm hóa đơn
      </div>
      <form action="{{route('admin-order-store')}}" method="POST" enctype="multipart/form-data">
         {{ csrf_field() }}
         <div class="form-group">
            <label for="id_customer">Khách hàng:</label>
              <select name="id_customer" class="form-control">
                  @foreach ($customer as $key =>$c)
                  <option value="{{$c->id}}">{{$c->name}}</option>   
                  @endforeach
              </select>
          </div>
         <div class="form-group">
            <label for="total">Tổng tiền:</label>
            <input type="text" class="form-control"name="total">
         </div>
         <button type="submit" name="btn_add"class="btn btn-primary" style="float: left;">Thực Hiện</button>
         <div>
            <a href="{{route("admin-order-index")}}" class="btn btn-warning" style="margin-left: 10px;">Trở Về</a>
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