<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class QueryOptimizer
{
    /**
     * Cache frequently accessed data
     */
    public static function cachePopularProducts($limit = 10)
    {
        return Cache::remember('popular_products', 3600, function () use ($limit) {
            return DB::table('sanpham')
                ->select('sanpham.*', DB::raw('AVG(danhgia.diem_danh_gia) as avg_rating'), DB::raw('COUNT(danhgia.id) as total_reviews'))
                ->leftJoin('danhgia', 'sanpham.id', '=', 'danhgia.sanpham_id')
                ->groupBy('sanpham.id')
                ->orderBy('avg_rating', 'desc')
                ->orderBy('total_reviews', 'desc')
                ->limit($limit)
                ->get();
        });
    }

    /**
     * Cache categories with product count
     */
    public static function cacheCategoriesWithCount()
    {
        return Cache::remember('categories_with_count', 3600, function () {
            return DB::table('loaisanpham')
                ->select('loaisanpham.*', DB::raw('COUNT(sanpham.id) as product_count'))
                ->leftJoin('sanpham', 'loaisanpham.id', '=', 'sanpham.loai_sanpham_id')
                ->groupBy('loaisanpham.id')
                ->having('product_count', '>', 0)
                ->orderBy('product_count', 'desc')
                ->get();
        });
    }

    /**
     * Get products with optimized queries
     */
    public static function getProductsOptimized($filters = [])
    {
        $query = DB::table('sanpham')
            ->select([
                'sanpham.*',
                'loaisanpham.ten_loai',
                'thuonghieu.ten_thuonghieu',
                DB::raw('AVG(danhgia.diem_danh_gia) as avg_rating'),
                DB::raw('COUNT(danhgia.id) as review_count')
            ])
            ->leftJoin('loaisanpham', 'sanpham.loai_sanpham_id', '=', 'loaisanpham.id')
            ->leftJoin('thuonghieu', 'sanpham.thuonghieu_id', '=', 'thuonghieu.id')
            ->leftJoin('danhgia', 'sanpham.id', '=', 'danhgia.sanpham_id')
            ->groupBy([
                'sanpham.id',
                'sanpham.ten_sanpham',
                'sanpham.mo_ta',
                'sanpham.gia',
                'sanpham.hinh_anh',
                'sanpham.loai_sanpham_id',
                'sanpham.thuonghieu_id',
                'sanpham.created_at',
                'sanpham.updated_at',
                'loaisanpham.ten_loai',
                'thuonghieu.ten_thuonghieu'
            ]);

        // Apply filters
        if (isset($filters['category_id'])) {
            $query->where('sanpham.loai_sanpham_id', $filters['category_id']);
        }

        if (isset($filters['brand_id'])) {
            $query->where('sanpham.thuonghieu_id', $filters['brand_id']);
        }

        if (isset($filters['min_price'])) {
            $query->where('sanpham.gia', '>=', $filters['min_price']);
        }

        if (isset($filters['max_price'])) {
            $query->where('sanpham.gia', '<=', $filters['max_price']);
        }

        if (isset($filters['search'])) {
            $query->where(function($q) use ($filters) {
                $q->where('sanpham.ten_sanpham', 'LIKE', '%' . $filters['search'] . '%')
                  ->orWhere('sanpham.mo_ta', 'LIKE', '%' . $filters['search'] . '%');
            });
        }

        // Apply sorting
        $sortBy = $filters['sort_by'] ?? 'created_at';
        $sortOrder = $filters['sort_order'] ?? 'desc';

        switch ($sortBy) {
            case 'price_low':
                $query->orderBy('sanpham.gia', 'asc');
                break;
            case 'price_high':
                $query->orderBy('sanpham.gia', 'desc');
                break;
            case 'rating':
                $query->orderBy('avg_rating', 'desc');
                break;
            case 'popularity':
                $query->orderBy('review_count', 'desc');
                break;
            default:
                $query->orderBy('sanpham.' . $sortBy, $sortOrder);
                break;
        }

        return $query;
    }

    /**
     * Cache user's recent orders
     */
    public static function cacheUserOrders($userId)
    {
        $cacheKey = "user_orders_{$userId}";
        
        return Cache::remember($cacheKey, 1800, function () use ($userId) {
            return DB::table('donhang')
                ->select([
                    'donhang.*',
                    DB::raw('COUNT(chitietdonhang.id) as item_count'),
                    DB::raw('SUM(chitietdonhang.so_luong * chitietdonhang.gia) as total_amount')
                ])
                ->leftJoin('chitietdonhang', 'donhang.id', '=', 'chitietdonhang.donhang_id')
                ->where('donhang.nguoidung_id', $userId)
                ->groupBy('donhang.id')
                ->orderBy('donhang.created_at', 'desc')
                ->limit(10)
                ->get();
        });
    }

    /**
     * Clear cache when data changes
     */
    public static function clearProductCache()
    {
        Cache::forget('popular_products');
        Cache::forget('categories_with_count');
        
        // Clear all user caches (you might want to be more specific)
        $keys = Cache::getRedis()->keys('user_orders_*');
        foreach ($keys as $key) {
            Cache::forget(str_replace(config('cache.prefix') . ':', '', $key));
        }
    }

    /**
     * Batch operations for better performance
     */
    public static function batchUpdateProductViews($productViews)
    {
        $cases = [];
        $ids = [];
        
        foreach ($productViews as $id => $views) {
            $cases[] = "WHEN id = {$id} THEN view_count + {$views}";
            $ids[] = $id;
        }
        
        if (!empty($cases)) {
            $casesString = implode(' ', $cases);
            $idsString = implode(',', $ids);
            
            DB::statement("
                UPDATE sanpham 
                SET view_count = CASE {$casesString} END 
                WHERE id IN ({$idsString})
            ");
        }
    }

    /**
     * Generate sitemap data efficiently
     */
    public static function getSitemapData()
    {
        return Cache::remember('sitemap_data', 86400, function () {
            return [
                'products' => DB::table('sanpham')
                    ->select('id', 'updated_at')
                    ->where('trang_thai', 1)
                    ->orderBy('updated_at', 'desc')
                    ->get(),
                'categories' => DB::table('loaisanpham')
                    ->select('id', 'updated_at')
                    ->orderBy('updated_at', 'desc')
                    ->get(),
                'brands' => DB::table('thuonghieu')
                    ->select('id', 'updated_at')
                    ->orderBy('updated_at', 'desc')
                    ->get()
            ];
        });
    }
}
