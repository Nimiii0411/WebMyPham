<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietDonHang extends Model
{
    use HasFactory;

    protected $table = 'chitietdonhang';
    protected $primaryKey = null;
    public $incrementing = false;
    public $timestamps = false;
    
    protected $fillable = [
        'id_donhang',
        'id_sanpham',
        'so_luong',
        'gia'
    ];

    protected $casts = [
        'gia' => 'decimal:2',
        'so_luong' => 'integer'
    ];

    // Relationships
    public function donHang()
    {
        return $this->belongsTo(DonHang::class, 'id_donhang', 'id_donhang');
    }

    public function sanPham()
    {
        return $this->belongsTo(SanPham::class, 'id_sanpham', 'id_sanpham');
    }

    // Helper methods
    public function getSubTotal()
    {
        return $this->soluong * $this->gia;
    }
}
