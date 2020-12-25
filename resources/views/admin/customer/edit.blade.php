@extends('admin.layout')
@section('content')   
<div class="form-w3layouts">
  <div class="row">
    <div class="panel-heading">
      Chỉnh sửa khách hàng
    </div>
    <form action="{{route("admin-customer-postedit", $customer->id)}}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
        <div class="form-group">
            <label for="name">Tên:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{$customer->name}}" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" class="form-control" id="email" name="email" value="{{$customer->email}}" required/>
        </div>
        <div class="form-group">
            <label for="dateofbirth">Ngày sinh:</label>
            <input type="date" class="form-control" id="dateofbirth" name="dateofbirth" value="{{$customer->dateofbirth}}"/>
          </div>
          <div class="form-group">
            <label for="sex" style="float: left;">Giới tính:</label>
            <div class="radio" style="margin-left: 40px;">
              <label><input type="radio" name="optradio" value="Nam" <?php if($customer->sex == 'Nam'){echo "checked";}?> >Nam</label>
              <label><input type="radio" name="optradio" value="Nữ" <?php if($customer->sex == 'Nữ'){echo "checked";}?> >Nữ</label>
            </div>  
          </div>
          <div class="form-group">
            <label for="image">Hình ảnh:</label>
            <input type="file" class="form-control"name="image" value="{{$customer->image}}" id="ful"/>
            <img id="imgPre" src="{{asset('uploads/customer/'. $customer->image)}}" alt="no image" class="img-thumbnail" style="width: 200px;"/>
          </div>
          <div class="form-group">
            <label for="phone">Điện thoại:</label>
            <input type="number" class="form-control" id="phone" name="phone" value="{{$customer->phone}}" required/>
          </div>
          <div class="form-group">
            <label for="address">Vị trí:</label>
            <input type="text" class="form-control" id="address" name="address" value="{{$customer->address}}" required/>           
          </div>

        <button type="submit" name="btnedit"class="btn btn-primary" style="float: left;">Thực Hiện</button>
        <div>
          <a href="{{route("admin-customer-index")}}" class="btn btn-warning" style="margin-left: 10px;">Trở Về</a>
        </div>
    </form>
  </div>
</div>

<script>
  function readURL(input, idImg) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function(e) {
        $(idImg).attr('src', e.target.result);
      }

      reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
  }

  $("#ful").change(function() {
    readURL(this, '#imgPre');
  });
</script>
@stop