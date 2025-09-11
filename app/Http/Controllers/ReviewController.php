<?php

namespace App\Http\Controllers;

use App\Models\DanhGia;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'id_sanpham' => 'required|exists:sanpham,id_sanpham',
            'diem_danh_gia' => 'required|integer|min:1|max:5',
            'noi_dung' => 'required|string|max:1000|min:10'
        ], [
            'noi_dung.required' => 'Vui lòng nhập nội dung đánh giá',
            'noi_dung.min' => 'Nội dung đánh giá phải có ít nhất 10 ký tự',
            'noi_dung.max' => 'Nội dung đánh giá không được quá 1000 ký tự',
            'diem_danh_gia.required' => 'Vui lòng chọn số sao đánh giá',
            'diem_danh_gia.min' => 'Đánh giá tối thiểu là 1 sao',
            'diem_danh_gia.max' => 'Đánh giá tối đa là 5 sao'
        ]);

        // Check if user already reviewed this product
        $existingReview = DanhGia::where('id_nguoidung', Auth::id())
                                ->where('id_sanpham', $request->id_sanpham)
                                ->first();

        if ($existingReview) {
            return back()->with('error', 'Bạn đã đánh giá sản phẩm này rồi!');
        }

        DanhGia::create([
            'id_nguoidung' => Auth::id(),
            'id_sanpham' => $request->id_sanpham,
            'diem_danh_gia' => $request->diem_danh_gia,
            'noi_dung' => $request->noi_dung
        ]);

        return back()->with('success', 'Cảm ơn bạn đã đánh giá sản phẩm!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'diem_danh_gia' => 'required|integer|min:1|max:5',
            'noi_dung' => 'required|string|max:1000|min:10'
        ]);

        $review = DanhGia::where('id_danhgia', $id)
                         ->where('id_nguoidung', Auth::id())
                         ->firstOrFail();

        $review->update([
            'diem_danh_gia' => $request->diem_danh_gia,
            'noi_dung' => $request->noi_dung
        ]);

        return back()->with('success', 'Đánh giá đã được cập nhật!');
    }

    public function destroy($id)
    {
        $review = DanhGia::where('id_danhgia', $id)
                         ->where('id_nguoidung', Auth::id())
                         ->firstOrFail();

        $review->delete();

        return back()->with('success', 'Đánh giá đã được xóa!');
    }
}
