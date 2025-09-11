<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SanPham;
use App\Models\LoaiSanPham;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProducts = SanPham::where('so_luong', '>', 0)
                                  ->inRandomOrder()
                                  ->take(12)
                                  ->get();
        
        $affordableProducts = SanPham::where('so_luong', '>', 0)
                                   ->where('gia', '<', 500000)
                                   ->inRandomOrder()
                                   ->take(12)
                                   ->get();
        
        $categories = LoaiSanPham::all();
        
        return view('home-venus', compact('featuredProducts', 'affordableProducts', 'categories'));
    }
}