@extends('fontend.index')
@section('content')
<div class="bg-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-0"><a href="{{ route('home') }}">Trang chủ</a> <span class="mx-2 mb-0">/</span> <a
                    href="{{ route('show_cart') }}">Giỏ hàng</a> <span class="mx-2 mb-0">/</span> <strong
                    class="text-black">Thanh
                    toán</strong></div>
        </div>
    </div>
</div>

<div class="site-section">
    <form action="{{ route('complete') }}" method="post">
        @csrf
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-5 mb-md-0">
                    <h2 class="h3 mb-3 text-black">Thông tin của bạn</h2>
                    <p class="text text-danger">Bạn vui lòng kiểm tra và lưu thông tin nhận hàng trước khi thanh toán
                    </p>
                    <div class="p-3 p-lg-5 border">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="c_fname" class="text-black">Họ <span class="text-danger">*</span></label>
                                <input type="text" value="{{ Auth::guard('customer')->user()->firstname }} "
                                    class="form-control" id="c_fname" name="firstName" required>
                            </div>
                            <div class="col-md-6">
                                <label for="c_lname" class="text-black">Tên <span class="text-danger">*</span></label>
                                <input type="text" value="{{ Auth::guard('customer')->user()->lastname }} "
                                    class="form-control" id="c_lname" name="lastName" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="c_address" class="text-black">Địa chỉ <span
                                        class="text-danger">*</span></label>
                                <input type="text" value="{{ Auth::guard('customer')->user()->address }} "
                                    class="form-control" id="c_address" name="address" required>
                            </div>
                        </div>

                        <div class="form-group row mb-5">
                            <div class="col-md-6">
                                <label for="c_email_address" class="text-black">Email <span
                                        class="text-danger">*</span></label>
                                <input type="text" value="{{ Auth::guard('customer')->user()->email }} "
                                    class="form-control" id="c_email_address" name="email" required>
                            </div>
                            <div class="col-md-6">
                                <label for="c_phone" class="text-black">Số điện thoại <span
                                        class="text-danger">*</span></label>
                                <input type="text" value="{{ Auth::guard('customer')->user()->phonenumber }} "
                                    class="form-control" id="c_phone" name="phoneNumber" required>
                            </div>
                        </div>
                        {{-- <button class="btn btn-block btn-info">Lưu thông tin</button> --}}

                        {{-- <div class="form-group">
                            <label for="c_order_notes" class="text-black">Ghi chú</label>
                            <textarea name="note" id="c_order_notes" cols="30" rows="5" class="form-control"></textarea>
                        </div> --}}

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row mb-5">
                        <div class="col-md-12">
                            <h2 class="h3 mb-3 text-black">Đơn hàng của bạn</h2>
                            <div class="p-3 p-lg-5 border">
                                <table class="table site-block-order-table mb-5">
                                    <thead>
                                        <th>Sản phẩm</th>
                                        <th>Tổng tiền</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($carts as $cart)
                                        <tr>
                                            <td> {{ $cart->name }} <strong class="mx-2">x</strong> {{ $cart->quantity }}
                                            </td>
                                            <td> {{ number_format($cart->quantity * $cart->price,0,',','.').' VNĐ'}}
                                            </td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td class="text-black font-weight-bold"><strong>Tổng cộng</strong></td>
                                            <td class="text-black font-weight-bold"><strong>
                                                    {{ number_format($total,0,',','.').' VNĐ' }}
                                                </strong></td>
                                        </tr>
                                    </tbody>
                                </table>

                                <div class="border p-3 mb-3">
                                    <h3 class="h6 mb-0" style="color: red">Phương thức thanh toán</h3>
                                    <select class="custom-select mt-2" name="methodPay" id="methodPay">
                                        @foreach ($payments as $payment)
                                        <option value=" {{ $payment->id }} "> {{ $payment->name }} </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">Thanh toán</button>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- </form> -->
        </div>
    </form>
</div>
@endsection