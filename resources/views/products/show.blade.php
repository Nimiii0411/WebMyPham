@extends('layouts.venus')

@section('title', $product->ten_sanpham . ' - Venus Luxury Skincare')

@section('content')
<!-- Product Detail Section -->
<section class="product-detail py-5" style="background-color: var(--beige-light);">
    <div class="container">
        <div class="row">
            <!-- Product Image -->
            <div class="col-lg-6 mb-4">
                <div class="product-image-wrapper">
                    <div class="main-product-image" style="
                        background: linear-gradient(135deg, #f8f5f1 0%, #ede8e3 100%);
                        height: 600px;
                        border-radius: 15px;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        color: var(--text-muted);
                        font-size: 18px;
                        position: relative;
                        overflow: hidden;
                        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
                    ">
                        <span><i class="fas fa-spa me-2"></i>{{ $product->ten_sanpham }}</span>
                    </div>
                    
                    <!-- Product Gallery Thumbnails -->
                    <div class="product-gallery mt-3">
                        <div class="row g-2">
                            @for($i = 1; $i <= 4; $i++)
                            <div class="col-3">
                                <div class="gallery-thumb" style="
                                    background: linear-gradient(135deg, #f0ede8 0%, #e8e3de 100%);
                                    height: 80px;
                                    border-radius: 8px;
                                    display: flex;
                                    align-items: center;
                                    justify-content: center;
                                    cursor: pointer;
                                    transition: transform 0.3s ease;
                                " onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                                    <small style="color: var(--text-muted);">{{ $i }}</small>
                                </div>
                            </div>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Product Info -->
            <div class="col-lg-6">
                <div class="product-info">
                    <!-- Breadcrumb -->
                    <nav aria-label="breadcrumb" class="mb-3">
                        <ol class="breadcrumb" style="background: none; padding: 0;">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}" style="color: var(--text-muted); text-decoration: none;">Home</a></li>
                            <li class="breadcrumb-item"><a href="#" style="color: var(--text-muted); text-decoration: none;">{{ $product->loaiSanPham->ten_loai ?? 'Products' }}</a></li>
                            <li class="breadcrumb-item active" style="color: var(--primary-color);">{{ $product->ten_sanpham }}</li>
                        </ol>
                    </nav>
                    
                    <!-- Product Title -->
                    <h1 class="product-title font-serif mb-3" style="
                        font-size: 2.5rem;
                        color: var(--text-dark);
                        font-weight: 600;
                        line-height: 1.2;
                    ">{{ $product->ten_sanpham }}</h1>
                    
                    <!-- Brand -->
                    @if($product->thuonghieu)
                    <p class="product-brand mb-3" style="
                        color: var(--primary-color);
                        font-weight: 500;
                        font-size: 1.1rem;
                        letter-spacing: 0.5px;
                    ">{{ $product->thuonghieu }}</p>
                    @endif
                    
                    <!-- Rating -->
                    <div class="product-rating mb-4">
                        <div class="d-flex align-items-center">
                            <div class="stars me-3" style="color: #D4AF37; font-size: 18px;">
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= $product->getAverageRating())
                                        <i class="fas fa-star"></i>
                                    @else
                                        <i class="far fa-star"></i>
                                    @endif
                                @endfor
                            </div>
                            <span style="color: var(--text-muted);">({{ $product->getTotalReviews() }} reviews)</span>
                        </div>
                    </div>
                    
                    <!-- Price -->
                    <div class="product-price mb-4">
                        <span class="price" style="
                            font-size: 2rem;
                            color: var(--text-dark);
                            font-weight: 600;
                        ">{{ number_format($product->gia, 0, ',', '.') }}đ</span>
                    </div>
                    
                    <!-- Skin Type Tags -->
                    @if($product->skinTypes && $product->skinTypes->count() > 0)
                    <div class="skin-type-tags mb-4">
                        <h6 style="color: var(--text-dark); font-weight: 600; margin-bottom: 12px; font-size: 0.95rem;">Suitable for:</h6>
                        <div class="tags-wrapper">
                            @foreach($product->skinTypes as $skinType)
                                <span class="skin-tag" style="
                                    display: inline-block;
                                    background-color: var(--beige-light);
                                    color: var(--primary-color);
                                    padding: 8px 16px;
                                    border-radius: 20px;
                                    font-size: 0.85rem;
                                    font-weight: 500;
                                    margin-right: 8px;
                                    margin-bottom: 8px;
                                    border: 1px solid var(--primary-color);
                                ">{{ $skinType->ten_skin }}</span>
                            @endforeach
                        </div>
                    </div>
                    @else
                    <div class="skin-type-tags mb-4">
                        <h6 style="color: var(--text-dark); font-weight: 600; margin-bottom: 12px; font-size: 0.95rem;">Suitable for:</h6>
                        <div class="tags-wrapper">
                            <span class="skin-tag" style="
                                display: inline-block;
                                background-color: var(--beige-light);
                                color: var(--primary-color);
                                padding: 8px 16px;
                                border-radius: 20px;
                                font-size: 0.85rem;
                                font-weight: 500;
                                margin-right: 8px;
                                margin-bottom: 8px;
                                border: 1px solid var(--primary-color);
                            ">All Skin Types</span>
                        </div>
                    </div>
                    @endif
                    
                    <!-- Quantity & Actions -->
                    <div class="product-actions">
                        <div class="row g-3 align-items-center">
                            <!-- Quantity -->
                            <div class="col-auto">
                                <label class="form-label" style="color: var(--text-dark); font-weight: 500;">Quantity</label>
                                <div class="quantity-input d-flex align-items-center">
                                    <button class="btn btn-outline-secondary btn-sm" type="button" onclick="decreaseQty()">-</button>
                                    <input type="number" id="quantity" value="1" min="1" max="{{ $product->so_luong }}" 
                                           class="form-control text-center mx-2" style="width: 70px;">
                                    <button class="btn btn-outline-secondary btn-sm" type="button" onclick="increaseQty()">+</button>
                                </div>
                            </div>
                            
                            <!-- Stock Status -->
                            <div class="col-auto">
                                <small style="color: var(--text-muted);">
                                    {{ $product->so_luong }} items in stock
                                </small>
                            </div>
                        </div>
                        
                        <!-- Action Buttons -->
                        <div class="action-buttons mt-4">
                            <div class="row g-3">
                                <div class="col-8">
                                    <button class="btn w-100" style="
                                        background-color: var(--text-dark);
                                        color: white;
                                        padding: 15px;
                                        font-weight: 600;
                                        text-transform: uppercase;
                                        letter-spacing: 1px;
                                        border: none;
                                        border-radius: 5px;
                                        transition: all 0.3s ease;
                                    " onmouseover="this.style.backgroundColor='var(--primary-color)'" 
                                       onmouseout="this.style.backgroundColor='var(--text-dark)'">
                                        Add to Cart
                                    </button>
                                </div>
                                <div class="col-4">
                                    <button class="btn btn-outline-secondary w-100" style="
                                        padding: 15px;
                                        border-color: var(--primary-color);
                                        color: var(--primary-color);
                                        border-radius: 5px;
                                    ">
                                        <i class="far fa-heart"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Product Information Tabs -->
<section class="product-info-tabs py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <!-- Nav Tabs -->
                <ul class="nav nav-tabs border-0 justify-content-center mb-4" id="productTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="description-tab" data-bs-toggle="tab" data-bs-target="#description" 
                                type="button" role="tab" style="
                                border: none;
                                background: none;
                                color: var(--text-muted);
                                font-weight: 500;
                                padding: 15px 30px;
                                margin: 0 10px;
                                border-bottom: 2px solid transparent;
                                transition: all 0.3s ease;
                            ">Description</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="ingredients-tab" data-bs-toggle="tab" data-bs-target="#ingredients" 
                                type="button" role="tab" style="
                                border: none;
                                background: none;
                                color: var(--text-muted);
                                font-weight: 500;
                                padding: 15px 30px;
                                margin: 0 10px;
                                border-bottom: 2px solid transparent;
                                transition: all 0.3s ease;
                            ">Ingredients</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="usage-tab" data-bs-toggle="tab" data-bs-target="#usage" 
                                type="button" role="tab" style="
                                border: none;
                                background: none;
                                color: var(--text-muted);
                                font-weight: 500;
                                padding: 15px 30px;
                                margin: 0 10px;
                                border-bottom: 2px solid transparent;
                                transition: all 0.3s ease;
                            ">How to Use</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews" 
                                type="button" role="tab" style="
                                border: none;
                                background: none;
                                color: var(--text-muted);
                                font-weight: 500;
                                padding: 15px 30px;
                                margin: 0 10px;
                                border-bottom: 2px solid transparent;
                                transition: all 0.3s ease;
                            ">Reviews ({{ $product->getTotalReviews() }})</button>
                    </li>
                </ul>

                <!-- Tab Content -->
                <div class="tab-content" id="productTabsContent">
                    <!-- Description Tab -->
                    <div class="tab-pane fade show active" id="description" role="tabpanel">
                        <div class="content-box" style="
                            background: white;
                            padding: 40px;
                            border-radius: 15px;
                            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
                        ">
                            <h5 style="color: var(--text-dark); font-weight: 600; margin-bottom: 20px;">About This Product</h5>
                            <p style="color: var(--text-muted); line-height: 1.8; font-size: 1rem;">
                                {{ $product->mota }}
                            </p>
                            
                            @if($product->xuatxu)
                            <div class="mt-4">
                                <h6 style="color: var(--text-dark); font-weight: 600; margin-bottom: 10px;">Origin</h6>
                                <p style="color: var(--text-muted); margin: 0;">{{ $product->xuatxu }}</p>
                            </div>
                            @endif
                        </div>
                    </div>

                    <!-- Ingredients Tab -->
                    <div class="tab-pane fade" id="ingredients" role="tabpanel">
                        <div class="content-box" style="
                            background: white;
                            padding: 40px;
                            border-radius: 15px;
                            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
                        ">
                            <h5 style="color: var(--text-dark); font-weight: 600; margin-bottom: 20px;">Key Ingredients</h5>
                            @if($product->thanhphan)
                                <p style="color: var(--text-muted); line-height: 1.8; font-size: 1rem;">
                                    {{ $product->thanhphan }}
                                </p>
                            @else
                                <p style="color: var(--text-muted); font-style: italic;">
                                    Ingredients information will be updated soon.
                                </p>
                            @endif
                        </div>
                    </div>

                    <!-- Usage Tab -->
                    <div class="tab-pane fade" id="usage" role="tabpanel">
                        <div class="content-box" style="
                            background: white;
                            padding: 40px;
                            border-radius: 15px;
                            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
                        ">
                            <h5 style="color: var(--text-dark); font-weight: 600; margin-bottom: 20px;">How to Use</h5>
                            @if($product->huongdan)
                                <p style="color: var(--text-muted); line-height: 1.8; font-size: 1rem;">
                                    {{ $product->huongdan }}
                                </p>
                            @else
                                <p style="color: var(--text-muted); font-style: italic;">
                                    Usage instructions will be updated soon.
                                </p>
                            @endif
                        </div>
                    </div>

                    <!-- Reviews Tab -->
                    <div class="tab-pane fade" id="reviews" role="tabpanel">
                        <div class="content-box" style="
                            background: white;
                            padding: 40px;
                            border-radius: 15px;
                            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
                        ">
                            <h5 style="color: var(--text-dark); font-weight: 600; margin-bottom: 20px;">Customer Reviews</h5>
                            
                            <!-- Add Review Form -->
                            @auth
                                @php
                                    $userReview = $product->danhGias->where('id_nguoidung', auth()->id())->first();
                                @endphp
                                
                                @if(!$userReview)
                                    <div class="add-review-form mb-4" style="background: var(--beige-light); padding: 30px; border-radius: 12px; border: 1px solid #e9ecef;">
                                        <h6 style="color: var(--text-dark); font-weight: 600; margin-bottom: 20px;">Write a Review</h6>
                                        
                                        @if(session('success'))
                                            <div class="alert alert-success" style="margin-bottom: 20px;">
                                                {{ session('success') }}
                                            </div>
                                        @endif
                                        
                                        @if(session('error'))
                                            <div class="alert alert-danger" style="margin-bottom: 20px;">
                                                {{ session('error') }}
                                            </div>
                                        @endif

                                        <form action="{{ route('reviews.store') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id_sanpham" value="{{ $product->id_sanpham }}">
                                            
                                            <!-- Rating Stars -->
                                            <div class="rating-input mb-3">
                                                <label style="color: var(--text-dark); font-weight: 500; margin-bottom: 10px; display: block;">Your Rating:</label>
                                                <div class="star-rating">
                                                    @for($i = 1; $i <= 5; $i++)
                                                        <input type="radio" name="diem_danh_gia" value="{{ $i }}" id="star{{ $i }}" style="display: none;">
                                                        <label for="star{{ $i }}" class="star" style="
                                                            font-size: 2rem;
                                                            color: #ddd;
                                                            cursor: pointer;
                                                            transition: color 0.2s ease;
                                                        " data-rating="{{ $i }}">★</label>
                                                    @endfor
                                                </div>
                                                @error('diem_danh_gia')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            
                                            <!-- Review Content -->
                                            <div class="mb-3">
                                                <label for="noi_dung" style="color: var(--text-dark); font-weight: 500; margin-bottom: 10px; display: block;">Your Review:</label>
                                                <textarea name="noi_dung" id="noi_dung" rows="4" 
                                                          class="form-control" 
                                                          placeholder="Share your experience with this product..."
                                                          style="border: 1px solid #ddd; border-radius: 8px; padding: 15px; resize: vertical;">{{ old('noi_dung') }}</textarea>
                                                @error('noi_dung')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            
                                            <!-- Submit Button -->
                                            <button type="submit" class="btn" style="
                                                background-color: var(--primary-color);
                                                color: white;
                                                padding: 12px 30px;
                                                border: none;
                                                border-radius: 8px;
                                                font-weight: 600;
                                                transition: all 0.3s ease;
                                            ">Submit Review</button>
                                        </form>
                                    </div>
                                @else
                                    <div class="user-review mb-4" style="background: #f8f9fa; padding: 20px; border-radius: 12px; border-left: 4px solid var(--primary-color);">
                                        <h6 style="color: var(--text-dark); font-weight: 600; margin-bottom: 15px;">Your Review</h6>
                                        <div class="d-flex justify-content-between align-items-start">
                                            <div style="flex: 1;">
                                                <div class="stars text-warning mb-2" style="font-size: 1.2rem;">
                                                    @for($i = 1; $i <= 5; $i++)
                                                        @if($i <= $userReview->diem_danh_gia)
                                                            <i class="fas fa-star"></i>
                                                        @else
                                                            <i class="far fa-star"></i>
                                                        @endif
                                                    @endfor
                                                </div>
                                                <p style="color: var(--text-muted); margin: 0; line-height: 1.6;">
                                                    {{ $userReview->noi_dung }}
                                                </p>
                                            </div>
                                            <div class="review-actions">
                                                <button class="btn btn-sm btn-outline-primary me-2" onclick="editReview({{ $userReview->id_danhgia }})">
                                                    <i class="fas fa-edit"></i> Edit
                                                </button>
                                                <form action="{{ route('reviews.destroy', $userReview->id_danhgia) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger" 
                                                            onclick="return confirm('Are you sure you want to delete your review?')">
                                                        <i class="fas fa-trash"></i> Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @else
                                <div class="login-prompt mb-4" style="background: #fff3cd; padding: 20px; border-radius: 12px; border: 1px solid #ffeaa7;">
                                    <p style="color: #856404; margin: 0; text-align: center;">
                                        <i class="fas fa-info-circle"></i> 
                                        Please <a href="{{ route('login') }}" style="color: var(--primary-color); text-decoration: none; font-weight: 600;">login</a> to write a review
                                    </p>
                                </div>
                            @endauth
                            
                            @if($product->danhGias && $product->danhGias->count() > 0)
                                <!-- Reviews List -->
                                <div class="reviews-list">
                                    @foreach($product->danhGias->take(5) as $review)
                                    <div class="review-item" style="border-bottom: 1px solid #f0f0f0; padding-bottom: 20px; margin-bottom: 20px;">
                                        <div class="d-flex justify-content-between align-items-start mb-2">
                                            <div>
                                                <h6 style="color: var(--text-dark); margin: 0;">
                                                    {{ $review->nguoiDung->ten_nguoidung ?? 'Anonymous' }}
                                                </h6>
                                                <div class="stars text-warning" style="font-size: 14px;">
                                                    @for($i = 1; $i <= 5; $i++)
                                                        @if($i <= $review->diem_danh_gia)
                                                            <i class="fas fa-star"></i>
                                                        @else
                                                            <i class="far fa-star"></i>
                                                        @endif
                                                    @endfor
                                                </div>
                                            </div>
                                            <small style="color: var(--text-muted);">
                                                {{ $review->ngay_danh_gia ?? 'Recently' }}
                                            </small>
                                        </div>
                                        <p style="color: var(--text-muted); margin: 0; line-height: 1.6;">
                                            {{ $review->noi_dung ?? 'Great product!' }}
                                        </p>
                                    </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="text-center py-4">
                                    <i class="fas fa-star-half-alt" style="font-size: 3rem; color: var(--beige-light); margin-bottom: 15px;"></i>
                                    <p style="color: var(--text-muted); font-size: 1.1rem;">No reviews yet</p>
                                    <p style="color: var(--text-muted); font-size: 0.9rem;">Be the first to review this product!</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.nav-tabs .nav-link.active {
    color: var(--primary-color) !important;
    border-bottom-color: var(--primary-color) !important;
}

