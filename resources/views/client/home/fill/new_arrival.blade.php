@extends('client.home.index')
@section('content2')

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
                <div class="new_arrival_iner filter-container" style="margin: 0px 50px;">
                    @foreach($product as $pro)                    
                        <div class="single_arrivel_item weidth_3 mix shoes women" >
                            <form>
                                @csrf
                                <input type="hidden" value="{{$pro->id}}" class="cart_product_id_{{$pro->id}}">
                                <input type="hidden" value="{{$pro->name}}" class="cart_product_name_{{$pro->id}}">
                                <input type="hidden" value="{{$pro->image}}" class="cart_product_image_{{$pro->id}}">
                                <input type="hidden" value="{{$pro->price}}" class="cart_product_price_{{$pro->id}}">
                                <input type="hidden" value="1" class="cart_product_qty_{{$pro->id}}">

                                <a href="{{route("get-client-shop-product_detail", $pro->id)}}" style="width: 0;height: 0;">
                                <img src="{{asset('uploads/product/'. $pro->image)}}" alt="#">
                                </a>
                                <div class="hover_text">
                                    <a href="{{route("get-client-shop-product_detail", $pro->id)}}"><h3>{{$pro->name}}</h3></a>
                                    <h5>{{number_format($pro->price) . " VND"}}</h5>
                                    <div class="social_icon">
                                    <button type="button" name="add-to-cart" data-id_product="{{$pro->id}}" class="ti-bag add-to-cart" style="width: 50px; height: 50px; border-radius: 50%;"></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    
                    @endforeach
                </div>
            </div> 
        </div>
    </div>
</section>

@stop