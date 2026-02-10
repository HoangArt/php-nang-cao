<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
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

        <li>
            <a href="{{ route('signin') }}">
                Đăng ký tài khoản
            </a>
        </li>

        <li>
            <a href="{{ route('age') }}">
                Nhập tuổi
            </a>
        </li>

        <!-- Thực hành 9/2/2026 -->
        <li class="nav-item">
            <button type="button" class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Thực hành 9/2/2026: Quản lý Danh mục
            </button>
            <div class="dropdown-menu dropdown-menu-right">
                <ul class="nav flex-column ms-3">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('categories.index') }}">Xem danh sách</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('categories.create') }}">Thêm mới</a>
                    </li>
                </ul>
            </div>
        </li>
        <!-- Thực hành 9/2/2026 --- END -->

    </ul>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>