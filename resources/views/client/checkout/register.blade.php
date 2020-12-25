@extends('client.layout')
@section('content')

<section class="breadcrumb breadcrumb_bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="breadcrumb_iner">
                    <div class="breadcrumb_iner_item">
                        <p>Home / Login</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="login_part section_padding">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6">
                <div class="login_part_text text-center">
                    <div class="login_part_text_iner">
                        <h2>New to our Shop?</h2>
                        <p>There are advances being made in science and technology
                            everyday, and a good example of this is the</p>
                        <a href="{{route('get-client-login')}}" class="btn_3">Đăng nhập</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="login_part_form">
                    <div class="login_part_form_iner">
                        <h3>Chào bạn ! <br>
                            Vui lòng đăng ký tài khoản</h3>
                        <form class="row contact_form" action="{{route('post-client-register')}}" method="POST" novalidate="novalidate">
                            {{-- {{ csrf_field() }} --}}

                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="name" name="name" value=""
                                    placeholder="Họ tên" required>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="email" name="email" value=""
                                    placeholder="Email" required>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="password" class="form-control" id="password" name="password" value=""
                                    placeholder="Mật khẩu" required>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="date" class="form-control" id="dateofbirth" name="dateofbirth" value=""
                                    placeholder="Ngày sinh" required>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <label for="sex" style="float: left;">Giới tính:</label>
                                <div class="radio" style="margin-left: 200px;">
                                  <label><input type="radio" name="optradio" value="Nam" checked>Nam</label>
                                  <label><input type="radio" name="optradio" value="Nữ">Nữ</label>
                                </div>  
                              </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="phone" name="phone" value=""
                                    placeholder="Điện thoại" required>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="address" name="address" value=""
                                    placeholder="Địa chỉ" required>
                            </div>
                            <div class="col-md-12 form-group">
                                <button type="submit" value="submit" class="btn_3">
                                    Đăng ký
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@if(Session::has('message'))
<div class="alert alert-success">
{{ Session::get('message') }}
</div>
@endif
@stop