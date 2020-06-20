@extends('fontend.index')
@section('content')
<div class="container" style="width: 500px">
    <form class="mt-5" method="post" action="{{ route('post_signup_customer') }}">
        @csrf
        <h3 class="text-center" style="color: #ee4266">Đăng ký</h3>
        @include('note.notification')
        <div class="form-group">
            <label for="exampleInputEmail1">Họ</label>
            <input type="text" required name="firstname" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp" placeholder="Nhập Họ của bạn...">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Tên</label>
            <input type="text" required name="lastname" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp" placeholder="Nhập Tên của bạn...">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Địa chỉ</label>
            <input type="text" required name="address" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp" placeholder="Nhập địa chỉ của bạn...">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Số điện thoại</label>
            <input type="text" required name="phonenumber" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp" placeholder="Nhập số điện thoại của bạn...">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="email" equired name="email" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp" placeholder="Nhập email...">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Mật khẩu</label>
            <input type="password" required name="password" class="form-control" id="exampleInputPassword1"
                placeholder="Nhập mật khẩu...">
        </div>
        <button type="submit" class="btn btn-primary btn-block mt-1">Đăng ký</button>
    </form>
    <p class="mt-2 text-center">Quay lại đăng nhập: <a href="{{ route('login_customer') }}"> Đăng nhập</a> </p>
</div>
@endsection