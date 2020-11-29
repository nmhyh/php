@extends('admin.layout')
@section('content')   
{{-- {{Auth::user()->id}} --}}
<form action="" method="POST">
{{ csrf_field() }}
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" id="name" name="txtname" value="{{$user->name}}" disabled>
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="text" class="form-control" id="email" name="txtemail" value="{{$user->email}}" disabled>
    </div>
    <div class="form-group">
        <label for="pwd">Password:</label>
        <input type="password" class="form-control" id="pwd" name="txtpassword" value="{{$user->password}}" disabled>
    </div>
    <div class="form-group">
        <label for="dateofbirth">Date of Birth:</label>
        <input type="date" class="form-control" id="dateofbirth" name="txtdateofbirth" value="{{$user->dateofbirth}}" disabled>
      </div>
      <div class="form-group">
        <label for="sex" style="float: left;">Sex:</label>
        <div class="radio" style="margin-left: 40px;" disabled>
          <label><input type="radio" name="optradio" value="Nam" <?php if($user->sex == 'Nam'){echo "checked";}?> >Nam</label>
          <label><input type="radio" name="optradio" value="Nữ" <?php if($user->sex == 'Nữ'){echo "checked";}?> >Nữ</label>
        </div>  
      </div>
      <div class="form-group">
        <label for="image">Image:</label>
        <input type="file" class="form-control"name="txtimage" value="{{$user->image}}" disabled/>
      </div>
      <div class="form-group">
        <label for="phone">Phone:</label>
        <input type="number" class="form-control" id="phone" name="txtphone" value="{{$user->phone}}" disabled />
      </div>
      <div class="form-group">
        <label for="position">Position:</label>
        <select class="form-control" name="txtposition" id="txtposition" disabled>
            <option value="1" <?php if($user->position == 1){echo "selected";}?> >Quản Lí</option>    
            <option value="0" <?php if($user->position == 0){echo "selected";}?> >Nhân Viên</option>     
        </select>
      </div>

      <div>
        <a href="{{route("admin-user-index")}}" class="btn btn-warning">Trở Về</a>
      </div>
</form>
@stop