Bài tập 19/1/2026
1. Tạo project laravel, tạo repo github, đẩy project lên repo
2. Viết các route xử lý các yêu cầu sau
    - "/": Trả về view home
    - "/product": Trả về view product.index (có 1 vài sản phẩm mẫu, 
                    nút thêm mới sản phẩm dẫn đến form thêm mới,
                    fix trên html)
    - "/product/add": Trả về view product.add (co form thêm mới
                    sản phẩm) *Không có chức năng gì*
    - "/product/{id}": id kiểu chuỗi, giá trị mặc định 123
    - gom nhóm "/product"
    - khi không tìm thấy route thì trả về trang error.404
    - cho 1 ví dụ đặt tên route và gọi route qua tên
    - "/sinhvien/{name}/ {mssv}": trả về Thông tin giới thiệu của
        sinh viên làm bài, name mặc định "Bui Huy Hoang",
        mssv mặc định "0005367"
    - "/banco/{n}": trả về view banco hiển thị bàn cờ vua kích thước n*n