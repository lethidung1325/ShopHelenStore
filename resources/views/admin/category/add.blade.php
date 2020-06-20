@extends('admin.master')
@section('content')
<div class="container">
    <h3 style="text-align: center">Thêm thương hiệu sản phẩm</h3>
    @include('note.notification')
    <form method="post" action=" {{ route('add_category')}} ">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Tên thương hiệu</label>
            <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                placeholder="Nhập tên thương hiệu..." required >
        </div>
        <button type="submit" class="btn btn-primary">Thêm</button>
    </form>
</div>
@endsection