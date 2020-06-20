@extends('admin.master')
@section('content')
<div class="container">
    <h3 style="text-align: center">Danh sách thương hiệu sản phẩm</h3>
    @include('note.notification')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{ route('add_category') }}" class="btn btn-success float-right">Thêm thương hiệu</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên thương hiệu</th>
                            <th>Chỉnh sửa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $i = 1;
                        @endphp
                        @foreach ($category as $cate)
                        <tr>
                            <th> {{ $i++ }} </th>
                            <td> {{ $cate->name }} </td>
                            <td><a href="{{ route('edit_category', $cate->id) }}" class="btn btn-info btn-circle"><i
                                        class="fa fas fa-edit"></i></a>
                                <a href="{{ route('delete_category', $cate->id) }}"
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