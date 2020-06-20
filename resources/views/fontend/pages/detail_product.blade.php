@extends('fontend.index')
@section('content')
<div class="bg-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-0"><a href="{{ route('home') }}">Home</a> <span class="mx-2 mb-0">/</span> <a
                    href="{{ route('category', $product->category->id) }}">
                    {{ $product->category->name }} </a> <span class="mx-2 mb-0">/</span> <strong class="text-black">
                    {{ $product->title }} </strong></div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="item-entry">
                    <a href="#" class="product-item md-height bg-gray d-block">
                        <img src="upload/image/{{ $product->image }} " alt="Image" class="img-fluid">
                    </a>

                </div>

            </div>
            <div class="col-md-6">
                <h2 class="text-black"> {{ $product->title }} </h2>
                {!! $product->content !!}
                <p><strong class="text-primary h4"> {{ number_format($product->price).' VNĐ' }} </strong></p>
                <form action="{{ route('add_cart', $product->id) }}" method="get">
                    @csrf
                    <div class="mb-1 d-flex">
                        <label for="option-sm" class="d-flex mr-3 mb-3">
                            <span class="d-inline-block mr-2" style="top:-2px; position: relative;"><input type="radio"
                                    required id="option-sm" value="1" name="size"></span> <span
                                class="d-inline-block text-black">S</span>
                        </label>
                        <label for="option-md" class="d-flex mr-3 mb-3">
                            <span class="d-inline-block mr-2" style="top:-2px; position: relative;"><input type="radio"
                                    id="option-md" value="2" name="size"></span> <span
                                class="d-inline-block text-black">M</span>
                        </label>
                        <label for="option-lg" class="d-flex mr-3 mb-3">
                            <span class="d-inline-block mr-2" style="top:-2px; position: relative;"><input type="radio"
                                    id="option-lg" value="3" name="size"></span> <span
                                class="d-inline-block text-black">L</span>
                        </label>
                        <label for="option-xl" class="d-flex mr-3 mb-3">
                            <span class="d-inline-block mr-2" style="top:-2px; position: relative;"><input type="radio"
                                    id="option-xl" value="4" name="size"></span> <span
                                class="d-inline-block text-black">XL</span>
                        </label>
                    </div>
                    <div class="mb-5">
                        <div class="input-group mb-3" style="max-width: 120px;">
                            <div class="input-group-prepend">
                                <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                            </div>
                            <input type="text" class="form-control text-center" name="qty" value="1" placeholder=""
                                aria-label="Example text with button addon" aria-describedby="button-addon1">
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                            </div>
                        </div>
                    </div>
                    <div class="fb-like" data-href="http://shophelenstore.me/product/detail/{{ $product->id }}"
                        data-width="" data-layout="button_count" data-action="like" data-size="small"
                        data-share="false"></div>
                    <div class="fb-share-button" data-href="http://shophelenstore.me/product/detail"
                        data-layout="button_count" data-size="small"><a target="_blank"
                            href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fshophelenstore.me%2Fproduct%2Fdetail%2F{{ $product->id }}&amp;src=sdkpreparse"
                            class="fb-xfbml-parse-ignore">Chia sẻ</a></div>
                    <br><br>
                    <button style="submit" class="buy-now btn btn-sm height-auto px-4 py-3 btn-primary">Thêm vào giỏ
                        hàng</button>
                    </<a>
                </form>

            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="fb-comments" data-href="http://shophelenstore.me/product/detail/{{ $product->id }}" data-numposts="10"
        data-width=""></div>
</div>

{{-- <div class="container">
    <div class="row bootstrap snippets">
        <div class="col-md-6 col-md-offset-2 col-sm-12">
            <div class="comment-wrapper">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        Bình luận
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('comment.store', $product->id) }}" method="POST">
@csrf
<textarea name="content" id="content" class="form-control" placeholder="Viết nội dung..." rows="3"></textarea>
<br>
@if (!Auth::guard('customer')->check())
<button type="button" disabled class="btn btn-primary pull-right">Bạn phải đăng
    nhập</button>
@else
<button type="submit" class="btn btn-primary pull-right">Comment</button>
@endif
</form>
<div class="clearfix"></div>
<hr>
<ul class="media-list">
    @foreach ($comments as $comment)
    <li class="media">
        <div class="media-body">
            <strong class="text-success">{{ $comment->customer->firstname." ".$comment->customer->lastname }}</strong>
            <span class="text-muted pull-right">
                @php
                Carbon\Carbon::setLocale('vi');
                @endphp
                <small
                    class="text-muted">{{ $comment->created_at->diffForHumans(Carbon\Carbon::now('Asia/Ho_Chi_Minh')) }}</small>

            </span>
            <p style="font-size: 20px; color: #000000">
                {{ $comment->content }}
            </p>
            <div style="margin-top: -10px">
                <a href="{{ route('comment.edit', $comment->id) }}"><button class="btn btn-success">Sửa</button></a>
                <form style="display: inline" action="{{ route('comment.destroy', $comment->id) }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-danger">Xóa</button>
                </form>
            </div>
        </div>
    </li>
    @endforeach
</ul>
</div>
</div>
</div>
</div>
</div>
</div> --}}

<div class="site-section block-3 site-blocks-2">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 site-section-heading text-center pt-4">
                <h2>Sản phẩm liên quan</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 block-3">
                <div class="nonloop-block-3 owl-carousel">
                    @foreach ($related_product as $related)
                    <div class="item">
                        <div class="item-entry">
                            <a href="{{ route('detail_product', $related->id) }}"
                                class="product-item md-height bg-gray d-block">
                                <img src="upload/image/{{ $related->image }} " alt="Image" class="img-fluid">
                            </a>
                            <h2 class="item-title"><a href="{{ route('detail_product', $related->id) }}">
                                    {{ $related->title }} </a></h2>
                            <strong class="item-price"> {{ number_format($related->price, 0, ',', '.').' VNĐ' }}
                            </strong>
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

@section('js')
<div id="fb-root"></div>
<script>
    (function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
@endsection