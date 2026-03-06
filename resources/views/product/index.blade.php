<!DOCTYPE html>
<html>

<head>
    <title>Sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <h3>Sản phẩm</h3>
    <div class="d-grid gap-2 col-6 mx-auto">
        <a href="/">Về trang chủ</a>
        <a href="{{ route('products.create') }}" class="btn btn-primary">Thêm sản phẩm</a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Ảnh</th>
                <th>Tên</th>
                <th>Danh mục</th>
                <th>Giá</th>
                <th>Kho</th>
                <th>Hành động</th>
            </tr>
        </thead>

        <tbody>
            @foreach($products as $p)
            <tr>
                <td>{{ $p->id }}</td>
                <td>
                    @if ($p->image)
                    <img src="{{ asset('storage/' . $p->image) }}" alt="{{ $p->name }}" width="50">
                    @else
                    N/A
                    @endif
                </td>
                <td>{{ $p->name }}</td>
                <td>{{ $p->category->name ?? '' }}</td>
                <td>{{ $p->price }}</td>
                <td>{{ $p->stock }}</td>

                <td>
                    <a href="{{ route('products.edit',$p->id) }}">Sửa</a>

                    <form 
                        action="{{ route('products.destroy',$p->id) }}" 
                        method="POST" 
                        style="display:inline-block"
                        onsubmit="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-sm btn-danger">
                            Xóa (mềm)
                        </button>

                    </form>

                </td>

            </tr>

            @endforeach

        </tbody>
    </table>

</body>

</html>