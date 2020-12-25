@extends('admin.layout')
@section('content')

<div class="form-w3layouts">
   <div class="row">
     <div class="panel-heading">
       Thêm nhà cung cấp
     </div>
      <form action="{{route('admin-size-store')}}" method="POST" enctype="multipart/form-data">
         {{ csrf_field() }}
         <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" name="name" required>
         </div>
         <button type="submit" name="btn_add"class="btn btn-primary" style="float: left;">Thực Hiện</button>
         <div>
            <a href="{{route("admin-size-index")}}" class="btn btn-warning" style="margin-left: 10px;">Trở Về</a>
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