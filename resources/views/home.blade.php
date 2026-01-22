<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
</head>
<body>
    <h1>Trang Home</h1>
    <ul>
        <li>
            <a href="{{ route('product.index') }}">
                Danh sách sản phẩm
            </a>
        </li>

        <li>
            <a href="{{ route('sinhvien') }}">
                Thông tin sinh viên
            </a>
        </li>

        <li>
            <a href="{{ route('banco') }}">
                Bàn cờ (Mặc định là 8x8)
            </a>
        </li>
    </ul>
</body>
</html>