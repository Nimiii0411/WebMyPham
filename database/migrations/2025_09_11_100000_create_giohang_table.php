<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('giohang', function (Blueprint $table) {
            $table->id('id_giohang');
            $table->unsignedBigInteger('id_nguoidung');
            $table->unsignedBigInteger('id_sanpham');
            $table->integer('so_luong')->default(1);
            $table->decimal('gia_tai_thoi_diem', 12, 2);
            $table->timestamp('ngay_them')->useCurrent();
            $table->timestamp('ngay_cap_nhat')->useCurrent()->useCurrentOnUpdate();
            
            // Indexes
            $table->index('id_nguoidung');
            $table->index('id_sanpham');
            $table->unique(['id_nguoidung', 'id_sanpham'], 'giohang_unique');
            
            // Foreign keys (commented out to avoid errors if tables don't exist)
            // $table->foreign('id_nguoidung')->references('id_nguoidung')->on('nguoidung')->onDelete('cascade');
            // $table->foreign('id_sanpham')->references('id_sanpham')->on('sanpham')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('giohang');
    }
};
