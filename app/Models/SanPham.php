<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    use HasFactory;

    protected $table = 'sanpham';
    protected $primaryKey = 'id_sanpham';
    public $timestamps = true;
    
    protected $fillable = [
        'ten_sanpham',
        'mota',
        'gia',
        'so_luong',
        'dungtich',
        'thanhphan',
        'huongdan',
        'id_loai',
        'thuonghieu',
        'xuatxu',
        'hinh_anh'
    ];

    protected $casts = [
        'gia' => 'decimal:2',
        'so_luong' => 'integer'
    ];

    // Relationships
    public function loaiSanPham()
    {
        return $this->belongsTo(LoaiSanPham::class, 'id_loai', 'id_loai');
    }

    public function skinTypes()
    {
        return $this->belongsToMany(SkinType::class, 'sanpham_skintype', 'id_sanpham', 'id_skin');
    }

    public function chiTietDonHangs()
    {
        return $this->hasMany(ChiTietDonHang::class, 'id_sanpham', 'id_sanpham');
    }

    public function wishlists()
    {
        return $this->hasMany(Wishlist::class, 'id_sanpham', 'id_sanpham');
    }

    public function danhGias()
    {
        return $this->hasMany(DanhGia::class, 'id_sanpham', 'id_sanpham');
    }

    // Helper methods
    public function isInStock()
    {
        return $this->so_luong > 0;
    }

    public function getAverageRating()
    {
        return $this->danhGias()->avg('diem_danh_gia') ?? 0;
    }

    public function getTotalReviews()
    {
        return $this->danhGias()->count();
    }
}
