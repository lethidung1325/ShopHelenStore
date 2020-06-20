@extends('fontend.index')
@section('content')
<script>
    function updateCart(id, quantity) { 
        $.get(
            '{{asset('cart/update')}}',
            {id:id, quantity:quantity},
            function () { 
                location.reload();
            }
        )
    }
    
</script>
<div class="bg-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-0"><a href="{{ route('home') }}">Home</a> <span class="mx-2 mb-0">/</span> <strong
                    class="text-black">Cart</strong></div>
        </div>
    </div>
</div>

<div class="site-section">
    @if (Cart::isEmpty())
    <div class="container">
        <div class="row pl-3">
            <div class="alert alert-danger">
                Giỏ hàng trống
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="row mb-5">
                    <div class="col-md-6">
                        <a href="{{ route('home') }}"><button class="btn btn-outline-primary btn-sm btn-block">Continue
                                Shopping</button></a>
                    </div>
                </div>
                {{-- <div class="row">
                    <div class="col-md-12">
                        <label class="text-black h4" for="coupon">Coupon</label>
                        <p>Enter your coupon code if you have one.</p>
                    </div>
                    <div class="col-md-8 mb-3 mb-md-0">
                        <input type="text" class="form-control py-3" id="coupon" placeholder="Coupon Code">
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-primary btn-sm px-4">Apply Coupon</button>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    @else
    <div class="container">
        <div class="row mb-5">
            <form class="col-md-12" method="post">
                <div class="site-blocks-table">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="product-thumbnail">Hình ảnh</th>
                                <th class="product-name">Tên sản phẩm</th>
                                <th class="product-name">Size</th>
                                <th class="product-price">Giá</th>
                                <th class="product-quantity">Số lượng</th>
                                <th class="product-total">Tổng tiền</th>
                                <th class="product-remove">Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($carts as $cart)

                            <tr>
                                <td class="product-thumbnail">
                                    <img src="upload/image/{{ $cart->attributes->image }}" alt=" Image"
                                        class="img-fluid">
                                </td>
                                <td class="product-name">
                                    <h2 class="h5 text-black"> {{ $cart->name }} </h2>
                                </td>
                                <td> @if ($cart->attributes->size == 1)
                                    {{ 'S' }}
                                @endif
                                @if ($cart->attributes->size == 2)
                                    {{ 'M' }}
                                @endif
                                @if ($cart->attributes->size == 3)
                                    {{ 'L' }}
                                @endif
                                @if ($cart->attributes->size == 4)
                                    {{ 'XL' }}
                                @endif </td>
                                <td> {{ number_format($cart->price,0,',','.').' VNĐ' }} </td>
                                <td>
                                    <div class="input-group mb-3" style="max-width: 120px;">
                                        
                                        <input type="text" onchange="updateCart('{{ $cart->id }}',this.value)"
                                            class="form-control text-center" value="{{ $cart->quantity }}">
                                        
                                    </div>
                                </td>
                                <td> {{ number_format($cart->price*$cart->quantity).' VNĐ' }} </td>
                                <td><a href="{{ route('delete_cart', $cart->id) }}"
                                        class="btn btn-primary height-auto btn-sm">X</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </form>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="row mb-5">
                    <div class="col-md-6 mb-3 mb-md-0">
                        <a href="{{ route('delete_cart', ['id' => 'all']) }}"><button
                                onclick="return confirm('Bạn có chắc muốn xóa?')"
                                class="btn btn-primary btn-sm btn-block">Xóa Giỏ hàng</button></a>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('home') }}"><button class="btn btn-outline-primary btn-sm btn-block">Continue
                                Shopping</button></a>
                    </div>
                </div>
                {{-- <div class="row">
                    <div class="col-md-12">
                        <label class="text-black h4" for="coupon">Coupon</label>
                        <p>Enter your coupon code if you have one.</p>
                    </div>
                    <div class="col-md-8 mb-3 mb-md-0">
                        <input type="text" class="form-control py-3" id="coupon" placeholder="Coupon Code">
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-primary btn-sm px-4">Apply Coupon</button>
                    </div>
                </div> --}}
            </div>
            <div class="col-md-6 pl-5">
                {{-- <form action="{{ route('checkout_cart') }}" method="post"> --}}
                {{-- @csrf --}}
                <div class="row justify-content-end">
                    <div class="col-md-7">
                        <div class="row">
                            <div class="col-md-12 text-right border-bottom mb-5">
                                <h3 class="text-black h4 text-uppercase">Đơn hàng</h3>
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-md-6">
                                <span class="text-black">Tổng cộng</span>
                            </div>
                            <div class="col-md-6 text-right">
                                <strong class="text-black"> {{ number_format($total,0,',','.').' VNĐ' }} </strong>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn btn-primary btn-lg btn-block"
                                    onclick="window.location='{{ route('checkout_cart') }}'">Đặt
                                    hàng</button>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- </form> --}}
            </div>
        </div>
    </div>
    @endif
</div>
@endsection