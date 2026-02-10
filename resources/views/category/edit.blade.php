<!DOCTYPE html>
<html>
</head>
<title>Chỉnh sửa danh mục</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <h3 class="mb-4">Chỉnh sửa Danh mục</h3>

        {{-- Thông báo lỗi --}}
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form
            action="{{ route('categories.update', $category->id) }}"
            method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- Tên danh mục --}}
            <div class="mb-3">
                <label class="form-label">Tên danh mục</label>
                <input
                    type="text"
                    name="name"
                    class="form-control"
                    value="{{ old('name', $category->name) }}"
                    required>
            </div>

            {{-- Mô tả --}}
            <div class="mb-3">
                <label class="form-label">Mô tả</label>
                <textarea
                    name="description"
                    class="form-control"
                    rows="3">{{ old('description', $category->description) }}</textarea>
            </div>

            {{-- Danh mục cha --}}
            <div class="mb-3">
                <label class="form-label">Danh mục cha</label>
                <select name="parent_id" class="form-select">
                    <option value="">-- Không có --</option>
                    @foreach ($categories as $cat)
                    <option
                        value="{{ $cat->id }}"
                        @selected(old('parent_id', $category->parent_id) == $cat->id)
                        >
                        {{ $cat->name }}
                    </option>
                    @endforeach
                </select>
            </div>

            {{-- Ảnh --}}
            <div class="mb-3">
                <label class="form-label">Hình ảnh</label>
                <input type="file" name="image" class="form-control" accept="image/*">

                @if ($category->image)
                <div class="mt-2">
                    <img
                        src="{{ asset('storage/' . $category->image) }}"
                        width="120"
                        class="img-thumbnail">
                </div>
                @endif
            </div>

            {{-- Trạng thái --}}
            <div class="mb-3 form-check">
                <input
                    type="checkbox"
                    name="is_active"
                    class="form-check-input"
                    value="1"
                    @checked(old('is_active', $category->is_active))
                >
                <label class="form-check-label">Kích hoạt</label>
            </div>

            {{-- Nút --}}
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    Cập nhật
                </button>
                <a href="{{ route('categories.index') }}" class="btn btn-secondary">
                    Quay lại
                </a>
            </div>
        </form>
    </div>

</body>

</html>