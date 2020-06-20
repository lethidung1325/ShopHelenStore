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
    <h2>HÓA ĐƠN SHOP HELEN STORE</h2>
    <p>Họ: {{ Auth::guard('customer')->user()->firstname }}</p>
    <p>Tên: {{ Auth::guard('customer')->user()->lastname }}</p>
    <p>Địa chỉ: {{ Auth::guard('customer')->user()->address }}{{ $shipping->address }}</p>
    <p>Số điện thoại: {{ Auth::guard('customer')->user()->phonenumber }}{{ $shipping->phoneNumber }}</p>
    <p>Email: {{ Auth::guard('customer')->user()->email }}</p>
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
            @foreach ($carts as $cart)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $cart->name }}</td>
                <td>@if ($cart->attributes['size'] == 1)
                    {{ 'S' }}
                    @endif
                    @if ($cart->attributes['size'] == 2)
                    {{ 'M' }}
                    @endif
                    @if ($cart->attributes['size'] == 3)
                    {{ 'L' }}
                    @endif
                    @if ($cart->attributes['size'] == 4)
                    {{ 'XL' }}
                    @endif</td>
                <td>{{ number_format($cart->price,0,',','.').' VNĐ' }}</td>
                <td>{{ $cart->quantity }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <p>Tổng tiền: {{ number_format($total,0,',','.').' VNĐ' }}</p>
</body>

</html>