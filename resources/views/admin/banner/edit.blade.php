@extends('admin.master')
@section('content')
<div class="container">
    <h3 style="text-align: center">Sửa Banner</h3>
    @include('note.notification')
    <form method="post" action=" {{ route('edit_banner', $banner->id)}} " enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Mô tả banner</label>
            <textarea type="text" name="describe" class="form-control" id="exampleInputEmail1"
                placeholder="Hãy mô tả banner..."> {{ $banner->describe }} </textarea>
        </div>
        <div class="form-group">
            <label for="">Hình ảnh</label>
            <p><img src="upload/banner/{{ $banner->image }} " width="300px"></p>
            <input type="file" name="image" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Hiển thị</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="1"
                    @if($banner->status == 1)
                {{ "checked" }}
                @endif>
                <label class="form-check-label" for="exampleRadios1">
                    Có
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="status" id="exampleRadios2" value="0"
                    @if($banner->status == 0)
                {{ "checked" }}
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