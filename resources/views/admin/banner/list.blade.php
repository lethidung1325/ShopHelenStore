@extends('admin.master')
@section('content')
<div class="container">
    <h3 style="text-align: center">Danh sách banner</h3>
    @include('note.notification')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{ route('add_banner') }}" class="btn btn-success float-right">Thêm banner</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Hình ảnh</th>
                            <th>Mô tả</th>
                            <th>Tình trạng</th>
                            <th>Chỉnh sửa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $i = 1;
                        @endphp
                        @foreach ($banners as $banner)
                        <tr>
                            <th> {{ $i++ }} </th>
                            <th><img src="upload/banner/{{ $banner->image }} " width="150px"></th>
                            <td> {{ $banner->describe }} </td>
                            <td> @if ($banner->status == 1)
                                {{ 'Hiển thị' }}
                                @else {{ 'Ẩn' }}
                                @endif </td>
                            <td><a href="{{ route('edit_banner', $banner->id) }}" class="btn btn-info btn-circle"><i
                                        class="fa fas fa-edit"></i></a>
                                <a href="{{ route('delete_banner', $banner->id) }}"
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