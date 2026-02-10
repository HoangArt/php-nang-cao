#### Bài tập thực hành 9/2/2026
#### Thêm menu "Quản lý Danh mục", khi bấm vào có 2 menu con:
+ Xem danh sách
+ Thêm mới
#### Tạo bảng "categories" (tạo migration):
- id
- name
- description
- image (nullable)
- parent_id (nullable)
- is_active (bool, default 1)
- is_delete (bool, default 0)
- timestamps
#### Tạo model "Category"
- $fillable: name, description, image, parent_id, is_active, is_delete
#### Tạo controller CategoryController (CRUD):
- index: list
- create: form
- store: tạo bản ghi
- edit: form edit
- update: cập nhật bản ghi
- destroy: xóa (xóa mềm)
#### Tạo folder view "category":
- index.blade.php
- create.blade.php (add.blade.php)
- edit.blade.php
#### Yêu cầu thêm:
##### Khi tạo hoặc cập nhật Danh mục:
- Hiển thị Select "Danh mục cha" để bấm chọn thay vì nhập parent_id
- parent_id phải tồn tại, hoặc null
- Không cho chọn parent tạo vòng lặp (Category không thể là con của chính nó hoặc con cháu của nó)