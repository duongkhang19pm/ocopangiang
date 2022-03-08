<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('pagetitle', 'Trang chủ') - {{ config('app.name', 'Laravel') }}</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('public/Image/logo.png') }}" />
  <link rel="shortcut icon" href="{{ asset('public/Image/logo.ico') }}" />
    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/bootstrap.min.css' ) }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/font-awesome.min.css' ) }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/elegant-icons.css' ) }}" type="text/css">
    
    <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/jquery-ui.min.css' ) }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/owl.carousel.min.css' ) }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/slicknav.min.css' ) }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/style.css' ) }}" type="text/css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/thongbao.css')}}">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="#"><img src="{{ asset('public/Image/logo.png') }}" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
           <ul>       
                <li><a href="{{ route('frontend.giohang') }}"><i class="fa fa-shopping-bag"></i> <span>{{Cart::count() > 0 ? Cart::count() : ''}}</span></a></li>     
            </ul>
            <div class="header__cart__price">Tạm Tính: <span>{{ Cart::total() }} <sup>VNĐ</sup></span></div>
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__language">
                <img src="img/language.png" alt="">
                <div>English</div>
                <span class="arrow_carrot-down"></span>
                <ul>
                    <li><a href="#">Spanis</a></li>
                    <li><a href="#">English</a></li>
                </ul>
            </div>
            <div class="header__top__right__auth">
                @guest
                    @if (Route::has('login'))
                         <a href="{{ route('khachhang.dangnhap') }}"><i class="fa fa-user"></i> Đăng Nhập</a>
                    @endif
                @else
                    <div class="header__top__right__language">
                       
                        <div>{{ Auth::user()->name }}</div>
                        <span class="arrow_carrot-down"></span>
                        <ul>
                            <li><a href="{{route('khachhang.home')}}">Thông Tin</a></li>
                            <li><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                  <span class="dropdown-icon oi oi-account-logout"></span>Đăng Xuất</a>
                                   <form id="logout-form" action="{{ route('logout') }}" method="post" class="d-none">
                                  @csrf
                                  </form>
                            </li>
                        </ul>
                    </div>
                @endguest

            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="{{route('frontend')}}">Trang Chủ</a></li>
                <li><a href="{{route('frontend.sanpham')}}">Sản Phẩm</a></li>
                <li><a href="{{route('frontend.baiviet')}}">Tin Tức</a></li>
                <li><a href="{{route('frontend.lienhe')}}">Liên Hệ</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i>dvkhang_19pm@student.agu.edu.vn</li>
                <li>Free Shipping đơn hàng trên 2.000.000 VND</li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> dvkhang_19pm@student.agu.edu.vn</li>
                                <li>Free Shipping đơn hàng trên 2.000.000 VND</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            </div>
                            <div class="header__top__right__language">
                                <img src="img/language.png" alt="">
                                <div>English</div>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    <li><a href="#">Spanis</a></li>
                                    <li><a href="#">English</a></li>
                                </ul>
                            </div>
                            <div class="header__top__right__auth">
                                  @guest
                                        @if (Route::has('login'))
                                             <a href="{{ route('khachhang.dangnhap') }}"><i class="fa fa-user"></i> Đăng Nhập</a>
                                        @endif
                                    @else
                                        <div class="header__top__right__language">
                                           
                                            <div>{{ Auth::user()->name }}</div>
                                            <span class="arrow_carrot-down"></span>
                                            <ul>
                                                <li><a href="{{route('khachhang.home')}}">Thông Tin</a></li>
                                                <li><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                                      <span class="dropdown-icon oi oi-account-logout"></span>Đăng Xuất</a>
                                                       <form id="logout-form" action="{{ route('logout') }}" method="post" class="d-none">
                                                      @csrf
                                                      </form>
                                                </li>
                                            </ul>
                                        </div>
                                    @endguest

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="{{route('frontend')}}"><img src="{{ asset('public/Image/logo.png') }}" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="{{route('frontend')}}">Trang Chủ</a></li>
                            <li><a href="{{route('frontend.sanpham')}}">Sản Phẩm</a></li>
                            
                            <li><a href="{{route('frontend.baiviet')}}">Tin Tức</a></li>
                            <li><a href="{{route('frontend.lienhe')}}">Liên Hệ</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                          
                            <li><a href="{{ route('frontend.giohang') }}"><i class="fa fa-shopping-bag"></i> <span>
                                {{Cart::count() > 0 ? Cart::count() : ''}}</span></a></li>

                                
                        </ul>
                        
                        <div class="header__cart__price">Tạm Tính: <span>{{ Cart::total() }} <sup>VNĐ</sup></span></div>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    
    <!-- Hero Section End -->

    
       @yield('content')
    <!-- Blog Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="{{route('frontend')}}"><img src="img/logo.png" alt=""></a>
                        </div>
                        <ul>
                            <li>Địa chỉ: số 18, đường Ung Văn Khiêm, phường Đông Xuyên, thành phố Long Xuyên, tỉnh An Giang</li>
                            <li>Điện thoại: +84 328 789 376 </li>
                            <li>Email: dvkhang_19pm@student.agu.edu.vn</li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>Tham gia bản tin của chúng tôi ngay bây giờ</h6>
                        <p>Nhận thông tin cập nhật qua E-mail về cửa hàng mới nhất của chúng tôi và các ưu đãi đặc biệt.</p>
                        <form action="#">
                            <input type="text" placeholder="Enter your mail">
                            <button type="submit" class="site-btn">Subscribe</button>
                        </form>
                        <div class="footer__widget__social">
                            <a href="#"><i class="fab fa-facebook"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text"><p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Bản quyền &copy;<script>document.write(new Date().getFullYear());</script> Thiết kế và xây dựng <i class="fa fa-heart" aria-hidden="true"></i> bởi <a href="#" target="_blank">Dương Văn Khang</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p></div>
                        <div class="footer__copyright__payment"><img src="{{ asset('public/frontend/assets/img/payment-item.png' ) }}" alt=""></div>
                    </div>
                </div>
            </div>

        </div>
        <button onclick="topFunction()" id="myBtn" title="Về đầu trang"><i class="fa fa-angle-double-up" aria-hidden="true"></i></button>   
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="{{ asset('public/frontend/assets/js/jquery-3.3.1.min.js' ) }}"></script>
    <script src="{{ asset('public/frontend/assets/js/bootstrap.min.js' ) }}"></script>
     @yield('javascript')
    <script src="{{ asset('public/frontend/assets/js/jquery-ui.min.js' ) }}"></script>
    <script src="{{ asset('public/frontend/assets/js/jquery.slicknav.js' ) }}"></script>
    <script src="{{ asset('public/frontend/assets/js/mixitup.min.js' ) }}"></script>
    <script src="{{ asset('public/frontend/assets/js/owl.carousel.min.js' ) }}"></script>
    <script src="{{ asset('public/frontend/assets/js/main.js' ) }}"></script>
    
    <script>
        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {scrollFunction()};

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                document.getElementById("myBtn").style.display = "block";
            } else {
                document.getElementById("myBtn").style.display = "none";
            }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>
     <script>

$(document).ready(function() {
    $('.thongbao').addClass("show");
   $('.thongbao').addClass("showAlert");
   $('.thongbao').removeClass('hide');
    $('.thongbao').delay(3000).slideUp(500);
});
</script>
</body>

</html>