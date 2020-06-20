@extends('fontend.index')
@section('content')
<div class="bg-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-0"><a href="{{ route('home') }}">Home</a> <span class="mx-2 mb-0">/</span> <strong
                    class="text-black">Thank You</strong></div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <span class="icon-check_circle display-3 text-success"></span>
                <h2 class="display-3 text-black">Thank you!</h2>
                <p class="lead mb-5">Hóa đơn của bạn đã được thanh toán thành công. Shop sẽ liên hệ với bạn trong thời
                    gian sớm nhất.</p>
                <p><a href="{{ route('home') }}" class="btn btn-sm height-auto px-4 py-3 btn-primary">Tiếp tục mua
                        sắm</a></p>
            </div>
        </div>
    </div>
</div>
@endsection