.nav-tabs .nav-link:hover {
    color: var(--primary-color) !important;
    border-bottom-color: var(--primary-color) !important;
}

/* Star Rating Styles */
.star-rating {
    display: flex;
    gap: 5px;
    margin-bottom: 10px;
}

.star-rating .star {
    transition: color 0.2s ease;
}

.star-rating .star:hover,
.star-rating .star.active {
    color: #ffd700 !important;
}

.star-rating input[type="radio"]:checked + .star,
.star-rating input[type="radio"]:checked ~ .star {
    color: #ffd700 !important;
}
</style>

<!-- Related Products -->
@if($relatedProducts->count() > 0)
<section class="related-products py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="font-serif" style="font-size: 2.5rem; color: var(--text-dark);">You Might Also Like</h2>
            <p style="color: var(--text-muted); max-width: 500px; margin: 0 auto;">Discover more from our curated collection</p>
        </div>
        
        <div class="row g-4">
            @foreach($relatedProducts as $relatedProduct)
            <div class="col-lg-3 col-md-6">
                <div class="card border-0 h-100" style="background: white; border-radius: 10px; overflow: hidden; box-shadow: 0 5px 15px rgba(0,0,0,0.08);">
                    <div class="position-relative">
                        <div class="product-placeholder" style="
                            background: linear-gradient(135deg, #f8f5f1 0%, #ede8e3 100%);
                            height: 250px;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            color: var(--text-muted);
                        ">
                            <span><i class="fas fa-spa me-2"></i>Product</span>
                        </div>
                        <div class="position-absolute top-0 end-0 m-3">
                            <button class="btn btn-light btn-sm rounded-circle" style="width: 35px; height: 35px;">
                                <i class="far fa-heart"></i>
                            </button>
                        </div>
                    </div>
                    
                    <div class="card-body p-4">
                        <h6 class="card-title" style="font-weight: 500; color: var(--text-dark); margin-bottom: 15px;">
                            <a href="{{ route('products.show', $relatedProduct->id_sanpham) }}" class="text-decoration-none" style="color: inherit;">
                                {{ $relatedProduct->ten_sanpham }}
                            </a>
                        </h6>
                        
                        <!-- Rating -->
                        <div class="d-flex align-items-center mb-3">
                            <div class="text-warning me-2" style="font-size: 14px;">
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= $relatedProduct->getAverageRating())
                                        <i class="fas fa-star"></i>
                                    @else
                                        <i class="far fa-star"></i>
                                    @endif
                                @endfor
                            </div>
                            <small class="text-muted">({{ $relatedProduct->getTotalReviews() }})</small>
                        </div>
                        
                        <!-- Price -->
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="h6 mb-0" style="color: var(--text-dark); font-weight: 600;">{{ number_format($relatedProduct->gia, 0, ',', '.') }}đ</span>
                            <button class="btn btn-sm" style="background-color: var(--beige-light); color: var(--text-dark); border: none; padding: 8px 16px;">
                                Add to Cart
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<script>
function increaseQty() {
    const input = document.getElementById('quantity');
    const max = parseInt(input.getAttribute('max'));
    if (parseInt(input.value) < max) {
        input.value = parseInt(input.value) + 1;
    }
}

