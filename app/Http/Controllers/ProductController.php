<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SanPham;
use App\Models\LoaiSanPham;

class ProductController extends Controller
{
    public function index()
    {
        $products = SanPham::with(['loaiSanPham'])
                          ->where('so_luong', '>', 0)
                          ->paginate(12);
        
        $categories = LoaiSanPham::all();
        
        return view('products.index', compact('products', 'categories'));
    }

    public function show($id)
    {
        $product = SanPham::with(['loaiSanPham', 'danhGias.nguoiDung', 'skinTypes'])
                          ->where('id_sanpham', $id)
                          ->firstOrFail();
        
        // Related products from same category
        $relatedProducts = SanPham::where('id_loai', $product->id_loai)
                                 ->where('id_sanpham', '!=', $product->id_sanpham)
                                 ->where('so_luong', '>', 0)
                                 ->take(4)
                                 ->get();
        
        return view('products.show', compact('product', 'relatedProducts'));
    }

    public function byCategory($id)
    {
        $category = LoaiSanPham::findOrFail($id);
        $products = SanPham::where('id_loai', $id)
                          ->where('so_luong', '>', 0)
                          ->paginate(12);
        
        $categories = LoaiSanPham::all();
        
        return view('products.category', compact('products', 'categories', 'category'));
    }

    public function search(Request $request)
    {
        $query = $request->get('q');
        $products = SanPham::where('ten_sanpham', 'LIKE', "%{$query}%")
                          ->orWhere('mota', 'LIKE', "%{$query}%")
                          ->where('so_luong', '>', 0)
                          ->paginate(12);
        
        $categories = LoaiSanPham::all();
        
        return view('products.search', compact('products', 'categories', 'query'));
    }
}
