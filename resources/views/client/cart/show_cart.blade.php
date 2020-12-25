@extends('client.layout')
@section('content')

<section class="breadcrumb breadcrumb_bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="breadcrumb_iner">
                    <div class="breadcrumb_iner_item">
                        <p>Home/Shop/Single product/Cart list</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="cart_area section_padding">
    <div class="container">
      <div class="cart_inner">
        <div class="table-responsive">
          @if(Session::has('message'))
          <div class="alert alert-success">
            {{ Session::get('message') }}
          </div>
          @endif
          <table class="table">
            <form action="{{route('post-client-update_cart')}}" method="POST">  
              @csrf            
              <thead>
                <tr>
                  <th scope="col">Sản phẩm</th>
                  <th scope="col">Đơn giá</th>
                  <th scope="col">Số lượng</th>
                  <th scope="col" style="width: 12%;">Thành tiền</th>
                </tr>
              </thead>
              <tbody>
                
                @php
                  $total = 0;
                @endphp
                
                @if(Session::get('cart'))                
                  @foreach (Session::get('cart') as $key => $cart)
                    @php
                      $subtotal = $cart['price'] * $cart['qty'];
                      $total += $subtotal;
                    @endphp

                    <tr>
                      <td>
                        <div class="media">
                          <div class="d-flex">
                            <img src="{{asset('uploads/product/'. $cart['image'])}}" alt="" style="width: 100px;" />
                          </div>
                          <div class="media-body">
                            <p>{{$cart['name']}}</p>
                          </div>
                        </div>
                      </td>
                      <td>
                        <h5>{{number_format($cart['price'], 0,'.','.').' VND'}}</h5>
                      </td>
                      <td>
                        <div class="product_count" style="display: flex;">
                          {{-- <span class="input-number-decrement"> <i class="ti-minus"></i></span> --}}
                          
                            <input class="input-number" type="number" value="{{$cart['qty']}}" name="cart_qty[{{$cart['session_id']}}]" min="1" max="10" style=" width: 42px; text-align: center; padding-left: 0px; height:35px;">
                            {{-- <span class="input-number-increment"> <i class="ti-plus"></i></span> --}}
                            
                        </div>
                      </td>
                      <td>
                        <h5>{{number_format($subtotal, 0,'.','.').' VND'}}</h5>
                      </td>
                      <td>
                        <a class="cart_qty_delete" href="{{route('get-client-delete_product',  $cart['session_id'])}}"><i class="fa fa-times"></i></a>
                      </td>
                    </tr>   
                  @endforeach
                
                <tr class="bottom_button">
                  <td>
                    <input type="submit" value="Cập nhật" name="update_qty" class="btn_1">
                  </td>
              </form>
                  <td></td>
                  <td></td>
                  <td>
                    <div class="cupon_text float-right">
                      <a class="btn_1 checkout_btn_1" href="{{route('get-client-delete_all_product')}}">Xóa tất cả</a>
                    </div>
                  </td>
                  <td></td>
                </tr>
              
              @else
              <tr>
                <td>
                  <center>
                    <?php
                      echo "Vui lòng thêm sản phẩm vào giỏ hàng";
                    ?>
                  </center>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              @endif
              <tr>
                <td></td>
                <td></td>
                <td>
                  <h5>Tổng tiền</h5>
                </td>
                <td>
                  <h5>{{number_format($total, 0,'.','.').' VND'}}</h5>
                </td>
                <td></td>
              </tr>
              
              <tr class="shipping_area">
                <td></td>
                <td></td>
                <td>
                  <h5>Phí vận chuyển</h5>
                </td>
                <td>
                  <h5>
                    Miễn phí
                  </h5>
                </td>
                <td></td>
              </tr>
            </tbody>
          </table>
          <div class="checkout_btn_inner float-right">
            <a class="btn_1" href="#">Tiếp tục mua hàng</a>
            <a class="btn_1 checkout_btn_1" href="{{route('get-client-login')}}">Thanh toán</a>
        </div>
      </div>
  </section>

@stop