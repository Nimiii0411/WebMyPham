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
        Schema::create('cart', function (Blueprint $table) {
            $table->id('id_cart');
            $table->unsignedBigInteger('id_nguoidung');
            $table->unsignedBigInteger('id_sanpham');
            $table->integer('so_luong')->default(1);
            $table->decimal('gia_tai_thoi_diem', 12, 2);
            $table->timestamps();
            
            // Foreign keys
            $table->foreign('id_nguoidung')->references('id_nguoidung')->on('nguoidung')->onDelete('cascade');
            $table->foreign('id_sanpham')->references('id_sanpham')->on('sanpham')->onDelete('cascade');
            
            // Indexes
            $table->index(['id_nguoidung', 'id_sanpham']);
            
            // Unique constraint to prevent duplicate items
            $table->unique(['id_nguoidung', 'id_sanpham']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart');
    }
};
