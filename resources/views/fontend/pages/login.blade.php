@extends('fontend.index')
@section('content')
<div class="container" style="width: 500px">
    <form class="mt-5" method="post" action="{{ route('login_customer') }}">
        @csrf
        <h3 class="text-center" style="color: #ee4266">Đăng nhập</h3>
        @include('note.notification')
        <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="email" required name="email" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp" placeholder="Nhập email...">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Mật khẩu</label>
            <input type="password" required name="password" class="form-control" id="exampleInputPassword1"
                placeholder="Nhập mật khẩu...">
        </div>
        <button type="submit" class="btn btn-primary btn-block mt-1">Đăng nhập</button>
    </form>
    <p class="mt-2 text-center">Đăng ký tài khoản mới:<a href="{{ route('get_signup_customer') }}"> Đăng ký</a> </p>
    <hr>
    <p class="mt-2 text-center">Hoặc bạn có thể đằng nhập bằng</p>
    <button onclick="return window.location = ''" class="btn btn-info btn-block">Đăng nhập bằng
        Facebook</button>
    <button onclick="return window.location = '{{ route('google.get') }}'" class="btn btn-danger btn-block">Đăng nhập
        bằng Google</button>
</div>
@endsection