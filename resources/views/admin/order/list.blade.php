@extends('admin.master')
@section('content')
<div class="container-fluid">
    <h3 style="text-align: center">Danh sách đơn hàng</h3>
    @include('note.notification')
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên khách hàng</th>
                            <th>Email</th>
                            <th>Tổng tiền </th>
                            <th>Trạng thái</th>
                            <th>Hình thức thanh toán</th>
                            <th>Xem chi tiết</th>
                            <th>Chỉnh sửa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $i = 1;
                        @endphp
                        @foreach ($orders as $order)
                        <tr>
                            <th> {{ $i++ }} </th>
                            <td> {{ $order->customer->lastname }} {{ $order->customer->name }} </td>
                            <td> {{ $order->customer->email }} </td>
                            <td> {{ number_format($order->total_price,0,',','.').' VNĐ' }} </td>
                            <td> {{ $order->payment_status }} </td>
                            <td> {{ $order->payment->name }} </td>
                            <td><a href="{{ route('order.edit', $order->id) }}">Xem chi tiết</a></td>
                            <td><a href="{{ route('delete_order', $order->id) }}"
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