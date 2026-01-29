29/1/26
Commit 1:
Tạo view SignIn để người dùng đăng ký tài khoản gồm các trường
- Username, password, repass, mssv, lopmonhoc, gioitinh
(VD: Hieulx, 123abc, 123abc, 26867, 67PM1, nam)
Khi nhấn Sign In thì gọi đến hàm CheckSignIn
Tạo AuthController có 2 hàm:
- SignIn: Trả về view SignIn
- CheckSignIn: Kiểm tra dữ liệu gửi từ form
    Nếu trùng với thông tin sinh viên làm bài thì trả về "Đăng ký thành công!"
    Nếu password != repass hoặc thông tin sai thì trả về "Đăng ký thất bại"