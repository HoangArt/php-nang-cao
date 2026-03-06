<!DOCTYPE html>
<html>

<head>
    <title>Chỉnh sửa sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">

        <h3 class="mb-4">Chỉnh sửa sản phẩm</h3>

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

        <form action="{{ route('products.update',$product->id) }}"
            method="POST"
            enctype="multipart/form-data">

            @csrf
            @method('PUT')

            {{-- Tên sản phẩm --}}
            <div class="mb-3">
                <label>Tên sản phẩm</label>
                <input
                    type="text"
                    name="name"
                    class="form-control"
                    value="{{ old('name',$product->name) }}"
                    required>
            </div>

            {{-- Danh mục --}}
            <div class="mb-3">
                <label>Danh mục</label>
                <select name="category_id" class="form-control">
                    <option value="">--Chọn--</option>

                    @foreach($categories as $c)
                    <option
                        value="{{ $c->id }}"
                        @selected(old('category_id',$product->category_id)==$c->id)>
                        {{ $c->name }}
                    </option>
                    @endforeach

                </select>
            </div>

            {{-- Giá --}}
            <div class="mb-3">
                <label>Giá</label>
                <input
                    type="number"
                    name="price"
                    class="form-control"
                    value="{{ old('price',$product->price) }}"
                    step="0.01"
                    required>
            </div>

            {{-- Giá khuyến mãi --}}
            <div class="mb-3">
                <label>Giá khuyến mãi</label>
                <input
                    type="number"
                    name="sale_price"
                    class="form-control"
                    value="{{ old('sale_price',$product->sale_price) }}"
                    step="0.01">
            </div>

            {{-- Stock --}}
            <div class="mb-3">
                <label>Stock</label>
                <input
                    type="number"
                    name="stock"
                    class="form-control"
                    value="{{ old('stock',$product->stock) }}">
            </div>

            {{-- Mô tả --}}
            <div class="mb-3">
                <label>Mô tả</label>
                <textarea
                    name="description"
                    class="form-control"
                    rows="3">{{ old('description',$product->description) }}</textarea>
            </div>

            {{-- Ảnh --}}
            <div class="mb-3">
                <label>Hình ảnh</label>
                <input type="file" name="image" class="form-control" accept="image/*">

                @if($product->image)
                <div class="mt-2">
                    <img src="{{ asset('storage/'.$product->image) }}" width="120" class="img-thumbnail">
                </div>
                @endif
            </div>

            {{-- Button --}}
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    Cập nhật
                </button>

                <a href="{{ route('products.index') }}" class="btn btn-secondary">
                    Quay lại
                </a>
            </div>

        </form>

    </div>
</body>

</html>