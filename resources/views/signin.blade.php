<!DOCTYPE html>
<html>
<head>
    <title>Sign In</title>
</head>
<body>
    <h2>Đăng ký tài khoản</h2>
    <a href="/">Về trang chủ</a>

    <form method="POST" action="{{ route('check.signin') }}">
        @csrf

        <input type="text" name="username" placeholder="Tên người dùng"><br><br>
        <input type="password" name="password" placeholder="Mật khẩu"><br><br>
        <input type="password" name="repass" placeholder="Nhập lại mật khẩu"><br><br>
        <input type="text" name="mssv" placeholder="MSSV"><br><br>
        <input type="text" name="lopmonhoc" placeholder="Lớp môn học"><br><br>

        <select name="gioitinh">
            <option value="nam">Nam</option>
            <option value="nu">Nữ</option>
        </select><br><br>

        <button type="submit">Đăng ký</button>
    </form>
</body>
</html>