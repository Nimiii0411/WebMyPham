<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\SanPham;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $cartItems = Cart::with(['sanPham', 'sanPham.loaiSanPham'])
                        ->where('id_nguoidung', Auth::id())
                        ->get();
        
        $total = $cartItems->sum(function($item) {
            return $item->so_luong * $item->gia_tai_thoi_diem;
        });
        
        // Return JSON for AJAX requests
        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'items' => $cartItems,
                'total' => $total,
                'count' => $cartItems->sum('so_luong')
            ]);
        }
        
        return view('cart.index', compact('cartItems', 'total'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'id_sanpham' => 'required|exists:sanpham,id_sanpham',
            'so_luong' => 'required|integer|min:1'
        ]);

        $product = SanPham::findOrFail($request->id_sanpham);
        
        // Check if product has enough stock
        if ($product->so_luong < $request->so_luong) {
            return response()->json([
                'success' => false,
                'message' => 'Limited stock available'
            ]);
        }

        // Check if item already exists in cart
        $cartItem = Cart::where('id_nguoidung', Auth::id())
                       ->where('id_sanpham', $request->id_sanpham)
                       ->first();

        if ($cartItem) {
            // Update existing item
            $newQuantity = $cartItem->so_luong + $request->so_luong;
            
            if ($product->so_luong < $newQuantity) {
                return response()->json([
                    'success' => false,
                    'message' => 'Số lượng sản phẩm không đủ trong kho.'
                ]);
            }
            
            $cartItem->update(['so_luong' => $newQuantity]);
        } else {
            // Create new cart item
            Cart::create([
                'id_nguoidung' => Auth::id(),
                'id_sanpham' => $request->id_sanpham,
                'so_luong' => $request->so_luong,
                'gia_tai_thoi_diem' => $product->gia
            ]);
        }

        // Get updated cart count
        $cartCount = Cart::where('id_nguoidung', Auth::id())->sum('so_luong');

        return response()->json([
            'success' => true,
            'message' => 'Added to your collection ✨',
            'cartCount' => $cartCount
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'so_luong' => 'required|integer|min:1'
        ]);

        $cartItem = Cart::where('id_giohang', $id)
                       ->where('id_nguoidung', Auth::id())
                       ->firstOrFail();

        $product = $cartItem->sanPham;
        
        if ($product->so_luong < $request->so_luong) {
            return response()->json([
                'success' => false,
                'message' => 'Số lượng sản phẩm không đủ trong kho.'
            ]);
        }

        $cartItem->update(['so_luong' => $request->so_luong]);

        // Get updated cart count
        $cartCount = Cart::where('id_nguoidung', Auth::id())->sum('so_luong');

        return response()->json([
            'success' => true,
            'message' => 'Cart updated beautifully',
            'cartCount' => $cartCount
        ]);
    }

    public function remove($id)
    {
        $cartItem = Cart::where('id_giohang', $id)
                       ->where('id_nguoidung', Auth::id())
                       ->firstOrFail();

        $cartItem->delete();

        // Get updated cart count
        $cartCount = Cart::where('id_nguoidung', Auth::id())->sum('so_luong');

        return response()->json([
            'success' => true,
            'message' => 'Removed from collection',
            'cartCount' => $cartCount
        ]);
    }

    public function clear()
    {
        Cart::where('id_nguoidung', Auth::id())->delete();

        return response()->json([
            'success' => true,
            'message' => 'Giỏ hàng đã được xóa.'
        ]);
    }

    public function getCount()
    {
        if (!Auth::check()) {
            return response()->json(['count' => 0]);
        }

        $count = Cart::where('id_nguoidung', Auth::id())->sum('so_luong');
        
        return response()->json(['count' => $count]);
    }
}
