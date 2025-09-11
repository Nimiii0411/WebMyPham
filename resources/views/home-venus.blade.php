@extends('layouts.venus')

@section('title', 'Venus - High-active Skincare')

@section('content')
<!-- Hero Section - Background Image với Text bên trái -->
<section class="hero-section-background" style="background-image: url('{{ asset('images/banner.jpg') }}');">
    <div class="container">
        <div class="row">
            <!-- Text Content - Chỉ bên trái -->
            <div class="col-lg-6 col-md-8">
                <h1 class="hero-title font-serif text-white">High-active<br>Skincare</h1>
                <p class="hero-subtitle text-white">
                    Discover our scientifically advanced formulations crafted with the finest ingredients 
                    to reveal your skin's natural radiance and achieve lasting beauty.
                </p>
                <a href="#explore" class="btn-explore">Explore Now</a>
            </div>
            <!-- Cột phải để trống cho ảnh background hiển thị -->
        </div>
    </div>
</section>

<!-- Content Section -->
<section class="content-section py-5">
    <div class="container">
        <div class="text-center">
            <h2 class="section-title">Explore • Discover • Reveal</h2>
            <p class="section-description">
                Experience the transformative power of luxury skincare with our meticulously curated collection. 
                Each product is designed to nurture, protect, and enhance your natural beauty through 
                innovative formulations and premium ingredients.
            </p>
        </div>
    </div>
</section>

<!-- Featured Products Section -->
<section class="py-5 featured-products-section">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="font-serif featured-title">Featured Collection</h2>
            <p class="text-muted-custom featured-subtitle">Handpicked essentials for your daily luxury skincare routine</p>
        </div>
        
        <!-- Carousel Container -->
        <div class="product-carousel-container position-relative">
            <!-- Left Button -->
            <button class="carousel-btn carousel-btn-left" id="prevBtn">
                <i class="fas fa-chevron-left"></i>
            </button>
            
            <!-- Right Button -->
            <button class="carousel-btn carousel-btn-right" id="nextBtn">
                <i class="fas fa-chevron-right"></i>
            </button>
            
            <!-- Products Wrapper -->
            <div class="carousel-wrapper" id="carouselWrapper">
                @if(isset($featuredProducts) && $featuredProducts->count() > 0)
                    @foreach($featuredProducts->take(12) as $index => $product)
                    <div class="carousel-slide">
                        <div class="product-card">
                            <div class="position-relative">
                                <a href="{{ route('products.show', $product->id_sanpham) }}">
                                    @if($product->hinh_anh)
                                        <img src="{{ asset('storage/' . $product->hinh_anh) }}" 
                                             class="card-img-top product-image" alt="{{ $product->ten_sanpham }}">
                                    @else
                                        <div class="product-placeholder">
                                            <span><i class="fas fa-spa me-2"></i>Product Image</span>
                                        </div>
                                    @endif
                                </a>
                                <div class="position-absolute top-0 end-0 m-3">
                                    <button class="btn btn-light btn-sm rounded-circle wishlist-btn">
                                        <i class="far fa-heart"></i>
                                    </button>
                                </div>
                            </div>
                            
                            <div class="card-body p-4">
                                <h6 class="card-title product-name">
                                    <a href="{{ route('products.show', $product->id_sanpham) }}" class="text-decoration-none">
                                        {{ $product->ten_sanpham }}
                                    </a>
                                </h6>
                                
                                <!-- Rating -->
                                <div class="d-flex align-items-center mb-3">
                                    <div class="text-warning me-2 rating-stars">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                    <small class="text-muted">(124)</small>
                                </div>
                                
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <span class="product-price">{{ number_format($product->gia, 0, ',', '.') }}đ</span>
                                    </div>
                                    <button class="btn btn-sm add-to-bag-btn add-to-cart-btn" 
                                            data-product-id="{{ $product->id_sanpham }}" 
                                            data-product-name="{{ $product->ten_sanpham }}">
                                        Add to Bag
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @else
                    <!-- Placeholder products if no data -->
                    @for($i = 1; $i <= 12; $i++)
                    <div class="carousel-slide">
                        <div class="product-card">
                            <div class="position-relative">
                                <img src="https://images.unsplash.com/photo-{{ 1556228578 + ($i * 1000) }}?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                                     class="card-img-top product-image" alt="Venus Product {{ $i }}">
                                <div class="position-absolute top-0 end-0 m-3">
                                    <button class="btn btn-light btn-sm rounded-circle wishlist-btn">
                                        <i class="far fa-heart"></i>
                                    </button>
                                </div>
                            </div>
                            
                            <div class="card-body p-4">
                                <h6 class="card-title product-name">
                                    {{ ['Radiance Serum', 'Hydrating Moisturizer', 'Vitamin C Cream', 'Eye Treatment', 'Night Repair', 'Cleansing Oil', 'Face Mask', 'Toner', 'Sunscreen', 'Exfoliator', 'Rose Water', 'Anti-Aging'][($i-1) % 12] }}
                                </h6>
                                <p class="card-text text-muted small product-description">
                                    {{ ['Illuminating face serum', 'Deep hydration formula', 'Brightening vitamin C', 'Anti-aging eye care', 'Overnight recovery', 'Gentle makeup removal', 'Weekly skin treatment', 'Balancing pH formula', 'UV protection', 'Gentle exfoliation', 'Hydrating mist', 'Youth renewal'][($i-1) % 12] }}
                                </p>
                                
                                <div class="mb-3">
                                    <span class="badge skin-type-badge">All Skin Types</span>
                                </div>
                                
                                <div class="d-flex align-items-center mb-3">
                                    <div class="text-warning me-2 rating-stars">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                    <small class="text-muted">({{ 120 + ($i * 15) }})</small>
                                </div>
                                
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <span class="product-price">${{ 85 + ($i * 10) }}</span>
                                        <small class="text-muted d-block product-volume">30ml</small>
                                    </div>
                                    <button class="btn btn-sm add-to-bag-btn add-to-cart-btn" 
                                            data-product-id="placeholder" 
                                            data-product-name="Sample Product">
                                        Add to Bag
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endfor
                @endif
            </div>
        </div>
    </div>
