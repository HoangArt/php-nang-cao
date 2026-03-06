<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::where('is_delete', 0);

        if ($request->keyword) {
            $query->where('name', 'like', '%' . $request->keyword . '%');
        }

        if ($request->category) {
            $query->where('category_id', $request->category);
        }

        $products = $query->paginate(10);
        $categories = Category::all();

        return view('product.index', compact('products', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('product.add', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric|min:0',
            'sale_price' => 'nullable|numeric|min:0|lte:price',
            'stock' => 'required|integer|min:0',
            'category_id' => 'nullable|exists:categories,id',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        $product = Product::create($request->all());

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $product->update(['image' => $imagePath]);
        }

        return redirect()->route('products.index')
            ->with('success', 'Thêm sản phẩm thành công');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();

        return view('product.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric|min:0',
            'sale_price' => 'nullable|numeric|min:0|lte:price',
            'stock' => 'required|integer|min:0',
            'category_id' => 'nullable|exists:categories,id',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        $product = Product::findOrFail($id);

        $product->update($request->all());

        if ($request->hasFile('image')) {

            // Xóa ảnh cũ (nếu có)
            if ($product->image && Storage::disk('public')->exists($product->image)) {
                Storage::disk('public')->delete($product->image);
            }

            // Upload ảnh mới
            $path = $request->file('image')->store('products', 'public');
            $data['image'] = $path;
        } else {
            // Không upload ảnh thì giữ ảnh cũ
            $data['image'] = $product->image;
        }

        $product->update($data);

        return redirect()->route('products.index')
            ->with('success', 'Cập nhật thành công');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        $product->update([
            'is_delete' => 1
        ]);

        return redirect()->route('products.index')
            ->with('success', 'Đã xóa sản phẩm');
    }
}
