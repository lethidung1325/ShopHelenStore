@extends('admin.master')
@section('content')
<div class="container">
    <h3 style="text-align: center">Thêm tài khoản người dùng</h3>
    @include('note.notification')
    <form method="post" action=" {{ route('add_customer')}} ">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Tên người dùng</label>
            <input type="text" name="firstname" required class="form-control" id="exampleInputEmail1"
                placeholder="Nhập Tên người dùng...">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Họ người dùng</label>
            <input type="text" name="lastname" required class="form-control" id="exampleInputEmail1"
                placeholder="Nhập Họ người dùng...">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Địa chỉ</label>
            <input type="text" name="address" required class="form-control" id="exampleInputEmail1"
                placeholder="Nhập địa chỉ...">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Số điện thoại</label>
            <input type="text" name="phonenumber" required class="form-control" id="exampleInputEmail1"
                placeholder="Nhập số điện thoại...">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="email" name="email" required class="form-control" id="exampleInputEmail1"
                placeholder="Nhập email...">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Mật khẩu</label>
            <input type="password" name="password" required class="form-control" id="exampleInputEmail1"
                placeholder="Nhập mật khẩu...">
        </div>
        <button type="submit" class="btn btn-primary">Thêm</button>
    </form>
</div>
@endsection