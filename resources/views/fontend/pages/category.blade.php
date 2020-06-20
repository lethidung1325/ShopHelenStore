@extends('fontend.index')
@section('content')
<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="title-section mb-5 col-12">
                <h2 class="text-uppercase"> {{ $category->name }} </h2>
            </div>
        </div>
        <div class="row">
            @foreach ($category->product as $pro)
            <div class="col-lg-4 col-md-6 item-entry mb-4">
                <a href="{{ route('detail_product', $pro->id) }}" class="product-item md-height bg-gray d-block">
                    <img src="upload/image/{{ $pro->image }} " alt="Image" class="img-fluid">
                </a>
                <h2 class="item-title"><a href="{{ route('detail_product', $pro->id) }}">Denim Jacket</a></h2>
                <strong class="item-price"> {{ number_format($pro->price).' VNĐ' }} </strong>

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
@endsection