</section>

<!-- Advertise Section -->
<section class="py-5 advertise-section">
    <div class="container-fluid px-4">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="advertise-banner">
                    <img src="{{ asset('images/advertise.png') }}" 
                         class="img-fluid advertise-image" 
                         alt="Special Promotion">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Affordable Products Section -->
<section class="py-5 affordable-products-section">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="font-serif affordable-title">Affordable Products</h2>
            <p class="text-muted-custom affordable-subtitle">Quality skincare under 500,000 VNĐ</p>
        </div>
        
        <!-- Affordable Carousel Container -->
        <div class="product-carousel-container position-relative">
            <!-- Left Button -->
            <button class="carousel-btn carousel-btn-left" id="affordablePrevBtn">
                <i class="fas fa-chevron-left"></i>
            </button>
            
            <!-- Right Button -->
            <button class="carousel-btn carousel-btn-right" id="affordableNextBtn">
                <i class="fas fa-chevron-right"></i>
            </button>
            
            <!-- Products Wrapper -->
            <div class="carousel-wrapper" id="affordableCarouselWrapper">
                @if(isset($affordableProducts) && $affordableProducts->count() > 0)
                    @foreach($affordableProducts->take(12) as $index => $product)
                    <div class="carousel-slide">
                        <div class="product-card">
                            <div class="position-relative">
                                <a href="{{ route('products.show', $product->id_sanpham) }}">
                                    @if($product->hinh_anh)
                                        <img src="{{ asset('storage/' . $product->hinh_anh) }}" 
                                             class="card-img-top product-image" alt="{{ $product->ten_sanpham }}">
                                    @else
                                        <div class="product-placeholder">
                                            <span><i class="fas fa-spa me-2"></i>Product Image</span>
                                        </div>
                                    @endif
                                </a>
                                <div class="position-absolute top-0 end-0 m-3">
                                    <button class="btn btn-light btn-sm rounded-circle wishlist-btn">
                                        <i class="far fa-heart"></i>
                                    </button>
                                </div>
                            </div>
                            
                            <div class="card-body p-4">
                                <h6 class="card-title product-name">
                                    <a href="{{ route('products.show', $product->id_sanpham) }}" class="text-decoration-none">
                                        {{ $product->ten_sanpham }}
                                    </a>
                                </h6>
                                
                                <!-- Rating -->
                                <div class="d-flex align-items-center mb-3">
                                    <div class="text-warning me-2 rating-stars">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                    <small class="text-muted">(124)</small>
                                </div>
                                
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <span class="product-price">{{ number_format($product->gia, 0, ',', '.') }}đ</span>
                                    </div>
                                    <button class="btn btn-sm add-to-bag-btn add-to-cart-btn" 
                                            data-product-id="{{ $product->id_sanpham }}" 
                                            data-product-name="{{ $product->ten_sanpham }}">
                                        Add to Bag
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @else
                    <!-- Placeholder affordable products -->
                    @for($i = 1; $i <= 12; $i++)
                    <div class="carousel-slide">
                        <div class="product-card">
                            <div class="position-relative">
                                <img src="https://images.unsplash.com/photo-{{ 1556228578 + ($i * 2000) }}?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                                     class="card-img-top product-image" alt="Affordable Product {{ $i }}">
                                <div class="position-absolute top-0 end-0 m-3">
                                    <button class="btn btn-light btn-sm rounded-circle wishlist-btn">
                                        <i class="far fa-heart"></i>
                                    </button>
                                </div>
                            </div>
                            
                            <div class="card-body p-4">
                                <h6 class="card-title product-name">
                                    {{ ['Budget Cleanser', 'Daily Moisturizer', 'Basic Toner', 'Simple Serum', 'Gentle Scrub', 'Face Wash', 'Lip Balm', 'Hand Cream', 'Body Lotion', 'Hair Mask', 'Nail Care', 'Foot Cream'][($i-1) % 12] }}
                                </h6>
                                <p class="card-text text-muted small product-description">
                                    {{ ['Affordable daily cleanser', 'Budget-friendly hydration', 'Basic skin preparation', 'Essential nutrients', 'Weekly gentle care', 'Deep cleansing', 'Lip protection', 'Hand moisturizing', 'Body hydration', 'Hair treatment', 'Nail strengthening', 'Foot care'][($i-1) % 12] }}
                                </p>
                                
                                <div class="mb-3">
                                    <span class="badge skin-type-badge">All Skin Types</span>
                                </div>
                                
                                <div class="d-flex align-items-center mb-3">
                                    <div class="text-warning me-2 rating-stars">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                    <small class="text-muted">({{ 80 + ($i * 10) }})</small>
                                </div>
                                
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <span class="product-price">{{ number_format((200 + ($i * 25)) * 1000, 0, ',', '.') }}đ</span>
                                        <small class="text-muted d-block product-volume">{{ 30 + ($i * 5) }}ml</small>
                                    </div>
                                    <button class="btn btn-sm add-to-bag-btn add-to-cart-btn" 
                                            data-product-id="placeholder" 
                                            data-product-name="Sample Product">
                                        Add to Bag
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endfor
                @endif
            </div>
        </div>
    </div>
