@extends('client.layout')
@section('content')
<section class="breadcrumb breadcrumb_bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="breadcrumb_iner">
                    <div class="breadcrumb_iner_item">
                        <p>Home / Category</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb start-->

<!--================Category Product Area =================-->
<section class="cat_product_area section_padding border_top">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="left_sidebar_area">
                    <aside class="left_widgets p_filter_widgets sidebar_box_shadow">
                        <div class="l_w_title">
                            <h3>LOẠI SẢN PHẨM</h3>
                        </div>
                        <div class="widgets_inner">
                            <ul class="list">
                                @foreach($category as $cate)
                                <li>
                                    <a href="{{route("get-client-shop-category", $cate->id)}}">{{$cate->name}}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </aside>

                    <aside class="left_widgets p_filter_widgets sidebar_box_shadow">
                        <div class="l_w_title">
                            <h3>Hãng</h3>
                        </div>
                        <div class="widgets_inner">
                            <ul class="list">
                                @foreach($brand as $bra)
                                <li>
                                    <a href="{{route("get-client-shop-brand", $bra->id)}}">{{$bra->name}}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </aside>

                    <aside class="left_widgets p_filter_widgets sidebar_box_shadow">
                        <div class="l_w_title">
                            <h3>Size</h3>
                        </div>
                        <div class="widgets_inner">
                            <ul class="list">
                                @foreach($size as $siz)
                                <li>
                                    <a href="{{route("get-client-shop-size", $siz->id)}}">{{$siz->name}}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </aside>                    
                </div>
            </div>
            @yield('content1')
        </div>
    </div>
</section>
@stop
