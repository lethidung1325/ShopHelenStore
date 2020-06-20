<!DOCTYPE html>
<html>

<head>
    <title>Shop Helen Store</title>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
        }

        p {
            font-weight: bold;
        }

        h2 {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <h2>XÁC NHẬN ĐƠN HÀNG SHOP HELEN STORE</h2>
    <p>Họ: {{ $shipping->firstName }}</p>
    <p>Tên: {{ $shipping->lastName }}</p>
    <p>Địa chỉ: {{ $shipping->address }}</p>
    <p>Số điện thoại: {{ $shipping->phoneNumber }}</p>
    <p>Email: {{ $shipping->email }}</p>
    <table>
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên sản phẩm</th>
                <th>Size</th>
                <th>Giá sản phẩm</th>
                <th>Số lượng</th>
            </tr>
        </thead>
        <tbody>
            @php
            $i = 1;
            @endphp
            @foreach ($order_item as $item)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $item->product->title }}</td>
                <td>@if ($item->size == 1)
                    {{ 'S' }}
                    @endif
                    @if ($item->size == 2)
                    {{ 'M' }}
                    @endif
                    @if ($item->size == 3)
                    {{ 'L' }}
                    @endif
                    @if ($item->size == 4)
                    {{ 'XL' }}
                    @endif</td>
                <td>{{ number_format($item->price,0,',','.').' VNĐ' }}</td>
                <td>{{ $item->quantity }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <p>Tổng tiền: {{ number_format($order->total_price,0,',','.').' VNĐ' }}</p>
</body>

</html>