</section>

<!-- Newsletter Section -->
<section class="py-5 newsletter-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
                <h3 class="font-serif mb-3 newsletter-title">Stay Updated</h3>
                <p class="text-muted-custom mb-4">Be the first to know about new arrivals and exclusive offers</p>
                <div class="d-flex gap-2 justify-content-center newsletter-form">
                    <input type="email" class="form-control email-input" placeholder="Enter your email">
                    <button class="btn-explore">Subscribe</button>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
/* Hero Section Background */
.hero-section-background {
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    min-height: 70vh;
    display: flex;
    align-items: center;
    position: relative;
}

.hero-section-background::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4));
    z-index: 1;
}

.hero-section-background .container {
    position: relative;
    z-index: 2;
}

.hero-section-background .hero-title {
    font-size: 3.8rem; 
    font-weight: 600; 
    line-height: 1.1;
    text-shadow: 3px 3px 6px rgba(0,0,0,0.7);
    margin-bottom: 25px;
}

.hero-section-background .hero-subtitle {
    font-size: 1.2rem; 
    font-weight: 300; 
    line-height: 1.6;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.7);
    margin-bottom: 35px;
    max-width: 480px;
}

.hero-section-background .btn-explore {
    background-color: rgba(255,255,255,0.95);
    color: var(--text-dark);
    padding: 15px 40px;
    border: none;
    font-size: 14px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1.5px;
    transition: all 0.3s ease;
    text-decoration: none;
    display: inline-block;
    border-radius: 3px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.3);
}

/* Content Section */
.content-section {
    background-color: #ffffff;
}

