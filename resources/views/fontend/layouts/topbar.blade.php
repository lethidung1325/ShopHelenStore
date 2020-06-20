<div class="site-navbar bg-white py-2">

    <div class="search-wrap">
        <div class="container">
            <a href="#" class="search-close js-search-close"><span class="icon-close2"></span></a>
            <form action="{{ route('search') }}" method="get">
                <input type="text" name="search" class="form-control" placeholder="Nhập nội dung cần tìm...">
            </form>
        </div>
    </div>

    <div class="container">
        <div class="d-flex align-items-center justify-content-between">
            <div class="logo">
                <div class="site-logo">
                    <a href="{{ route('home') }}" class="js-logo-clone">HELEN STORE</a>
                </div>
            </div>
            <div class="main-nav d-none d-lg-block">
                <nav class="site-navigation text-right text-md-center" role="navigation">
                    <ul class="site-menu js-clone-nav d-none d-lg-block">
                        <li class="active">
                            <a href="{{ route('home') }}"><b>Trang chủ</b></a> </li>
                        <li class="has-children">
                            <b style="color: #000000">THƯƠNG HIỆU</b>
                            <ul class="dropdown">
                                @foreach ($categories as $cate)
                                <li><a href="{{route('category', $cate->id)}}"> {{ $cate->name }} </a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li><a href="{{ route('contact') }}"><b>Liên hệ</b></a></li>
                        @if (!Auth::guard('customer')->check())
                        <li><a href="{{ route('login_customer') }}"><b>Đăng nhập</b></a></li>
                        <li><a href="{{ route('get_signup_customer') }}"><b>Đăng ký</b></a></li>
                        @endif
                    </ul>
                </nav>
            </div>
            <div class="icons">
                <a href="#" class="icons-btn d-inline-block js-search-open"><span class="icon-search"></span></a>
                {{-- <span href="#" class="icons-btn d-inline-block"><span class="icon-heart-o"></span></span> --}}
                <a href="{{ route('show_cart') }}" class="icons-btn d-inline-block bag">
                    <span class="icon-shopping-bag"></span>
                    <span class="number"> {{ Cart::getTotalQuantity() }} </span>
                </a>
                <a href="#" class="site-menu-toggle js-menu-toggle ml-3 d-inline-block d-lg-none"><span
                        class="icon-menu"></span></a>
            </div>
            <div>
                @if (Auth::guard('customer')->check())
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small" style="font-size: 18px">Chào
                        {{ Auth::guard('customer')->user()->lastname }} {{ Auth::guard('customer')->user()->name }}
                    </span>
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu" id="dropdownMenuLink" aria-expanded="false">
                    <a class="dropdown-item" href="{{ route('logout_customer') }}">
                        Đăng xuất
                    </a>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>