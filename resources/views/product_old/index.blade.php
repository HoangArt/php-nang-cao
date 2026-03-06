<!DOCTYPE html>
<html>

<head>
    <title>Product</title>
</head>

<body>
    <h1>Danh sách sản phẩm</h1>
    <li>
        <a href="/">Về trang chủ</a>
    </li>

    <li>
        <a href="{{ route('product.add') }}">Thêm sản phẩm</a>
    </li>

    <table>
        <tr>
            <th>Sản phẩm</th>
            <th>Giá</th>
        </tr>
        @foreach($products as $p)
        <tr>
            <td>{{ $p['name'] }}</td>
            <td>{{ number_format($p['price']) }} VNĐ</td>
        </tr>
        @endforeach
    </table>

</body>

</html>