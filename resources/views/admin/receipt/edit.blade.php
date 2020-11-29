@extends('admin.layout')
@section('content')
<div class="form-w3layouts">
  <div class="row">
    <div class="panel-heading">
      Chỉnh sửa phiếu nhập
    </div>
    <form action="{{route('admin-receipt-postedit', $receipt->id)}}" method="POST">
      {{ csrf_field() }}
      <div class="form-group">
        <label for="idsup">Nhà cung cấp:</label>
            <select name="idsup" class="form-control">
                @foreach ($category as $cate)
                <option value="{{$cate->id}}">{{$cate->name}}</option>
                    
                @endforeach
            </select>
      </div>
      <div class="form-group">
        <label for="iduser">Nhân viên:</label>
            <select name="iduser" class="form-control">
                @foreach ($users as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
                    
                @endforeach
            </select>
      </div>
      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" name="name" value="{{$receipt->name}}" required>
      </div>
      <button type="submit" name="btn_editreceiptgory"class="btn btn-primary" style="float: left;">Thực Hiện</button>
      <div>
        <a href="{{route("admin-receipt-index")}}" class="btn btn-warning" style="margin-left: 10px;">Trở Về</a>
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