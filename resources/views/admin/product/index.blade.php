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
</style>
<div class="table-agile-info">
  <div class="panel panel-default">
    <div>
      <a href="{{route("admin-product-add")}}"  class="btn btn-primary btn-block">Thêm mới</a>
    </div>
    <div class="panel-heading">
        Danh sách sản phẩm
    </div>
    <div class="table-responsive">
        <table class="table table-striped b-t b-light">
          <thead>
            <tr>
              <th>Idcat</th>
              <th>Image</th>
              <th>Name</th>
              <th>Price</th>
              <th>Discount</th>
              <th>Edit</th>
              <th>Lock</th>
              <th>Delete</th>          
            </tr>
          </thead>
          <tbody>
            @foreach($products ?? '' as $product)
            <tr>
                <td>{{$product->idcat}} </td>
                <td><img src="{{asset('uploads/product/'. $product->image)}}" width="40" /></td>
                <td>{{$product->name}} </td>
                <td>{{$product->price}} </td>
                <td>{{$product->discount}} </td>
                <td><a href="{{route('admin-product-getedit', $product->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i></a></td>
                <td>
                    <?php
                    if ($product->status == 1)
                    {
                      ?>
                        <a href="{{route("admin-product-unactive", $product->id)}}" class="btn btn-warning"><i class="fa fa-unlock-alt" id="clock"></i></a>
                    <?php }
                    else if ($product->status == 0)
                    { ?>
                        <a href="{{route("admin-product-active", $product->id)}}" class="btn btn-warning"><i class="fa fa-lock" id="clock"></i></a>
                    <?php }
                    ?>
                  </td>
                <td><a href="{{route('admin-product-destroy', $product->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
    </div>
    <!-- footer -->
    <footer class="panel-footer">
      <div class="row">          
          <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
          </div>
          <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
              <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
              <li><a href="">1</a></li>
              <li><a href="">2</a></li>
              <li><a href="">3</a></li>
              <li><a href="">4</a></li>
              <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
          </div>
      </div>
    </footer>
  <!-- / footer -->
  </div>
</div>
@if(Session::has('message'))
<div class="alert alert-success">
  {{ Session::get('message') }}
</div>
@endif
@stop
  