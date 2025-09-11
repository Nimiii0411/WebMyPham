<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThuongHieu extends Model
{
    use HasFactory;

    protected $table = 'thuonghieu';
    protected $primaryKey = 'id_thuonghieu';
    public $timestamps = false;
    
    protected $fillable = [
        'ten_thuonghieu',
        'mota',
        'quoc_gia'
    ];

    // Relationships
    public function sanPhams()
    {
        return $this->hasMany(SanPham::class, 'id_thuonghieu', 'id_thuonghieu');
    }
}
