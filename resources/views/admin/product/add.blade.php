@extends('admin.master')
@section('content')
<div class="container">
    <h3 style="text-align: center">Thêm sản phẩm</h3>
    @include('note.notification')
    <form method="post" action=" {{ route('add_product')}} " enctype="multipart/form-data">
        @csrf
        <div class="input-group mb-3 form-group">
            <div class="input-group-prepend">
                <label class="input-group-text" for="category_id">Thương hiệu sản phẩm</label>
            </div>
            <select class="custom-select" name="category_id" id="category_id">
                {{-- <option value="0">Thể loại</option> --}}
                @foreach ($category as $cate)
                <option value=" {{ $cate->id }} "> {{ $cate->name  }} </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Tên sản phẩm</label>
            <input type="text" name="title" class="form-control" id="exampleInputEmail1"
                placeholder="Nhập tên sản phẩm...">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Giá sản phẩm</label>
            <input type="text" name="price" class="form-control" id="exampleInputEmail1"
                placeholder="Nhập giá sản phẩm...">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Thông tin sản phẩm</label>
            <textarea type="text" name="content" class="form-control" id="ckeditor1"></textarea>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
            <input type="file" name="image" class="form-control" id="exampleInputEmail1">
        </div>
        <div class="form-group">
            <label for="">Sản phẩm nổi bật</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="product_featured" id="exampleRadios1" value="1"
                    checked>
                <label class="form-check-label" for="exampleRadios1">
                    Có
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="product_featured" id="exampleRadios2" value="0">
                <label class="form-check-label" for="exampleRadios2">
                    Không
                </label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Thêm</button>
    </form>
</div>
@endsection
{{-- @section('script')
<script src="ckeditor/ckeditor.js"></script>
@endsection --}}
@section('script')
<script src="backend/ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace('ckeditor');
    CKEDITOR.replace('ckeditor1');
</script>
@endsection