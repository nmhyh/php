@extends('admin.layout')
@section('content')
<style>
  th {
      text-align: center;
  }

  td {
      font-size: 16px;
      text-align: center;
    
  }

  a i #clock{
    font-size: 20px;  
    display: block;
  }

  a i.fa.fa-lock {
      color: red;
  }

  a i.fa.fa-unlock-alt {
      color: #fff;
  }

  .flex{
        text-align: center;
    }
</style>

<div class="table-agile-info">
  <div class="panel panel-default">
    <div>
        <a href="{{route('admin-size-add')}}"  class="btn btn-primary btn-block">Thêm mới</a>
    </div>

    <div class="panel-heading">
      Danh sách thương hiệu
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Name</th>
            <th>Edit</th>
            <th>Lock</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          @foreach($sizes ?? '' as $size)
          <tr>
            <td>{{$size->name}} </td>
            <td>
              <a href="{{route('admin-size-getedit', $size->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
            </td>
            <td>
              <?php
              if ($size->status == 1)
              {
                ?>
                  <a href="{{route("admin-size-unactive", $size->id)}}" class="btn btn-warning"><i class="fa fa-unlock-alt" id="clock"></i></a>
              <?php }
              else if ($size->status == 0)
              { ?>
                  <a href="{{route("admin-size-active", $size->id)}}" class="btn btn-warning"><i class="fa fa-lock" id="clock"></i></a>
              <?php }
              ?>
            </td>
            <td>
              <a href="{{route('admin-size-destroy', $size->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {{$sizes->render()}}
    </div>
  </div>
</div>
@if(Session::has('message'))
<div class="alert alert-success">
  {{ Session::get('message') }}
</div>
@endif
@stop
  