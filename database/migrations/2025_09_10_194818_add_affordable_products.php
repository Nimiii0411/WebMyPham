<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\SanPham;
use App\Models\LoaiSanPham;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Get category IDs
        $cleanser = LoaiSanPham::where('ten_loai', 'Cleanser')->first()->id_loai ?? 1;
        $serum = LoaiSanPham::where('ten_loai', 'Serum')->first()->id_loai ?? 2;
        $toner = LoaiSanPham::where('ten_loai', 'Toner')->first()->id_loai ?? 9;
        $sunscreen = LoaiSanPham::where('ten_loai', 'Sunscreen')->first()->id_loai ?? 4;

        // Add affordable products
        $affordableProducts = [
            [
                'ten_sanpham' => 'Venus Daily Gentle Cleanser',
                'mota' => 'Gentle foaming cleanser for daily use. Removes makeup and impurities without stripping natural oils, suitable for all skin types.',
                'gia' => 280000,
                'so_luong' => 60,
                'dungtich' => '150ml',
                'id_loai' => $cleanser,
                'thuonghieu' => 'Venus',
                'xuatxu' => 'France',
                'thanhphan' => 'Mild Surfactants, Chamomile Extract, Glycerin, Panthenol',
                'huongdan' => 'Apply to wet face, massage gently, rinse with warm water.',
                'hinh_anh' => 'venus-gentle-cleanser.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ten_sanpham' => 'Venus Hydrating Toner',
                'mota' => 'Alcohol-free toner that balances and refreshes skin. Contains natural botanicals to prepare skin for better product absorption.',
                'gia' => 320000,
                'so_luong' => 45,
                'dungtich' => '200ml',
                'id_loai' => $toner,
                'thuonghieu' => 'Venus',
                'xuatxu' => 'France',
                'thanhphan' => 'Rose Water, Hyaluronic Acid, Green Tea Extract, Aloe Vera',
                'huongdan' => 'Apply with cotton pad or pat gently into skin after cleansing.',
                'hinh_anh' => 'venus-hydrating-toner.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ten_sanpham' => 'Venus Vitamin C Daily Serum',
                'mota' => 'Brightening serum with stable vitamin C derivative. Helps reduce dark spots and improves skin radiance with continued use.',
                'gia' => 450000,
                'so_luong' => 35,
                'dungtich' => '30ml',
                'id_loai' => $serum,
                'thuonghieu' => 'Venus',
                'xuatxu' => 'France',
                'thanhphan' => 'Magnesium Ascorbyl Phosphate, Niacinamide, Hyaluronic Acid, Ferulic Acid',
                'huongdan' => 'Apply 2-3 drops to clean skin in the morning before moisturizer.',
                'hinh_anh' => 'venus-vitamin-c-serum.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ten_sanpham' => 'Venus Daily Moisturizer SPF30',
                'mota' => 'Lightweight moisturizer with broad-spectrum sun protection. Perfect for daily use, provides hydration and UV protection in one step.',
                'gia' => 380000,
                'so_luong' => 50,
                'dungtich' => '50ml',
                'id_loai' => $sunscreen,
                'thuonghieu' => 'Venus',
                'xuatxu' => 'France',
                'thanhphan' => 'Zinc Oxide, Titanium Dioxide, Hyaluronic Acid, Ceramides',
                'huongdan' => 'Apply generously to face and neck every morning as final step.',
                'hinh_anh' => 'venus-daily-moisturizer-spf.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($affordableProducts as $product) {
            SanPham::create($product);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Remove affordable products
        SanPham::whereIn('ten_sanpham', [
            'Venus Daily Gentle Cleanser',
            'Venus Hydrating Toner', 
            'Venus Vitamin C Daily Serum',
            'Venus Daily Moisturizer SPF30'
        ])->delete();
    }
};
