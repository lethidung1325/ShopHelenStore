@extends('admin.master')
@section('content')
<div class="container">
    <h3 style="text-align: center">Sửa tài khoản người dùng</h3>
    @include('note.notification')
    <form method="post" action=" {{ route('edit_customer',$customer->id)}} ">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Tên người dùng</label>
            <input type="text" value="{{ $customer->firstname }}" name="firstname" required class="form-control"
                id="exampleInputEmail1" placeholder="Nhập Tên người dùng...">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Họ người dùng</label>
            <input type="text" value=" {{  $customer->lastname }} " name="lastname" required class="form-control"
                id="exampleInputEmail1" placeholder="Nhập Họ người dùng...">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Địa chỉ</label>
            <input type="text" value=" {{ $customer->address }} " name="address" required class="form-control"
                id="exampleInputEmail1" placeholder="Nhập địa chỉ...">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Số điện thoại</label>
            <input type="text" value=" {{ $customer->phonenumber }} " name="phonenumber" required class="form-control"
                id="exampleInputEmail1" placeholder="Nhập số điện thoại...">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="email" value=" {{ $customer->email }} " name="email" required class="form-control"
                id="exampleInputEmail1" placeholder="Nhập email...">
        </div>
        <div class="form-group">
            <input type="checkbox" name="ChangePassword" id="ChangePass">
            <label>Đổi mật khẩu</label>
            <input disabled class="form-control password" name="password" type="Password"
                placeholder="Nhập mật khẩu mới" />
        </div>
        <div class="form-group">
            <label>Nhập lại mật khẩu</label>
            <input disabled class="form-control password" name="passwordAgain" type="Password"
                placeholder="Nhập lại mật khẩu mới" />
        </div>
        <button type="submit" class="btn btn-primary">Lưu</button>
    </form>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function(){
        $("#ChangePass").change(function(){
            if($(this).is(":checked")){
                $(".password").removeAttr('disabled');
            }else{
                $(".password").attr('disabled','');
            }
        });
    });
</script>
@endsection