.section-title {
    font-family: 'Playfair Display', serif;
    font-size: 2.8rem;
    font-weight: 600;
    color: var(--text-dark, #2C2C2C);
    margin-bottom: 1.5rem;
    letter-spacing: 0.5px;
}

.section-description {
    font-size: 1.1rem;
    color: var(--text-muted, #8E8E8E);
    line-height: 1.8;
    max-width: 700px;
    margin: 0 auto;
}

/* Featured Products Section */
.featured-products-section {
    background-color: var(--secondary-color, #F5F3F0);
}

.featured-title {
    font-size: 2.5rem; 
    color: var(--text-dark, #2C2C2C); 
    margin-bottom: 20px;
}

.featured-subtitle {
    max-width: 500px; 
    margin: 0 auto;
    color: var(--text-muted, #8E8E8E);
}

/* Affordable Products Section */
.affordable-products-section {
    background-color: #ffffff;
}

.affordable-title {
    font-size: 2.5rem; 
    color: var(--text-dark, #2C2C2C); 
    margin-bottom: 20px;
}

.affordable-subtitle {
    max-width: 500px; 
    margin: 0 auto;
    color: var(--text-muted, #8E8E8E);
}

.product-card {
    background: white; 
    border-radius: 10px; 
    overflow: hidden; 
    box-shadow: 0 5px 15px rgba(0,0,0,0.08);
    border: none;
    height: 100%;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    position: relative;
    z-index: 1;
}

.product-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.12);
    z-index: 2;
}

/* Ensure placeholder has proper styling */
.product-placeholder {
    height: 250px;
    background: #f8f9fa;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #6c757d;
    font-size: 14px;
}

.wishlist-btn {
    width: 35px; 
    height: 35px;
}

.product-name {
    font-weight: 500; 
    color: var(--text-dark, #2C2C2C); 
    margin-bottom: 15px;
    height: 48px;
    overflow: hidden;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    line-clamp: 2;
    -webkit-box-orient: vertical;
    line-height: 1.4;
}

.product-name a {
    color: inherit;
}

.product-name a:hover {
    color: var(--primary-color, #8B7355);
}

.rating-stars {
    font-size: 14px;
}

.product-price {
    font-weight: 500; 
    color: var(--text-dark, #2C2C2C); 
    font-size: 18px;
}

.product-volume {
    font-size: 12px;
}

.add-to-bag-btn {
    background-color: var(--text-dark, #2C2C2C); 
    color: white; 
    padding: 8px 16px; 
    font-size: 12px; 
    text-transform: uppercase; 
    letter-spacing: 0.5px;
    transition: all 0.3s ease;
}

.add-to-bag-btn:hover {
    background-color: var(--primary-color, #8B7355);
    color: white;
}

.product-image {
    height: 250px; 
    object-fit: cover;
}

.product-description {
    line-height: 1.5;
}

.skin-type-badge {
    background-color: var(--beige-light, #FAF8F5); 
    color: var(--text-muted, #8E8E8E); 
    font-weight: 300; 
    font-size: 11px;
}

/* Product Carousel Styles - Swipe Version */
.product-carousel-container {
    max-width: 1400px; /* Tăng từ 1200px lên 1400px */
    margin: 0 auto;
    padding: 40px 80px; /* Tăng padding để có space cho buttons */
    position: relative;
    overflow: hidden;
}

.carousel-wrapper {
    display: flex;
    transition: transform 0.3s ease;
    will-change: transform;
    margin-left: -60px; /* Đẩy sang trái để căn giữa */
}

.carousel-slide {
    flex: 0 0 300px;
    margin-right: 20px;
    max-width: 300px;
}

.carousel-btn {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background: rgba(255, 255, 255, 0.95);
    border: 2px solid var(--primary-color, #8B7355);
    color: var(--primary-color, #8B7355);
    width: 50px;
    height: 50px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    font-size: 16px;
    z-index: 10;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(0,0,0,0.15);
    backdrop-filter: blur(5px);
}

.carousel-btn:hover {
    background: var(--primary-color, #8B7355);
    color: white;
    transform: translateY(-50%) scale(1.1);
    box-shadow: 0 6px 20px rgba(0,0,0,0.25);
}

.carousel-btn:disabled {
    opacity: 0.5;
    cursor: not-allowed;
    transform: translateY(-50%);
}

.carousel-btn-left {
    left: 10px; /* Đẩy ra xa hơn */
    z-index: 10;
}

.carousel-btn-right {
    right: 10px; /* Đẩy ra xa hơn */
    z-index: 10;
}

/* Responsive Design - Swipe */
@media (max-width: 1200px) {
    .product-carousel-container {
        max-width: 1200px;
        padding: 40px 70px;
    }
    
    .carousel-wrapper {
        margin-left: -35px; /* Điều chỉnh cho màn hình nhỏ hơn */
    }
    
    .carousel-slide {
        flex: 0 0 280px;
        max-width: 280px;
    }
    
    .carousel-btn-left {
        left: 15px;
    }
    .carousel-btn-right {
        right: 15px;
    }
}

@media (max-width: 992px) {
    .product-carousel-container {
        padding: 40px 60px;
    }
    
    .carousel-wrapper {
        margin-left: -30px;
    }
    
    .carousel-slide {
        flex: 0 0 260px;
        max-width: 260px;
        margin-right: 15px;
    }
    
    .carousel-btn-left {
        left: 20px;
    }
    .carousel-btn-right {
        right: 20px;
    }
}

@media (max-width: 768px) {
    .product-carousel-container {
        padding: 30px 50px;
    }
    
    .carousel-wrapper {
        margin-left: -25px;
    }
    
    .carousel-slide {
        flex: 0 0 240px;
        max-width: 240px;
        margin-right: 10px;
    }
    
    .carousel-btn {
        width: 40px;
        height: 40px;
        font-size: 14px;
    }
    
    .carousel-btn-left {
        left: 15px;
    }
    .carousel-btn-right {
        right: 15px;
    }
}

/* Advertise Section */
.advertise-section {
    background-color: #ffffff;
}

.advertise-banner {
    text-align: center;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 8px 25px rgba(0,0,0,0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    max-width: 1200px; /* Tăng kích thước tối đa */
    margin: 0 auto; /* Căn giữa */
}

.advertise-banner:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 40px rgba(0,0,0,0.15);
}

.advertise-image {
    width: 100%;
    height: auto;
    display: block;
    transition: transform 0.3s ease;
    min-height: 200px; /* Đảm bảo chiều cao tối thiểu */
    object-fit: cover; /* Đảm bảo ảnh hiển thị đẹp */
}

.advertise-banner:hover .advertise-image {
    transform: scale(1.02);
}

/* Newsletter Section */
.newsletter-section {
    background-color: var(--beige-light, #FAF8F5);
}

.newsletter-title {
    color: var(--text-dark, #2C2C2C);
}

.newsletter-form {
    max-width: 400px;
    margin: 0 auto;
}

.email-input {
    max-width: 300px; 
    border: 1px solid #ddd; 
    padding: 12px 16px;
    border-radius: 5px;
}

/* Responsive Design */
@media (max-width: 768px) {
    .hero-section-background .hero-title {
        font-size: 2.5rem;
    }
    
    .hero-section-background .hero-subtitle {
        font-size: 1rem;
    }
    
    .section-title {
        font-size: 2.2rem;
    }
    
    .section-description {
        font-size: 1rem;
        padding: 0 15px;
    }
    
    .featured-title {
        font-size: 2rem;
    }
    
    .newsletter-form {
        flex-direction: column;
        gap: 15px !important;
    }
    
    .email-input {
        max-width: 100%;
    }
}

@media (max-width: 576px) {
    .hero-section-background .hero-title {
        font-size: 2rem;
    }
    
    .section-title {
        font-size: 1.8rem;
    }
    
    .featured-title {
        font-size: 1.8rem;
    }
    
    .product-card {
        margin-bottom: 20px;
    }
}
</style>

<script>
// Global configuration variables from Laravel
window.AppConfig = {
    isAuthenticated: @json(auth()->check()),
    loginUrl: @json(route('login')),
    cartAddUrl: @json(route('cart.add')),
    cartCountUrl: @json(route('cart.count')),
    csrfToken: @json(csrf_token())
};

document.addEventListener('DOMContentLoaded', function() {
    // Initialize Featured Carousel
    const carousel = document.getElementById('carouselWrapper');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    const slides = document.querySelectorAll('.carousel-slide');
    
    let currentIndex = 0;
    const slideWidth = 320; // 300px card + 20px margin
    const totalSlides = slides.length;
    const visibleSlides = 4; // Show 4 cards at a time
    
    function updateCarousel() {
        const translateX = -(currentIndex * slideWidth);
        carousel.style.transform = `translateX(${translateX}px)`;
        
        // Buttons are always enabled for infinite loop
        prevBtn.disabled = false;
        nextBtn.disabled = false;
        prevBtn.style.opacity = '1';
        nextBtn.style.opacity = '1';
    }
    
    // Button controls with loop
    prevBtn.addEventListener('click', () => {
        if (currentIndex > 0) {
            currentIndex--;
        } else {
            // Loop to end: go to last possible position
            currentIndex = totalSlides - visibleSlides;
        }
        updateCarousel();
    });
    
    nextBtn.addEventListener('click', () => {
        if (currentIndex < totalSlides - visibleSlides) {
            currentIndex++;
        } else {
            // Loop to beginning
            currentIndex = 0;
        }
        updateCarousel();
    });
    
    // Touch/Swipe controls with loop
    let startX = 0;
    let currentX = 0;
    let isDragging = false;
    let startTranslate = 0;
    
    // Touch start
    carousel.addEventListener('touchstart', (e) => {
        startX = e.touches[0].clientX;
        currentX = startX;
        isDragging = true;
        startTranslate = -(currentIndex * slideWidth);
        carousel.style.transition = 'none';
    });
    
    // Touch move
    carousel.addEventListener('touchmove', (e) => {
        if (!isDragging) return;
        
        currentX = e.touches[0].clientX;
        const deltaX = currentX - startX;
        const newTranslate = startTranslate + deltaX;
        
        carousel.style.transform = `translateX(${newTranslate}px)`;
        e.preventDefault();
    });
    
    // Touch end with loop
    carousel.addEventListener('touchend', (e) => {
        if (!isDragging) return;
        
        isDragging = false;
        carousel.style.transition = 'transform 0.3s ease';
        
        const deltaX = startX - currentX;
        const threshold = 80;
        
        if (Math.abs(deltaX) > threshold) {
            if (deltaX > 0) {
                // Swipe left - next
                if (currentIndex < totalSlides - visibleSlides) {
                    currentIndex++;
                } else {
                    currentIndex = 0; // Loop to beginning
                }
            } else {
                // Swipe right - previous
                if (currentIndex > 0) {
                    currentIndex--;
                } else {
                    currentIndex = totalSlides - visibleSlides; // Loop to end
                }
            }
        }
        
        updateCarousel();
    });
    
    // Mouse drag (for desktop) with loop
    let mouseDown = false;
    let mouseStartX = 0;
    
    carousel.addEventListener('mousedown', (e) => {
        mouseDown = true;
        mouseStartX = e.clientX;
        startTranslate = -(currentIndex * slideWidth);
        carousel.style.transition = 'none';
        carousel.style.cursor = 'grabbing';
        e.preventDefault();
    });
    
    document.addEventListener('mousemove', (e) => {
        if (!mouseDown) return;
        
        const deltaX = e.clientX - mouseStartX;
        const newTranslate = startTranslate + deltaX;
        carousel.style.transform = `translateX(${newTranslate}px)`;
    });
    
    document.addEventListener('mouseup', (e) => {
        if (!mouseDown) return;
        
        mouseDown = false;
        carousel.style.transition = 'transform 0.3s ease';
        carousel.style.cursor = 'grab';
        
        const deltaX = mouseStartX - e.clientX;
        const threshold = 80;
        
        if (Math.abs(deltaX) > threshold) {
            if (deltaX > 0) {
                // Drag left - next
                if (currentIndex < totalSlides - visibleSlides) {
                    currentIndex++;
                } else {
                    currentIndex = 0; // Loop to beginning
                }
            } else {
                // Drag right - previous
                if (currentIndex > 0) {
                    currentIndex--;
                } else {
                    currentIndex = totalSlides - visibleSlides; // Loop to end
                }
            }
        }
        
        updateCarousel();
    });
    
    // Add grab cursor
    carousel.style.cursor = 'grab';
    
    // Initialize
    updateCarousel();

    // Initialize Affordable Products Carousel
    const affordableCarousel = document.getElementById('affordableCarouselWrapper');
    const affordablePrevBtn = document.getElementById('affordablePrevBtn');
    const affordableNextBtn = document.getElementById('affordableNextBtn');
    const affordableSlides = document.querySelectorAll('#affordableCarouselWrapper .carousel-slide');
    
    let affordableCurrentIndex = 0;
    const affordableSlideWidth = 320; // 300px card + 20px margin
    const affordableTotalSlides = affordableSlides.length;
    const affordableVisibleSlides = 4; // Show 4 cards at a time
    
    function updateAffordableCarousel() {
        const translateX = -(affordableCurrentIndex * affordableSlideWidth);
        affordableCarousel.style.transform = `translateX(${translateX}px)`;
        
        // Buttons are always enabled for infinite loop
        affordablePrevBtn.disabled = false;
        affordableNextBtn.disabled = false;
        affordablePrevBtn.style.opacity = '1';
        affordableNextBtn.style.opacity = '1';
    }
    
    // Button controls with loop for affordable carousel
    affordablePrevBtn.addEventListener('click', () => {
        if (affordableCurrentIndex > 0) {
            affordableCurrentIndex--;
        } else {
            // Loop to end: go to last possible position
            affordableCurrentIndex = affordableTotalSlides - affordableVisibleSlides;
        }
        updateAffordableCarousel();
    });
    
    affordableNextBtn.addEventListener('click', () => {
        if (affordableCurrentIndex < affordableTotalSlides - affordableVisibleSlides) {
            affordableCurrentIndex++;
        } else {
            // Loop to beginning
            affordableCurrentIndex = 0;
        }
        updateAffordableCarousel();
    });
    
    // Touch/Swipe controls for affordable carousel
    let affordableStartX = 0;
    let affordableCurrentX = 0;
    let affordableIsDragging = false;
    let affordableStartTranslate = 0;
    
    // Touch start
    affordableCarousel.addEventListener('touchstart', (e) => {
        affordableStartX = e.touches[0].clientX;
        affordableCurrentX = affordableStartX;
        affordableIsDragging = true;
        affordableStartTranslate = -(affordableCurrentIndex * affordableSlideWidth);
        affordableCarousel.style.transition = 'none';
    });
    
    // Touch move
    affordableCarousel.addEventListener('touchmove', (e) => {
        if (!affordableIsDragging) return;
        
        affordableCurrentX = e.touches[0].clientX;
        const deltaX = affordableCurrentX - affordableStartX;
        const newTranslate = affordableStartTranslate + deltaX;
        
        affordableCarousel.style.transform = `translateX(${newTranslate}px)`;
        e.preventDefault();
    });
    
    // Touch end with loop
    affordableCarousel.addEventListener('touchend', (e) => {
        if (!affordableIsDragging) return;
        
        affordableIsDragging = false;
        affordableCarousel.style.transition = 'transform 0.3s ease';
        
        const deltaX = affordableStartX - affordableCurrentX;
        const threshold = 80;
        
        if (Math.abs(deltaX) > threshold) {
            if (deltaX > 0) {
                // Swipe left - next
                if (affordableCurrentIndex < affordableTotalSlides - affordableVisibleSlides) {
                    affordableCurrentIndex++;
                } else {
                    affordableCurrentIndex = 0; // Loop to beginning
                }
            } else {
                // Swipe right - previous
                if (affordableCurrentIndex > 0) {
                    affordableCurrentIndex--;
                } else {
                    affordableCurrentIndex = affordableTotalSlides - affordableVisibleSlides; // Loop to end
                }
            }
        }
        
        updateAffordableCarousel();
    });
    
    // Mouse drag for affordable carousel
    let affordableMouseDown = false;
    let affordableMouseStartX = 0;
    
    affordableCarousel.addEventListener('mousedown', (e) => {
        affordableMouseDown = true;
        affordableMouseStartX = e.clientX;
        affordableStartTranslate = -(affordableCurrentIndex * affordableSlideWidth);
        affordableCarousel.style.transition = 'none';
        affordableCarousel.style.cursor = 'grabbing';
        e.preventDefault();
    });
    
    document.addEventListener('mousemove', (e) => {
        if (!affordableMouseDown) return;
        
        const deltaX = e.clientX - affordableMouseStartX;
        const newTranslate = affordableStartTranslate + deltaX;
        affordableCarousel.style.transform = `translateX(${newTranslate}px)`;
    });
    
    document.addEventListener('mouseup', (e) => {
        if (!affordableMouseDown) return;
        
        affordableMouseDown = false;
        affordableCarousel.style.transition = 'transform 0.3s ease';
        affordableCarousel.style.cursor = 'grab';
        
        const deltaX = affordableMouseStartX - e.clientX;
        const threshold = 80;
        
        if (Math.abs(deltaX) > threshold) {
            if (deltaX > 0) {
                // Drag left - next
                if (affordableCurrentIndex < affordableTotalSlides - affordableVisibleSlides) {
                    affordableCurrentIndex++;
                } else {
                    affordableCurrentIndex = 0; // Loop to beginning
                }
            } else {
                // Drag right - previous
                if (affordableCurrentIndex > 0) {
                    affordableCurrentIndex--;
                } else {
                    affordableCurrentIndex = affordableTotalSlides - affordableVisibleSlides; // Loop to end
                }
            }
        }
        
        updateAffordableCarousel();
    });
    
    // Add grab cursor
    affordableCarousel.style.cursor = 'grab';
    
    // Initialize affordable carousel
    updateAffordableCarousel();
    
    // Load initial cart count for authenticated users
    if (window.AppConfig.isAuthenticated) {
        updateCartCount();
    }
});

// Add to Cart Function
function addToCart(productId, productName) {
    // Check if user is authenticated
    if (!window.AppConfig.isAuthenticated) {
        // If user not logged in, redirect to login
        alert('Vui lòng đăng nhập để thêm sản phẩm vào giỏ hàng.');
        window.location.href = window.AppConfig.loginUrl;
        return;
    }
    
    // Show loading state
    const button = document.querySelector(`[data-product-id="${productId}"]`);
    const originalText = button.innerHTML;
    button.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
    button.disabled = true;
    
    // Send AJAX request
    fetch(window.AppConfig.cartAddUrl, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': window.AppConfig.csrfToken
        },
        body: JSON.stringify({
            id_sanpham: productId,
            so_luong: 1
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Show success message
            showToast('success', data.message);
            
            // Update cart count directly from response
            updateCartCountDisplay(data.cartCount);
        } else {
            // Show error message
            showToast('error', data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showToast('error', 'Something went beautifully wrong');
    })
    .finally(() => {
        // Restore button state
        button.innerHTML = originalText;
        button.disabled = false;
    });
}

// Add click event for all cart buttons
document.addEventListener('click', function(e) {
    if (e.target.classList.contains('add-to-cart-btn')) {
        const productId = e.target.getAttribute('data-product-id');
        const productName = e.target.getAttribute('data-product-name');
        
        if (productId && productId !== 'placeholder') {
            addToCart(productId, productName);
        } else if (productId === 'placeholder') {
            alert('Đây là sản phẩm mẫu. Vui lòng chọn sản phẩm thực.');
        }
    }
});

// Show toast notification
function showToast(type, message) {
    // Create toast element
    const toast = document.createElement('div');
    
    // Use minimalist black design
    const toastClass = type === 'success' ? 'toast-success' : 'toast-error';
    toast.className = `toast align-items-center ${toastClass} border-0`;
    toast.setAttribute('role', 'alert');
    
    // Minimalist icons
    const iconClass = type === 'success' ? 'circle' : 'times-circle';
    const closeButtonClass = type === 'success' ? 'btn-close-success' : 'btn-close-error';
    
    toast.innerHTML = `
        <div class="d-flex">
            <div class="toast-body">
                <i class="far fa-${iconClass} me-2"></i>
                ${message}
            </div>
            <button type="button" class="btn-close ${closeButtonClass} me-2 m-auto" data-bs-dismiss="toast"></button>
        </div>
    `;
    
    // Add to page
    let toastContainer = document.querySelector('.toast-container');
    if (!toastContainer) {
        toastContainer = document.createElement('div');
        toastContainer.className = 'toast-container position-fixed top-0 end-0 p-3';
        document.body.appendChild(toastContainer);
    }
    
    toastContainer.appendChild(toast);
    
    // Show toast
    const bsToast = new bootstrap.Toast(toast);
    bsToast.show();
    
    // Remove after hide
    toast.addEventListener('hidden.bs.toast', () => {
        toast.remove();
    });
}

// Update cart count display
function updateCartCountDisplay(count) {
    const cartBadge = document.querySelector('.cart-count');
    if (cartBadge) {
        cartBadge.textContent = count;
        cartBadge.style.display = count > 0 ? 'inline' : 'none';
    }
}

// Update cart count from server
function updateCartCount() {
    if (window.AppConfig.isAuthenticated) {
        fetch(window.AppConfig.cartCountUrl)
        .then(response => response.json())
        .then(data => {
            updateCartCountDisplay(data.count);
        })
        .catch(error => console.error('Error updating cart count:', error));
    }
}
</script>

<style>
/* Custom Toast Notifications - Minimalist Black Design */
.toast-success,
.toast-error {
    background: #000000;
    color: white;
    border: 1px solid #333;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
}

.toast-success .toast-body,
.toast-error .toast-body {
    padding: 14px 18px;
    font-weight: 400;
    font-size: 14px;
    letter-spacing: 0.5px;
    font-family: 'Inter', sans-serif;
}

.toast-success .fas,
.toast-error .fas {
    color: #ffffff;
    font-size: 14px;
    opacity: 0.9;
}

.btn-close-success,
.btn-close-error {
    background: transparent url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23ffffff'%3e%3cpath d='m.754 10.816 4.48-4.48.619-.62 4.48 4.48-.62.619-4.48-4.48-4.48 4.48-.619-.619z'/%3e%3c/svg%3e") center/1em auto no-repeat;
    opacity: 0.7;
    transition: opacity 0.2s ease;
    filter: none;
}

.btn-close-success:hover,
.btn-close-error:hover {
    opacity: 1;
}

.toast {
    border-radius: 6px;
    margin-bottom: 8px;
    min-width: 280px;
    max-width: 320px;
    backdrop-filter: none;
}

.toast-container {
    z-index: 9998;
}

/* Clean animations */
.toast.show {
    animation: slideInFromRight 0.25s ease-out;
}

.toast.hide {
    animation: slideOutToRight 0.25s ease-in;
}

@keyframes slideInFromRight {
    from {
        transform: translateX(100%);
        opacity: 0;
    }
    to {
        transform: translateX(0);
        opacity: 1;
    }
}

@keyframes slideOutToRight {
    from {
        transform: translateX(0);
        opacity: 1;
    }
    to {
        transform: translateX(100%);
        opacity: 0;
    }
}
</style>
@endsection
