@extends('admin.master')
@section('content')
<div class="container-fluid">
    <h3 style="text-align: center">Danh sách sản phẩm</h3>
    @include('note.notification')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{ route('add_product') }}" class="btn btn-success float-right">Thêm sản phẩm</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên</th>
                            <th>Giá</th>
                            <th>Thương hiệu</th>
                            <th>Sản phẩm nổi bật</th>
                            <th>Hình ảnh</th>
                            <th>Chỉnh sửa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $i = 1;
                        @endphp
                        @foreach ($product as $pro)
                        <tr>
                            <th> {{ $i++ }} </th>
                            <td> {{ $pro->title }} </td>
                            <td> {{ number_format($pro->price, 0, ',', '.').' VNĐ' }} </td>
                            <td> {{ $pro->category->name }} </td>
                            <td>@if ($pro->product_featured == 1)
                                {{ 'Sản phẩm nổi bật' }}
                                @endif
                                @if ($pro->product_featured == 0)
                                {{ 'Sản phẩm không nổi bật' }}
                                @endif</td>
                            <td><img src="upload/image/{{ $pro->image }} " width="70px"></td>
                            <td><a href="{{ route('edit_product', $pro->id) }}" class="btn btn-info btn-circle"><i
                                        class="fa fas fa-edit"></i></a>
                                <a href="{{ route('delete_product', $pro->id) }}"
                                    onclick="return confirm('Bạn có thật sự muốn xóa?')"
                                    class="btn btn-danger btn-circle"><i class="fa fas fa-trash"></i></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection