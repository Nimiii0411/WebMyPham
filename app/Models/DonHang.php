<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonHang extends Model
{
    use HasFactory;

    protected $table = 'donhang';
    protected $primaryKey = 'id_donhang';
    public $timestamps = false;
    
    protected $fillable = [
        'id_user',
        'ngaylap',
        'tongtien',
        'trangthai'
    ];

    protected $casts = [
        'ngaylap' => 'datetime',
        'tongtien' => 'decimal:2'
    ];

    // Relationships
    public function nguoiDung()
    {
        return $this->belongsTo(NguoiDung::class, 'id_user', 'id_user');
    }

    public function chiTietDonHangs()
    {
        return $this->hasMany(ChiTietDonHang::class, 'id_donhang', 'id_donhang');
    }

    // Helper methods
    public function getTotalItems()
    {
        return $this->chiTietDonHangs()->sum('soluong');
    }
}
