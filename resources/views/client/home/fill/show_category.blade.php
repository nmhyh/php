@extends('client.home.shop_layout')
@section('content1')
<div class="col-lg-9">
    @foreach($category_name as $name)
    <h2 style="text-align: center;">{{$name->name}}</h2>
    @endforeach
    <div class="row">
        @foreach($category_by_id as $pro)
        <a href="{{route("get-client-shop-product_detail", $pro->id)}}" style="width: 0;height: 0;">
            <div class="col-lg-4 col-sm-6">
                <div class="single_category_product">
                    <div class="single_category_img">
                        <img src="{{asset('uploads/product/'. $pro->image)}}" alt="">
                        <div class="category_social_icon">
                            <ul>
                                <li><a href="#"><i class="ti-bag"></i></a></li>
                            </ul>
                        </div>
                        <div class="category_product_text">
                            <a href="{{route("get-client-shop-product_detail", $pro->id)}}"><h5>{{$pro->name}}</h5></a>
                            <p>{{number_format($pro->price) . " VND"}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        @endforeach
        <div class="col-lg-12 text-center">
            <a href="#" class="btn_2">More Items</a>
        </div>
    </div>
</div>
@stop

