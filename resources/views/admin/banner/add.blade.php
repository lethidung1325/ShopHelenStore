@extends('admin.master')
@section('content')
<div class="container">
    <h3 style="text-align: center">Thêm Banner</h3>
    @include('note.notification')
    <form method="post" action=" {{ route('add_banner')}} " enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Mô tả banner</label>
            <textarea type="text" name="describe" class="form-control" id="exampleInputEmail1"
                placeholder="Hãy mô tả banner..."></textarea>
        </div>
        <div class="form-group">
            <label for="">Hình ảnh</label>
            <input type="file" name="image" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Hiển thị</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="1" checked>
                <label class="form-check-label" for="exampleRadios1">
                    Có
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="status" id="exampleRadios2" value="0">
                <label class="form-check-label" for="exampleRadios2">
                    Không
                </label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Thêm</button>
    </form>
</div>
@endsection