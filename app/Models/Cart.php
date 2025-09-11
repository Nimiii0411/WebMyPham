<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'giohang';
    protected $primaryKey = 'id_giohang';
    
    const CREATED_AT = 'ngay_them';
    const UPDATED_AT = 'ngay_cap_nhat';
    
    protected $fillable = [
        'id_nguoidung',
        'id_sanpham',
        'so_luong',
        'gia_tai_thoi_diem'
    ];

    protected $casts = [
        'so_luong' => 'integer',
        'gia_tai_thoi_diem' => 'decimal:2'
    ];

    // Relationships
    public function nguoiDung()
    {
        return $this->belongsTo(NguoiDung::class, 'id_nguoidung', 'id_nguoidung');
    }

    public function sanPham()
    {
        return $this->belongsTo(SanPham::class, 'id_sanpham', 'id_sanpham');
    }

    // Helper methods
    public function getTotalPriceAttribute()
    {
        return $this->so_luong * $this->gia_tai_thoi_diem;
    }
}
