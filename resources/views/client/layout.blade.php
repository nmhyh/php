<!doctype html>
<html lang="zxx">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>winter</title>
    <link rel="icon" href="{{asset('client_asset/img/favicon.png')}}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('client_asset/css/bootstrap.min.css')}}">
    <!-- animate CSS -->
    <link rel="stylesheet" href="{{asset('client_asset/css/animate.css')}}">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="{{asset('client_asset/css/owl.carousel.min.css')}}">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="{{asset('client_asset/css/all.css')}}">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="{{asset('client_asset/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('client_asset/css/themify-icons.css')}}">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="{{asset('client_asset/css/magnific-popup.css')}}">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="{{asset('client_asset/css/slick.css')}}">
    <!-- style CSS -->
    <link rel="stylesheet" href="{{asset('client_asset/css/style.css')}}">
    <!-- sweetalert CSS -->
    <link rel="stylesheet" href="{{asset('client_asset/css/sweetalert.css')}}">
</head>

<body>
    <!--::header part start::-->
    <header class="main_menu home_menu">
        <div class="container-fluid">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-11">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="{{route("get-client-index")}}"> <img src="{{asset('client_asset/img/logo.png')}}" alt="logo"> </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="menu_icon"><i class="fas fa-bars"></i></span>
                        </button>

                        <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route("get-client-index")}}">Trang Chủ</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="{{route("get-client-shop")}}" id="navbarDropdown_1"
                                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Shop
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown_1">
                                        <a class="dropdown-item" href="category.html"> shop category</a>
                                        <a class="dropdown-item" href="single-product.html">product details</a>
                                        
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown_3"
                                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        pages
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown_2">
                                        <a class="dropdown-item" href="login.html"> 
                                            login
                                            
                                        </a>
                                        <a class="dropdown-item" href="tracking.html">tracking</a>
                                        <a class="dropdown-item" href="checkout.html">product checkout</a>
                                        <a class="dropdown-item" href="cart.html">shopping cart</a>
                                        <a class="dropdown-item" href="confirmation.html">confirmation</a>
                                        <a class="dropdown-item" href="elements.html">elements</a>
                                    </div>
                                </li>
                                
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown_2"
                                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        blog
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown_2">
                                        <a class="dropdown-item" href="blog.html"> blog</a>
                                        <a class="dropdown-item" href="single-blog.html">Single blog</a>
                                    </div>
                                </li>
                                
                                <li class="nav-item">
                                    <a class="nav-link" href="contact.html">Contact</a>
                                </li>
                            </ul>
                        </div>
                        <div class="">
                            {{-- <div class="dropdown cart"> --}}
                                <a class="login" href="{{route('get-client-login')}}">
                                    <i class="ti-heart"></i>
                                </a>

                                <a class="showcart" href="{{route('get-client-showcart')}}">
                                    <i class="ti-bag"></i>
                                </a>
                                <!-- <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <div class="single_product">
    
                                    </div>
                                </div> -->
                            {{-- </div> --}}
                                <a id="search_1" href="javascript:void(0)">
                                    <i class="ti-search"></i>
                                </a>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <div class="search_input" id="search_input_box">
            <div class="container ">
                <form action="{{route('post-client-search')}}" class="d-flex justify-content-between search-inner" method="POST">
                    {{ csrf_field() }}
                    <input type="text" class="form-control" id="search_input" name="keywords_submit" placeholder="Tìm kiếm sản phẩm">
                    <button type="submit" name="search_items" class="btn"></button>
                    <span class="ti-close" id="close_search" title="Close Search"></span>
                </form>
            </div>
        </div>
    </header>
    
    @yield('content')

    <section class="shipping_details section_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="single_shopping_details">
                        <img src="{{asset('client_asset/img/icon/icon_1.png')}}" alt="">
                        <h4>Free shipping</h4>
                        <p>Divided face for bearing the divide unto seed winged divided light Forth.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single_shopping_details">
                        <img src="{{asset('client_asset/img/icon/icon_2.png')}}" alt="">
                        <h4>Free shipping</h4>
                        <p>Divided face for bearing the divide unto seed winged divided light Forth.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single_shopping_details">
                        <img src="{{asset('client_asset/img/icon/icon_3.png')}}" alt="">
                        <h4>Free shipping</h4>
                        <p>Divided face for bearing the divide unto seed winged divided light Forth.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single_shopping_details">
                        <img src="{{asset('client_asset/img/icon/icon_4.png')}}" alt="">
                        <h4>Free shipping</h4>
                        <p>Divided face for bearing the divide unto seed winged divided light Forth.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- free shipping end -->

    <!-- subscribe_area part start-->
    <section class="instagram_photo">
        <div class="container-fluid>
            <div class="row">
                <div class="col-lg-12">
                    <div class="instagram_photo_iner">
                        @foreach($product_5 as $pro_5) 
                        <div class="single_instgram_photo">
                            <img src="{{asset('uploads/product/'. $pro_5->image)}}" alt="">
                            <a href="{{route("get-client-shop-product_detail", $pro_5->id)}}"><i class="ti-instagram"></i></a> 
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--::subscribe_area part end::-->

    <!--::footer_part start::-->
    <footer class="footer_part">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-sm-6 col-lg-2">
                    <div class="single_footer_part">
                        <h4>Category</h4>
                        <ul class="list-unstyled">
                            <li><a href="#">Male</a></li>
                            <li><a href="#">Female</a></li>
                            <li><a href="#">Shoes</a></li>
                            <li><a href="#">Fashion</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-2">
                    <div class="single_footer_part">
                        <h4>Company</h4>
                        <ul class="list-unstyled">
                            <li><a href="">About</a></li>
                            <li><a href="">News</a></li>
                            <li><a href="">FAQ</a></li>
                            <li><a href="">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="single_footer_part">
                        <h4>Address</h4>
                        <ul class="list-unstyled">
                            <li><a href="#">200, Green block, NewYork</a></li>
                            <li><a href="#">+10 456 267 1678</a></li>
                            <li><span>contact89@winter.com</span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="single_footer_part">
                        <h4>Newsletter</h4>
                        <div id="mc_embed_signup">
                            <form target="_blank"
                                action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
                                method="get" class="subscribe_form relative mail_part">
                                <input type="email" name="email" id="newsletter-form-email" placeholder="Email Address"
                                    class="placeholder hide-on-focus" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = ' Email Address '">
                                <button type="submit" name="submit" id="newsletter-submit"
                                    class="email_icon newsletter-submit button-contactForm">subscribe</button>
                                <div class="mt-10 info"></div>
                            </form>
                        </div>
                        <div class="social_icon">
                            <a href="#"><i class="ti-facebook"></i></a>
                            <a href="#"><i class="ti-twitter-alt"></i></a>
                            <a href="#"><i class="ti-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="copyright_text">
                        <P>Copyright &copy;
                            <script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="ti-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                        </P>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--::footer_part end::-->

    <!-- jquery plugins here-->
    <script src="{!! asset('client_asset/js/jquery-1.12.1.min.js') !!}"></script>
    <!-- popper js -->
    <script src="{!! asset('client_asset/js/popper.min.js') !!}"></script>
    <!-- bootstrap js -->
    <script src="{!! asset('client_asset/js/bootstrap.min.js') !!}"></script>
    <!-- easing js -->
    <script src="{!! asset('client_asset/js/jquery.magnific-popup.js') !!}"></script>
    <!-- swiper js -->
    <script src="{!! asset('client_asset/js/swiper.min.js') !!}"></script>
    <!-- swiper js -->
    <script src="{!! asset('client_asset/js/mixitup.min.js') !!}"></script>
    <!-- particles js -->
    <script src="{!! asset('client_asset/js/owl.carousel.min.js') !!}"></script>
    <script src="{!! asset('client_asset/js/jquery.nice-select.min.js') !!}"></script>
    <!-- slick js -->
    <script src="{!! asset('client_asset/js/slick.min.js') !!}"></script>
    <script src="{!! asset('client_asset/js/jquery.counterup.min.js') !!}"></script>
    <script src="{!! asset('client_asset/js/waypoints.min.js') !!}"></script>
    <script src="{!! asset('client_asset/js/contact.js') !!}"></script>
    <script src="{!! asset('client_asset/js/jquery.ajaxchimp.min.js') !!}"></script>
    <script src="{!! asset('client_asset/js/jquery.form.js') !!}"></script>
    <script src="{!! asset('client_asset/js/jquery.validate.min.js') !!}"></script>
    <script src="{!! asset('client_asset/js/mail-script.js') !!}"></script>
    <!-- custom js -->
    <script src="{!! asset('client_asset/js/custom.js') !!}"></script>
    <script src="{!! asset('client_asset/js/sweetalert.js') !!}"></script>
    
    <script type="text/javascript">
        $(document).ready(function(){
            $('.add-to-cart').click(function(){
                var id = $(this).data('id_product');
                var cart_product_id = $('.cart_product_id_' + id).val(); 
                var cart_product_name = $('.cart_product_name_' + id).val();
                var cart_product_image = $('.cart_product_image_' + id).val();
                var cart_product_price = $('.cart_product_price_' + id).val();
                var cart_product_qty = $('.cart_product_qty_' + id).val();
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: '{{url('/shop/add-cart-ajax')}}',
                    method: 'POST',
                    data:{cart_product_id:cart_product_id, cart_product_name:cart_product_name, cart_product_image:cart_product_image, cart_product_price:cart_product_price, cart_product_qty:cart_product_qty, _token:_token},
                    success:function(data){
                    swal({
                            title: "Đã thêm sản phẩm vào giỏ hàng",
                            text: "Bạn có thể mua hàng tiếp hoặc tới giỏ hàng để tiến hành thanh toán",
                            showCancelButton: true,
                            cancelButtonText: "Xem tiếp",
                            confirmButtonClass: "btn-success",
                            confirmButtonText: "Đi đến giỏ hàng",
                            closeOnConfirm: false
                        },
                        function() {
                            window.location.href = "{{route('get-client-showcart')}}";
                        });

                    }

                });
            });
        
        });
    </script>

</body>

</html>