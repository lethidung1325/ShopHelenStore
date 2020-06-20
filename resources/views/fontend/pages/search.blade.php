@extends('fontend.index')
@section('content')
<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="title-section mb-5 col-12">
                <h2 class="text-uppercase">Tìm kiếm: {{ $keyword }}</h2>
            </div>
        </div>
        <div class="row">
            @foreach ($items as $item)
            <div class="col-lg-4 col-md-6 item-entry mb-4">
                <a href="{{ route('detail_product', $item->id) }}" class="product-item md-height bg-gray d-block">
                    <img src="upload/image/{{ $item->image }} " alt="Image" class="img-fluid">
                </a>
                <h2 class="item-title"><a href="#"> {{ $item->title }} </a></h2>
                <strong class="item-price"><del> {{ number_format($item->price).' VNĐ' }} </del>
                    {{ number_format($item->price).' VNĐ' }} </strong>

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