function decreaseQty() {
    const input = document.getElementById('quantity');
    if (parseInt(input.value) > 1) {
        input.value = parseInt(input.value) - 1;
    }
}

// Initialize Bootstrap tabs
document.addEventListener('DOMContentLoaded', function() {
    var triggerTabList = [].slice.call(document.querySelectorAll('#productTabs button'))
    triggerTabList.forEach(function (triggerEl) {
        var tabTrigger = new bootstrap.Tab(triggerEl)
        
        triggerEl.addEventListener('click', function (event) {
            event.preventDefault()
            tabTrigger.show()
        })
    })
    
    // Star Rating Functionality
    const stars = document.querySelectorAll('.star-rating .star');
    const ratingInputs = document.querySelectorAll('.star-rating input[type="radio"]');
    
    stars.forEach((star, index) => {
        star.addEventListener('mouseover', function() {
            highlightStars(index + 1);
        });
        
        star.addEventListener('click', function() {
            const rating = this.getAttribute('data-rating');
            ratingInputs[index].checked = true;
            highlightStars(rating);
        });
    });
    
    // Reset stars on mouse leave
    const starRating = document.querySelector('.star-rating');
    if (starRating) {
        starRating.addEventListener('mouseleave', function() {
            const checkedInput = document.querySelector('.star-rating input[type="radio"]:checked');
            if (checkedInput) {
                highlightStars(checkedInput.value);
            } else {
                highlightStars(0);
            }
        });
    }
    
    function highlightStars(rating) {
        stars.forEach((star, index) => {
            if (index < rating) {
                star.style.color = '#ffd700';
            } else {
                star.style.color = '#ddd';
            }
        });
    }
});

function editReview(reviewId) {
    // Simple implementation - could be enhanced with modal
    alert('Edit functionality will be implemented in future update');
}
</script>
@endsection
