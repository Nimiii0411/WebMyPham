<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class NguoiDung extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'nguoidung';
    protected $primaryKey = 'id_nguoidung';
    public $timestamps = false;
    
    protected $fillable = [
        'ten_nguoidung',
        'email',
        'mat_khau',
        'so_dien_thoai',
        'dia_chi',
        'ngay_sinh',
        'gioi_tinh',
        'loai_nguoidung'
    ];

    protected $hidden = [
        'mat_khau'
    ];

    // Override password field for Laravel Auth
    public function getAuthPassword()
    {
        return $this->mat_khau;
    }

    // Relationships
    public function donHangs()
    {
        return $this->hasMany(DonHang::class, 'id_nguoidung', 'id_nguoidung');
    }

    public function wishlists()
    {
        return $this->hasMany(Wishlist::class, 'id_nguoidung', 'id_nguoidung');
    }

    public function danhGias()
    {
        return $this->hasMany(DanhGia::class, 'id_nguoidung', 'id_nguoidung');
    }
}
