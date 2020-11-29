@extends('client.layout')
@section('content')
<section class="banner_part">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <div class="banner_slider">
                    <div class="single_banner_slider">
                        <div class="banner_text">
                            <div class="banner_text_iner">
                                <h5>Winter Fasion</h5>
                                <h1>Fashion Collection 2019</h1>
                                <a href="{{route("get-client-shop")}}" class="btn_1">shop now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- banner part start-->

<!-- new arrival part here -->
<section class="new_arrival section_padding">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="arrival_tittle">
                    <h2 style="text-align: center;">new arrival</h2>
                </div>
            </div>
            
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="new_arrival_iner filter-container" style="margin: 0px 210px;">
                    @foreach($product as $pro)
                    <a href="{{route("get-client-shop-product_detail", $pro->id)}}" style="width: 0;height: 0;">
                        <div class="single_arrivel_item weidth_3 mix shoes women" >
                            <img src="{{asset('uploads/product/'. $pro->image)}}" alt="#">
                            <div class="hover_text">
                                <a href="{{route("get-client-shop-product_detail", $pro->id)}}"><h3>{{$pro->name}}</h3></a>
                                <h5>{{number_format($pro->price) . " VND"}}</h5>
                                <div class="social_icon">
                                    <a href="#"><i class="ti-heart"></i></a>
                                    <a href="#"><i class="ti-bag"></i></a>
                                </div>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div> 
        </div>
    </div>
</section>
@stop