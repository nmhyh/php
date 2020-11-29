@extends('admin.layout')
@section('content')
<div class="form-w3layouts">
  <div class="row">
    <div class="panel-heading">
      Thêm phiếu nhập
    </div>
    <form action="{{route("admin-receipt-store")}}" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
          <label for="idsup">Category:</label>
            <select name="idsup" class="form-control">
                @foreach ($category as $key =>$cat)
                <option value="{{$cat->id}}">{{($key+1).'. '.$cat->name}}</option>   
                @endforeach
            </select>
        </div>
        <div class="form-group">
          <label for="iduser">Category:</label>
            <select name="iduser" class="form-control">
                @foreach ($users as $key =>$user)
                <option value="{{$user->id}}">{{($key+1).'. '.$user->name}}</option>   
                @endforeach
            </select>
        </div>
        <div class="form-group">
          <label for="name">Name:</label>
          <input type="text" class="form-control" name="name" required>
        </div>
        <button type="submit" name="btn_addreceipt"class="btn btn-primary" style="float: left;">Thực Hiện</button>
        <div>
          <a href="{{route("admin-receipt-index")}}" class="btn btn-warning" style="margin-left: 10px;">Trở Về</a>
        </div>
    </form>
  </div>
</div>
 @stop
