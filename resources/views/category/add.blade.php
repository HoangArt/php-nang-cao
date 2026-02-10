<!DOCTYPE html>
<html>

<head>
    <title>Thêm danh mục</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>


    <div class="container">
        <h3 class="mb-4">Thêm Danh mục mới</h3>

        {{-- Hiển thị lỗi validate --}}
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- Tên danh mục --}}
            <div class="mb-3">
                <label class="form-label">Tên danh mục</label>
                <input
                    type="text"
                    name="name"
                    class="form-control"
                    value="{{ old('name') }}"
                    required>
            </div>

            {{-- Mô tả --}}
            <div class="mb-3">
                <label class="form-label">Mô tả</label>
                <textarea
                    name="description"
                    class="form-control"
                    rows="3">{{ old('description') }}</textarea>
            </div>

            {{-- Danh mục cha --}}
            <div class="mb-3">
                <label class="form-label">Danh mục cha</label>
                <select name="parent_id" class="form-select">
                    <option value="">-- Không có --</option>
                    @foreach ($categories as $category)
                    <option
                        value="{{ $category->id }}"
                        @selected(old('parent_id')==$category->id)
                        >
                        {{ $category->name }}
                    </option>
                    @endforeach
                </select>
            </div>

            {{-- Ảnh --}}
            <div class="mb-3">
                <label class="form-label">Hình ảnh</label>
                <input type="file" name="image" class="form-control" accept="image/*">
            </div>

            {{-- Trạng thái --}}
            <div class="mb-3 form-check">
                <input
                    type="checkbox"
                    name="is_active"
                    class="form-check-input"
                    value="1"
                    checked>
                <label class="form-check-label">Kích hoạt</label>
            </div>

            {{-- Nút --}}
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    Lưu
                </button>
                <button onclick="window.history.back()">Quay lại</button>
            </div>
        </form>
    </div>

</body>

</html>