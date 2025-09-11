<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhGia extends Model
{
    use HasFactory;

    protected $table = 'danhgia';
    protected $primaryKey = 'id_danhgia';
    public $timestamps = false;
    
    protected $fillable = [
        'id_nguoidung',
        'id_sanpham',
        'diem_danh_gia',
        'noi_dung'
    ];

    protected $casts = [
        'diem_danh_gia' => 'integer'
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
}
