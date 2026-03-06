#### Bài tập thực hành 2/3/2026
#### Thêm menu "Quản lý Sản phẩm", khi bấm có 2 menu con:
+ Xem danh sách
+ Thêm mới
#### Tạo bảng "products" (tạo migration):
- id
- category_id
- name
- price (decimal)
- sale_price (nullable, decimal)
- stock (int, default 0)
- description (nullable, text)
- image (nullable) (đường dẫn ảnh)
- is_active (bool, default 1)
- is_delete (bool, default 0) (xóa mềm)
- timestamps

#### Gợi ý ràng buộc:
- price >= 0, sale_price >= 0, stock >= 0
- category_id phải tồn tại trong categories, hoặc null

#### Tạo model Product
- $fillable: category_id, name, sku, price, sale_price, stock, description, image, is_active, is_delete

#### Tạo controller ProductController (CRUD)
- index: list (lọc theo keyword/ category nếu muốn)
- create: form
- store: tạo bản ghi
- edit: form edit
- update: cập nhật bản ghi
- destroy: xóa (xóa mềm: set is_delete = 1)

#### Tạo folder view product
- index.blade.php
- create.blade.php (add.blade.php)
- edit.blade.php

#### Yêu cầu thêm
- Khi tạo hoặc cập nhật sản phẩm:
    + Hiện thị Select "Danh mục" để chọn category_id (không nhập tay)
    + category_id phải tồn tại hoặc null
- Validate dữ liệu:
    + name bắt buộc
    + price bắt buộc, số >= 0
    + sale_price (nếu có) phải <= price và >= 0
    + stock bắt buộc, số nguyên >= 0