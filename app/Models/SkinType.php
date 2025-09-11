<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkinType extends Model
{
    use HasFactory;

    protected $table = 'skintype';
    protected $primaryKey = 'id_skin';
    public $timestamps = false;
    
    protected $fillable = [
        'ten_skin'
    ];

    // Relationships - Many to Many với SanPham
    public function sanPhams()
    {
        return $this->belongsToMany(SanPham::class, 'sanpham_skintype', 'id_skin', 'id_sanpham');
    }
}
