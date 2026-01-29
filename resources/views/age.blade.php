<!DOCTYPE html>
<html>
<head>
    <title>Nhập tuổi</title>
</head>
<body>
    <h2>Nhập tuổi</h2>
    <a href="/">Về trang chủ</a>

    <form method="POST" action="/age">
        @csrf
        <input type="text" name="age" placeholder="Nhập tuổi">
        <button>Gửi</button>
    </form>
</body>
</html>