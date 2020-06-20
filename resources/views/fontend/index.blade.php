<!DOCTYPE html>
<html lang="vn">

<head>
    <meta charset="utf-8">
    <meta name="description"
        content="Shop thời trang HELEN STORE chuyên bán quần áo nữ với các thương hiệu nổi tiếng hiện nay">
    <meta name="keywords" content="thoi trang nu, phu kien nu">
    <meta name="robots" content="INDEX,FOLLOW" />
    <meta name="title" content="Shop Helen Store">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title> Shop Helen Store </title>
    <base href=" {{ asset("") }}/public/">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700">
    <link rel="stylesheet" href="fontend/fonts/icomoon/style.css">

    <link rel="stylesheet" href="fontend/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontend/css/magnific-popup.css">
    <link rel="stylesheet" href="fontend/css/jquery-ui.css">
    <link rel="stylesheet" href="fontend/css/owl.carousel.min.css">
    <link rel="stylesheet" href="fontend/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="fontend/css/aos.css">
    <link rel="stylesheet" href="fontend/css/style.css">

</head>

<body>
    <div class="site-wrap">
        @include('fontend.layouts.topbar')

        {{-- @include('fontend.layouts.banner') --}}

        @yield('content')

        @include('fontend.layouts.footer')
    </div>
    <script src="fontend/js/jquery-3.3.1.min.js"></script>
    <script src="fontend/js/jquery-ui.js"></script>
    <script src="fontend/js/popper.min.js"></script>
    <script src="fontend/js/bootstrap.min.js"></script>
    <script src="fontend/js/owl.carousel.min.js"></script>
    <script src="fontend/js/jquery.magnific-popup.min.js"></script>
    <script src="fontend/js/aos.js"></script>

    <script src="fontend/js/main.js"></script>
    @yield('js')

</body>

</html>