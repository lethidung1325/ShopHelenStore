@extends('admin.master')
@section('content')
<div class="container">
    <h3 style="text-align: center">Chỉnh sửa sản phẩm</h3>
    @include('note.notification')
    <form method="post" action=" {{ route('edit_product', $product->id)}} " enctype="multipart/form-data">
        @csrf
        <div class="input-group mb-3 form-group">
            <div class="input-group-prepend">
                <label class="input-group-text" for="category">Sửa thương hiệu sản phẩm</label>
            </div>
            <select class="custom-select" name="category" id="category">
                @foreach ($category as $cate)
                <option @if ($product->category->id == $cate->id)
                    {{ "selected" }}
                    @endif value="{{ $cate->id }}"> {{ $cate->name  }} </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Tên sản phẩm</label>
            <input type="text" name="title" value=" {{ $product->title }} " class="form-control" id="exampleInputEmail1"
                placeholder="Nhập tên sản phẩm...">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Giá sản phẩm</label>
            <input type="text" name="price" value=" {{ $product->price }} " class="form-control" id="exampleInputEmail1"
                placeholder="Nhập giá sản phẩm...">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Thông tin sản phẩm</label>
            <textarea type="text" name="content" class="form-control ckeditor"
                id="exampleInputEmail1">{!! $product->content !!} </textarea>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
            <p><img src="upload/image/{{ $product->image }} " width="200px"></p>
            <input type="file" name="image" class="form-control" id="exampleInputEmail1">
        </div>
        <div class="form-group">
            <label for="">Sản phẩm nổi bật</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="product_featured" id="exampleRadios1" value="1"
                    @if($product->product_featured == 1)
                {{ 'checked' }}
                @endif>
                <label class="form-check-label" for="exampleRadios1">
                    Có
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="product_featured" id="exampleRadios2" value="0"
                    @if($product->product_featured == 0)
                {{ 'checked' }}
                @endif>
                <label class="form-check-label" for="exampleRadios2">
                    Không
                </label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Lưu</button>
    </form>
</div>
@endsection
@section('script')
<script src="ckeditor/ckeditor.js"></script>
@endsection