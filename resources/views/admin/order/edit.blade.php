@extends('admin.master')
@section('content')
<div class="container">
    <h3 style="text-align: center">Xem đơn hàng</h3>
    @include('note.notification')
    <form method="post" action=" {{ route('order.edit', $order->id)}} ">
        @csrf
        <h4 style="color: red">Thông tin khách hàng</h4>
        <div class="form-group">
            <label for="exampleInputEmail1">Họ khách hàng</label>
            <input type="text" disabled name="name" class="form-control" id="exampleInputEmail1"
                value=" {{ $shipping->firstName }} ">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Tên khách hàng</label>
            <input type="text" disabled name="name" class="form-control" id="exampleInputEmail1"
                value=" {{ $shipping->lastName }} ">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Địa chỉ khách hàng</label>
            <input type="text" disabled name="name" class="form-control" id="exampleInputEmail1"
                value=" {{ $shipping->address }} ">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Số điện thoại khách hàng</label>
            <input type="text" disabled name="name" class="form-control" id="exampleInputEmail1"
                value=" {{ $shipping->phoneNumber }} ">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email khách hàng</label>
            <input type="text" disabled name="name" class="form-control" id="exampleInputEmail1"
                value=" {{ $shipping->email }} ">
        </div><br>
        <h4 style="color: red">Danh sách sản phẩm trong đơn hàng</h4>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Giá</th>
                            <th>Size</th>
                            <th>Chỉnh sửa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $i = 1;
                        @endphp
                        @foreach ($order_item as $item)
                        <tr>
                            <th> {{ $i++ }} </th>
                            <td> {{ $item->product->title }} </td>
                            <td> {{ $item->quantity }} </td>
                            <td> {{ number_format($item->price,0,',','.').' VNĐ' }} </td>
                            <td>@if ($item->size == 1 )
                                {{ 'S' }}
                                @endif
                                @if ($item->size == 2 )
                                {{ 'M' }}
                                @endif
                                @if ($item->size == 3 )
                                {{ 'L' }}
                                @endif
                                @if ($item->size == 4 )
                                {{ 'XL' }}
                                @endif</td>
                            <td><a href="{{ route('delete_order_item', $item->id) }}"
                                    onclick="return confirm('Bạn có thật sự muốn xóa?')"
                                    class="btn btn-danger btn-circle"><i class="fa fas fa-trash"></i></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="form-group">
            <input type="checkbox" @if ($order->payment_status == 'Đã xử lý')
            {{ 'checked' }}
            @endif name="payment_status" id="payment_status">
            <label>Xác nhân thành công</label>
        </div>
        <button type="submit" class="btn btn-primary">Lưu</button>
    </form>
</div>
@endsection