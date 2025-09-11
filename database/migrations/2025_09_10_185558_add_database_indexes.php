<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Add indexes for better performance
        
        // SanPham table indexes
        Schema::table('sanpham', function (Blueprint $table) {
            $table->index('gia', 'idx_sanpham_gia');
            $table->index('loai_sanpham_id', 'idx_sanpham_loai');
            $table->index('thuonghieu_id', 'idx_sanpham_thuonghieu');
            $table->index(['gia', 'loai_sanpham_id'], 'idx_sanpham_gia_loai');
            $table->index('created_at', 'idx_sanpham_created');
            $table->fullText(['ten_sanpham', 'mo_ta'], 'idx_sanpham_search');
        });

        // DonHang table indexes
        Schema::table('donhang', function (Blueprint $table) {
            $table->index('nguoidung_id', 'idx_donhang_nguoidung');
            $table->index('trang_thai', 'idx_donhang_trangthai');
            $table->index('created_at', 'idx_donhang_created');
            $table->index(['nguoidung_id', 'trang_thai'], 'idx_donhang_user_status');
        });

        // ChiTietDonHang table indexes
        Schema::table('chitietdonhang', function (Blueprint $table) {
            $table->index('donhang_id', 'idx_chitiet_donhang');
            $table->index('sanpham_id', 'idx_chitiet_sanpham');
        });

        // DanhGia table indexes
        Schema::table('danhgia', function (Blueprint $table) {
            $table->index('sanpham_id', 'idx_danhgia_sanpham');
            $table->index('nguoidung_id', 'idx_danhgia_nguoidung');
            $table->index('diem_danh_gia', 'idx_danhgia_diem');
            $table->index('created_at', 'idx_danhgia_created');
        });

        // Wishlist table indexes
        Schema::table('wishlist', function (Blueprint $table) {
            $table->index('nguoidung_id', 'idx_wishlist_nguoidung');
            $table->index('sanpham_id', 'idx_wishlist_sanpham');
            $table->unique(['nguoidung_id', 'sanpham_id'], 'idx_wishlist_unique');
        });

        // NguoiDung table indexes
        Schema::table('nguoidung', function (Blueprint $table) {
            $table->index('email', 'idx_nguoidung_email');
            $table->index('sdt', 'idx_nguoidung_sdt');
            $table->index('created_at', 'idx_nguoidung_created');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop indexes
        Schema::table('sanpham', function (Blueprint $table) {
            $table->dropIndex('idx_sanpham_gia');
            $table->dropIndex('idx_sanpham_loai');
            $table->dropIndex('idx_sanpham_thuonghieu');
            $table->dropIndex('idx_sanpham_gia_loai');
            $table->dropIndex('idx_sanpham_created');
            $table->dropFullText('idx_sanpham_search');
        });

        Schema::table('donhang', function (Blueprint $table) {
            $table->dropIndex('idx_donhang_nguoidung');
            $table->dropIndex('idx_donhang_trangthai');
            $table->dropIndex('idx_donhang_created');
            $table->dropIndex('idx_donhang_user_status');
        });

        Schema::table('chitietdonhang', function (Blueprint $table) {
            $table->dropIndex('idx_chitiet_donhang');
            $table->dropIndex('idx_chitiet_sanpham');
        });

        Schema::table('danhgia', function (Blueprint $table) {
            $table->dropIndex('idx_danhgia_sanpham');
            $table->dropIndex('idx_danhgia_nguoidung');
            $table->dropIndex('idx_danhgia_diem');
            $table->dropIndex('idx_danhgia_created');
        });

        Schema::table('wishlist', function (Blueprint $table) {
            $table->dropIndex('idx_wishlist_nguoidung');
            $table->dropIndex('idx_wishlist_sanpham');
            $table->dropUnique('idx_wishlist_unique');
        });

        Schema::table('nguoidung', function (Blueprint $table) {
            $table->dropIndex('idx_nguoidung_email');
            $table->dropIndex('idx_nguoidung_sdt');
            $table->dropIndex('idx_nguoidung_created');
        });
    }
};
