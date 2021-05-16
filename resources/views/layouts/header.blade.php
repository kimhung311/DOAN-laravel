    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href=""><img src="shop/img/logo.png" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li><a href=""><i class="fa fa-heart"></i> <span>1</span></a></li>
                <li><a href="{{ route('cart.cart-info') }}"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
            </ul>
            <div class="header__cart__price">item: <span>$150.00</span></div>
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__language">
                <img src="shop/img/language.png" alt="">
                <div>English</div>
                <span class="arrow_carrot-down"></span>
                <ul>
                    <li><a href="#">Spanis</a></li>
                    <li><a href="#">English</a></li>
                </ul>
            </div>
            <div class="header__top__right__auth">
                <a href="#"><i class="fa fa-user"></i> Login</a>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="./index.html">Home</a></li>
                <li><a href="./shop-grid.html">Shop</a></li>
                <li><a href="#">Pages</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="./shop-details.html">Shop Details</a></li>
                        <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                        <li><a href="./checkout.html">Check Out</a></li>
                        <li><a href="./blog-details.html">Blog Details</a></li>
                    </ul>
                </li>
                <li><a href="./blog.html">Blog</a></li>
                <li><a href="./contact.html">Contact</a></li>
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
                <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
                <li>Free Shipping for all Order of $99</li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        {{-- <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> aca@iviettech.com</li>
                                <li><a href="/register"><i class="fa fa-user"></i> register</a></li>
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
                                <img src="shop/img/language.png" alt="">
                                <div>English</div>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    <li><a href="#">NGUOI VIET</a></li>
                                    <li><a href="#">English</a></li>
                                </ul>
                            </div>
                            <div class="header__top__right__auth">
                                <a href="/login"><i class="fa fa-user"></i> Login</a>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="col-4">
            <div class="flex-container">
                <div class="flex-item">
                    @auth
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="fa fa-user"></span><span class="text">Xin chào, </span><span>{{ Auth::user()->name }}</span>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item active" href="#">Thông tin tài khoản</a></li>
                            <li>
                               <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Lịch sử mua hàng</a></li>
                            <li>
                               <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Đổi mật khẩu</a></li>
                            <li>
                               <hr class="dropdown-divider">
                            </li>
                            <li>
                               <form action="{{ route('logout') }}" method="POST">
                                  @csrf
                                  <button type="submit"><i class="fas fa-sign-out-alt"></i><span class="text">Logout</span></button>
                               </form>
                            </li>
                        </ul>
                     </div>
                    @endauth
                    
                    @guest
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="fa fa-user"></span><span class="text">Tài khoản</span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
                           <li><a class="dropdown-item" href="{{ route('login') }}">Đăng nhập</a></li>
                           <li>
                              <hr class="dropdown-divider">
                           </li>
                           <li><a class="dropdown-item" href="{{ route('register') }}">Tạo tài khoản</a></li>
                        </ul>
                     </div>
                    @endguest
                </div>
                <div class="flex-item">
                    @include('layouts.parts.cart_number')
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="{{ url('') }}"><img src="shop/img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="{{url('/')}}">Home</a></li>
                            <li><a href="{{ route('home.shop')}}">Shop</a></li>
                            <li><a href="#">Pages</a>
                                <ul class="header__menu__dropdown">s</a></li>
                                    <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                                    <li><a href="./shop-details.html">Shop Detail</a></li>
                                    <li><a href="./checkout.html">Check Out</a></li>
                                    <li><a href="./blog-details.html">Blog Details</a></li>
                                </ul>
                            </li>
                             <li><a href="./blog.html">Blog</a></li>
                            <li><a href="./contact.html">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            {{-- <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                            <li><a href="{{route('cart.cart-info')}}"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
                             --}}
                             <div class="flex-item">
                                @include('layouts.parts.cart_number')
                            </div>
                        </ul>
                        {{-- <div class="header__cart__price">item: <span>$150.00</span></div> --}}
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->