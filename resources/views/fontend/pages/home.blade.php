@extends('fontend.index')
@section('content')
@include('fontend.layouts.banner')
<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="title-section mb-5 col-12">
                <h2 class="text-uppercase">Sản phẩm nổi bật</h2>
            </div>
        </div>
        <div class="row">
            @foreach ($product as $pro)
            <div class="col-lg-4 col-md-6 item-entry mb-4">
                <a href="{{ route('detail_product', $pro->id) }}" class="product-item md-height bg-gray d-block">
                    <img src="upload/image/{{ $pro->image }} " alt="Image" class="img-fluid">
                </a>
                <h2 class="item-title"><a href="{{ route('detail_product', $pro->id) }}"> {{ $pro->title }} </a></h2>
                <strong class="item-price"> {{ number_format($pro->price, 0, ',', '.').' VNĐ' }} </strong>

                <div class="star-rating">
                    <span class="icon-star2 text-warning"></span>
                    <span class="icon-star2 text-warning"></span>
                    <span class="icon-star2 text-warning"></span>
                    <span class="icon-star2 text-warning"></span>
                    <span class="icon-star2 text-warning"></span>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="title-section text-center mb-5 col-12">
                <h2 class="text-uppercase">Sản phẩm mới</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 block-3">
                <div class="nonloop-block-3 owl-carousel">
                    @foreach ($news as $new)
                    <div class="item">
                        <div class="item-entry">
                            <a href="{{ route('detail_product', $new->id) }}"
                                class="product-item md-height bg-gray d-block">
                                <img src=" upload/image/{{ $new->image }} " alt="Image" class="img-fluid">
                            </a>
                            <h2 class="item-title"><a href="{{ route('detail_product', $new->id) }}"> {{ $new->title }}
                                </a></h2>
                            <strong class="item-price"> {{ number_format($new->price, 0, ',', '.').' VNĐ' }} </strong>
                            <div class="star-rating">
                                <span class="icon-star2 text-warning"></span>
                                <span class="icon-star2 text-warning"></span>
                                <span class="icon-star2 text-warning"></span>
                                <span class="icon-star2 text-warning"></span>
                                <span class="icon-star2 text-warning"></span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection