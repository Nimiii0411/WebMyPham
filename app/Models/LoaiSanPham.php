<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoaiSanPham extends Model
{
    use HasFactory;

    protected $table = 'loaisanpham';
    protected $primaryKey = 'id_loai';
    public $timestamps = true;
    
    protected $fillable = [
        'ten_loai',
        'mota'
    ];

    // Relationships
    public function sanPhams()
    {
        return $this->hasMany(SanPham::class, 'id_loai', 'id_loai');
    }
}
