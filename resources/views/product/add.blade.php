<!DOCTYPE html>
<html>
<head>
    <title>Thêm sản phẩm</title>
</head>
<body>
    <h1>Form thêm sản phẩm</h1>
    <li>
        <a href="/">Về trang chủ</a>
    </li>

    <li>
        <a href="{{ url()->previous() }}">Quay lại</a>
    </li>

    <form>
        <input type="text" placeholder="Tên sản phẩm"><br><br>
        <input type="number" placeholder="Giá"><br><br>
        <button>Thêm</button>
    </form>
</body>
</html>