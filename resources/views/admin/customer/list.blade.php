@extends('admin.master')
@section('content')
<div class="container-fluid">
    <h3 style="text-align: center">Danh sách tài khoản người dùng</h3>
    @include('note.notification')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{ route('add_customer') }}" class="btn btn-success float-right">Thêm tài khoản</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Họ</th>
                            <th>Tên</th>
                            <th>Địa chỉ</th>
                            <th>Số điện thoại</th>
                            <th>Email</th>
                            <th>Chỉnh sửa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $i = 1;
                        @endphp
                        @foreach ($customer as $cust)
                        <tr>
                            <th> {{ $i++ }} </th>
                            <td> {{ $cust->lastname }} </td>
                            <td> {{ $cust->firstname }} {{ $cust->name }} </td>
                            <td> {{ $cust->address }} </td>
                            <td> {{ $cust->phonenumber }} </td>
                            <td> {{ $cust->email }} </td>
                            <td><a href="{{ route('edit_customer', $cust->id) }}" class="btn btn-info btn-circle"><i
                                        class="fa fas fa-edit"></i></a>
                                <a href="{{ route('delete_customer', $cust->id) }}"
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