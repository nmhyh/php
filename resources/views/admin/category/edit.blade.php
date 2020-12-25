@extends('admin.layout')
@section('content')
<div class="form-w3layouts">
  <div class="row">
    <div class="panel-heading">
      Chỉnh sửa loại sản phẩm
    </div>
    <form action="{{route('admin-category-postedit', $cate->id)}}" method="POST" enctype="multipart/form-data">
      {{ csrf_field() }}
      <div class="form-group">
      <label for="name">Tên:</label>
      <input type="text" class="form-control" name="name" value="{{$cate->name}}" required>
    </div>
      <div class="form-group">
        <label for="image">Hình ảnh:</label>
        <input type="file" class="form-control" name="image" value="{{$cate->image}}" id="ful" />
        <img id="imgPre" src="{{asset('uploads/category/'. $cate->image)}}" alt="no image" class="img-thumbnail" style="width: 200px;"/>
      </div>
      <div class="form-group">
        <label for="content">Nội dung:</label>
        <textarea class="form-control" name="content" id="contents">{{$cate->content}}</textarea>
      </div>
      <button type="submit" name="btn_editcategory"class="btn btn-primary" style="float: left;">Thực Hiện</button>
      <div>
        <a href="{{route("admin-category-index")}}" class="btn btn-warning" style="margin-left: 10px;">Trở Về</a>
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
@endsection