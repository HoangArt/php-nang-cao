<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;

class CategoryController extends Controller
{
    // Danh sách
    public function index()
    {
        $categories = Category::where('is_delete', 0)
            ->with('parent')
            ->get();

        return view('category.index', compact('categories'));
    }

    // Form tạo mới
    public function create()
    {
        $categories = Category::where('is_delete', 0)->get();
        return view('category.add', compact('categories'));
    }

    // Lưu bản ghi mới (Kiểm tra parent)
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'parent_id' => 'nullable|exists:categories,id'
        ]);

        $data = $request->all();

        // Upload ảnh
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('categories', 'public');
            $data['image'] = $path;
        }

        Category::create($data);

        return redirect()->route('categories.index')
            ->with('success', 'Thêm danh mục thành công');
    }

    // Form chỉnh sửa
    public function edit(Category $category)
    {
        $categories = Category::where('is_delete', 0)
            ->where('id', '!=', $category->id)
            ->get();

        return view('category.edit', compact('category', 'categories'));
    }

    // Cập nhật bản ghi (Kiểm tra parent)
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'parent_id' => 'nullable|exists:categories,id'
        ]);

        // Không cho chọn chính nó làm cha
        if ($request->parent_id == $category->id) {
            return back()->withErrors([
                'parent_id' => 'Không thể chọn chính nó làm danh mục cha'
            ]);
        }

        // Không cho chọn con/cháu
        if ($this->isDescendant($category, $request->parent_id)) {
            return back()->withErrors([
                'parent_id' => 'Không thể chọn danh mục con làm cha'
            ]);
        }

        $data = $request->all();

        // XỬ LÝ ẢNH
        if ($request->hasFile('image')) {

            // Xóa ảnh cũ (nếu có)
            if ($category->image && Storage::disk('public')->exists($category->image)) {
                Storage::disk('public')->delete($category->image);
            }

            // Upload ảnh mới
            $path = $request->file('image')->store('categories', 'public');
            $data['image'] = $path;
        } else {
            // Không upload ảnh thì giữ ảnh cũ
            $data['image'] = $category->image;
        }

        $category->update($data);

        return redirect()->route('categories.index')
            ->with('success', 'Cập nhật danh mục thành công');
    }

    // Kiểm tra có phải con/cháu không
    private function isDescendant(Category $category, $parentId)
    {
        if (!$parentId) return false;

        $children = $category->children;

        foreach ($children as $child) {
            if ($child->id == $parentId) return true;
            if ($this->isDescendant($child, $parentId)) return true;
        }

        return false;
    }

    // Xóa mềm
    public function destroy(Category $category)
    {
        $category->update(['is_delete' => 1]);

        return redirect()->route('categories.index')
            ->with('success', 'Xóa danh mục thành công');
    }

    // Hiển thị chi tiết (không dùng)
    public function show(Category $category)
    {
        return redirect()->route('categories.index', $category);
    }
}
