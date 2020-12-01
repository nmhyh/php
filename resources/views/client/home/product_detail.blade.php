@extends('client.layout')
@section('content')
<section class="breadcrumb breadcrumb_bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="breadcrumb_iner">
                    <div class="breadcrumb_iner_item">
                        <p>Home/Shop/Single product</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@foreach($product_detail as $product)
<div class="product_image_area section_padding">
    <div class="container">
      <div class="row s_product_inner">
        <div class="col-lg-5">
          <div class="product_slider_img">
            <div id="vertical">
              <div data-thumb="{{asset('uploads/product/'. $product->image)}}">
                <img src="{{asset('uploads/product/'. $product->image)}}" />
              </div>
              <div data-thumb="{{asset('uploads/product/'. $product->image2)}}">
                <img src="{{asset('uploads/product/'. $product->image2)}}"/>
              </div>
              <div data-thumb="{{asset('uploads/product/'. $product->image3)}}">
                <img src="{{asset('uploads/product/'. $product->image3)}}" />
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-5 offset-lg-1">
          <div class="s_product_text">
            <form action="{{route('get-client-savecart')}}" method="POST">
                {{ csrf_field() }}
                <h3>{{$product->name}}</h3>
                <h2>{{number_format($product->price). " VND"}}</h2>
                <ul class="list">
                  <li>
                    <a href="#">
                      <span>Mã sản phẩm</span> : {{$product->id}}</a>
                  </li>
                  {{-- <li>
                    <a class="active" href="#">
                      <span>Mã sản phẩm</span> : {{$product->id}}</a>
                  </li> --}}
                  <li>
                    <a href="#"> <span>Tình trạng</span> : Còn hàng</a>
                  </li>
                  <li>
                    <a href="#">
                      <span>Chất liệu</span> : {{$product->material}}</a>
                  </li>
                  <li>
                    <a href="#">
                      <span>Chất liệu dây đeo</span> : {{$product->strap_material}}</a>
                  </li>

                  <li>
                    <a href="#">
                      <span>Kích thước</span> : {{$product->dimensions}}</a>
                  </li>
                  <li>
                    <a href="#">
                      <span>Kích cỡ</span> : <?php if($product->idsize == 1){echo "S";} else if($product->idsize == 2){echo "M";} else if($product->idsize == 3){echo "L";}?></a>
                  </li>
                  <li>
                    <a href="#">
                      <span>Kiểu khóa</span> : <?php if($product->locktype == 0){echo "Nút Cài";} else if($product->locktype == 1){echo"Nút Bấm";} else if($product->locktype == 2){echo"Khóa Kéo";}else if($product->locktype == 3){echo"Khóa Đẩy";} else if($product->locktype == 4){echo"Khóa Khớp";}?> </a>
                  </li>
                  <li>
                    <a href="#">
                      <span>Số ngăn</span> : {{$product->number_compartments}}</a>
                  </li>

                </ul>
                <p>
                    Mill Oil is an innovative oil filled radiator with the most modern technology. If you are looking for something that can make your interior look awesome, and at the same time.
                </p>
                <div class="card_area">
                  <div class="product_count d-inline-block">
                    <span class="inumber-decrement"> <i class="ti-minus"></i></span>
                    <input class="input-number" type="text" value="1" min="1" name="qty">
                    <input class="input-number" type="text" value="{{$product->id}}"name="product_id" hidden>
                    <span class="number-increment"> <i class="ti-plus"></i></span>
                  </div>
                  <div class="add_to_cart">
                      {{-- <a href="#" class="btn_3">Thêm vào giỏ hàng</a>
                      <a href="#" class="like_us"> <i class="ti-heart"></i> </a> --}}
                      <button type="submit" class="btn btn-primary">THÊM VÀO GIỎ HÀNG</button>
                  </div>
                
                  <div class="social_icon">
                      <a href="#" class="fb"><i class="ti-facebook"></i></a>
                      <a href="#" class="tw"><i class="ti-twitter-alt"></i></a>
                      <a href="#" class="li"><i class="ti-linkedin"></i></a>
                  </div>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>
@endforeach
<section class="product_list best_seller padding_bottom">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-12">
          <div class="section_tittle text-center">
            <h2>SẢN PHẨM LIÊN QUAN</h2>
          </div>
        </div>
      </div>
      <div class="row">
          @foreach($related_product as $product)
          <a href="{{route("get-client-shop-product_detail", $product->id)}}" style="width: 0;height: 0;">
            <div class="col-lg-3 col-sm-6">
                <div class="single_category_product">
                    <div class="single_category_img">
                        <img src="{{asset('uploads/product/'. $product->image)}}" alt="">
                        <div class="category_social_icon">
                            <ul>
                                <li><a href="#"><i class="ti-bag"></i></a></li>
                            </ul>
                        </div>
                        <div class="category_product_text">
                            <a href="{{route("get-client-shop-product_detail", $product->id)}}"><h5>{{$product->name}}</h5></a>
                            <p>{{number_format($product->price)}}</p>
                        </div>
                    </div>
                </div>
            </div>
          </a>
          @endforeach
          
      </div>
    </div>
</section>

@stop