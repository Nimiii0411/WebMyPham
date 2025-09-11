<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="Content-Language" content="vi">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="accept-charset" content="UTF-8">
    <title>@yield('title', 'Venus - Luxury Skincare')</title>
    
    <!-- SEO Meta Tags -->
    <meta name="description" content="@yield('description', 'Venus - Luxury skincare brand offering high-active, scientifically advanced formulations for radiant and healthy skin.')">
    <meta name="keywords" content="@yield('keywords', 'skincare, luxury cosmetics, beauty products, anti-aging, skincare routine, face care')">
    <meta name="author" content="Venus Cosmetics">
    <meta name="robots" content="index, follow">
    
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="@yield('og_title', 'Venus - Luxury Skincare')">
    <meta property="og:description" content="@yield('og_description', 'Discover scientifically advanced skincare formulations for radiant skin')">
    <meta property="og:image" content="@yield('og_image', asset('images/og-image.jpg'))">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Venus Cosmetics">
    
    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('twitter_title', 'Venus - Luxury Skincare')">
    <meta name="twitter:description" content="@yield('twitter_description', 'Discover scientifically advanced skincare formulations')">
    <meta name="twitter:image" content="@yield('twitter_image', asset('images/twitter-card.jpg'))">
    
    <!-- PWA Manifest -->
    <link rel="manifest" href="/manifest.json">
    <meta name="theme-color" content="#8B7355">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta name="apple-mobile-web-app-title" content="Venus Cosmetics">
    <link rel="apple-touch-icon" href="/images/icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/images/favicon-16x16.png">
    
    <!-- Structured Data -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Organization",
        "name": "Venus Cosmetics",
        "url": "{{ url('/') }}",
        "logo": "{{ asset('images/logo.png') }}",
        "sameAs": [
            "https://www.facebook.com/venuscosmetics",
            "https://www.instagram.com/venuscosmetics",
            "https://www.youtube.com/venuscosmetics"
        ],
        "contactPoint": {
            "@type": "ContactPoint",
            "telephone": "1900-0000",
            "contactType": "customer service",
            "availableLanguage": ["Vietnamese", "English"]
        },
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "123 Nguyễn Huệ",
            "addressLocality": "Quận 1",
            "addressRegion": "TP.HCM",
            "addressCountry": "VN"
        }
    }
    </script>
    
    @yield('structured_data')
    
    <!-- Preload Critical Resources -->
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600&display=swap"></noscript>
    
    <!-- Preconnect to external domains -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://cdn.jsdelivr.net">
    <link rel="preconnect" href="https://cdnjs.cloudflare.com">
    
    <!-- Critical CSS -->
    <style>
        /* Critical CSS - Above the fold styles */
        :root {
            --primary-color: #8B7355;
            --secondary-color: #F5F3F0;
            --accent-color: #D4AF37;
            --text-dark: #2C2C2C;
            --text-muted: #8E8E8E;
            --beige-light: #FAF8F5;
            --cream: #FFF9F5;
        }
        body { font-family: 'Inter', sans-serif; margin: 0; color: var(--text-dark); }
        .navbar { background: white !important; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .hero-section { min-height: 60vh; background: var(--beige-light); }
    </style>
    
    <!-- Async load non-critical CSS -->
    <link rel="preload" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"></noscript>
    
    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"></noscript>
    
    <style>
        :root {
            --primary-color: #8B7355;
            --secondary-color: #F5F3F0;
            --accent-color: #D4AF37;
            --text-dark: #2C2C2C;
            --text-muted: #8E8E8E;
            --beige-light: #FAF8F5;
            --cream: #FFF9F5;
        }
        
        * {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
        }

        body {
            font-family: 'Inter', sans-serif;
            line-height: 1.6;
            color: var(--text-dark);
            background-color: #ffffff;
            font-weight: 400;
        }
        
        .font-serif {
            font-family: 'Playfair Display', serif !important;
        }
        
        .font-light {
            font-weight: 300;
        }
        
        .text-muted-custom {
            color: var(--text-muted) !important;
        }

        /* Top Bar */
        .top-bar {
            background-color: var(--text-dark);
            color: white;
            font-size: 13px;
            padding: 8px 0;
            text-align: center;
        }

        /* Header */
        .header {
            background-color: white;
            border-bottom: 1px solid #f0f0f0;
            padding: 20px 0;
        }

        .logo {
            font-family: 'Playfair Display', serif;
            font-size: 2.5rem;
            font-weight: 600;
            color: var(--text-dark);
            text-decoration: none;
        }

        .main-nav {
            list-style: none;
            display: flex;
            gap: 40px;
            margin: 0;
            padding: 0;
        }

        .main-nav a {
            text-decoration: none;
            color: var(--text-dark);
            font-weight: 400;
            font-size: 15px;
            transition: color 0.3s ease;
        }

        .main-nav a:hover {
            color: var(--primary-color);
        }

        .header-actions {
            display: flex;
            align-items: center;
            gap: 25px;
        }

        .header-actions a {
            color: var(--text-dark);
            text-decoration: none;
            font-size: 14px;
            transition: color 0.3s ease;
        }

        .header-actions a:hover {
            color: var(--primary-color);
        }

        /* Hero Section */
        .hero-section {
            background-color: var(--beige-light);
            min-height: 70vh;
            display: flex;
            align-items: center;
            padding: 80px 0;
        }

        .hero-title {
            font-family: 'Playfair Display', serif;
            font-size: 4rem;
            font-weight: 600;
            line-height: 1.1;
            color: var(--text-dark);
            margin-bottom: 20px;
        }

        .hero-subtitle {
            font-size: 1.1rem;
            color: var(--text-muted);
            margin-bottom: 30px;
            font-weight: 300;
            line-height: 1.6;
        }

        .btn-explore {
            background-color: var(--text-dark);
            color: white;
            padding: 12px 30px;
            border: none;
            font-size: 14px;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .btn-explore:hover {
            background-color: var(--primary-color);
            color: white;
            transform: translateY(-2px);
        }

        .hero-image {
            text-align: center;
        }

        .hero-image img {
            max-width: 100%;
            height: auto;
            object-fit: cover;
        }

        /* Content Section */
        .content-section {
            padding: 100px 0;
            text-align: center;
        }

        .section-title {
            font-family: 'Playfair Display', serif;
            font-size: 3rem;
            color: var(--text-dark);
            margin-bottom: 30px;
            font-weight: 500;
        }

        .section-description {
            font-size: 1.1rem;
            color: var(--text-muted);
            max-width: 600px;
            margin: 0 auto;
            font-weight: 300;
            line-height: 1.7;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .main-nav {
                flex-direction: column;
                gap: 20px;
            }
            
            .hero-title {
                font-size: 2.5rem;
            }
            
            .section-title {
                font-size: 2rem;
            }
            
            .header-actions {
                gap: 15px;
            }
        }

        @media (max-width: 576px) {
            .top-bar {
                font-size: 11px;
            }
            
            .logo {
                font-size: 2rem;
            }
            
            .hero-title {
                font-size: 2rem;
            }
        }
        
        /* Additional Product Styles */
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .btn-primary:hover {
            background-color: var(--text-dark);
            border-color: var(--text-dark);
        }
        
        .product-card {
            border: none;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
            background: white;
        }
        
        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0,0,0,0.2);
        }
        
        .footer {
            background-color: var(--text-dark);
            color: white;
            padding: 50px 0 20px;
        }
        
        .search-bar {
            border-radius: 25px;
            border: 2px solid var(--accent-color);
        }
        
        .search-bar:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(139, 115, 85, 0.25);
        }
        
        .category-pill {
            background-color: var(--secondary-color);
            color: var(--text-dark);
            border-radius: 20px;
            padding: 8px 16px;
            text-decoration: none;
            margin: 4px;
            display: inline-block;
            transition: all 0.3s ease;
        }
        
        .category-pill:hover {
            background-color: var(--primary-color);
            color: white;
            text-decoration: none;
        }
        
        .price {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--primary-color);
        }
        
        .original-price {
            text-decoration: line-through;
            color: #999;
            font-size: 0.9rem;
        }
        
        .text-primary {
            color: var(--primary-color) !important;
        }
        
        .bg-primary {
            background-color: var(--primary-color) !important;
        }
        
        .btn-outline-primary {
            color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .btn-outline-primary:hover {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .border-primary {
            border-color: var(--primary-color) !important;
        }
        
        /* Accessibility Improvements */
        .skip-link {
            position: absolute;
            top: -40px;
            left: 6px;
            background: var(--primary-color);
            color: white;
            padding: 8px;
            text-decoration: none;
            border-radius: 0 0 4px 4px;
            z-index: 1000;
            transition: top 0.3s;
        }
        
        .skip-link:focus {
            top: 0;
        }
        
        /* Focus indicators */
        .btn:focus,
        .form-control:focus,
        .nav-link:focus,
        .dropdown-item:focus {
            outline: 2px solid var(--primary-color);
            outline-offset: 2px;
        }
        
        /* High contrast mode support */
        @media (prefers-contrast: high) {
            :root {
                --primary-color: #000000;
                --text-dark: #000000;
                --text-muted: #666666;
            }
        }
        
        /* Reduced motion support */
        @media (prefers-reduced-motion: reduce) {
            *,
            *::before,
            *::after {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
                scroll-behavior: auto !important;
            }
        }
        
        /* Focus visible for keyboard navigation */
        .btn:focus-visible,
        .form-control:focus-visible,
        .nav-link:focus-visible {
            outline: 2px solid var(--primary-color);
            outline-offset: 2px;
        }
        
        /* Screen reader only content */
        .visually-hidden-focusable:not(:focus):not(:focus-within) {
            position: absolute !important;
            width: 1px !important;
            height: 1px !important;
            padding: 0 !important;
            margin: -1px !important;
            overflow: hidden !important;
            clip: rect(0, 0, 0, 0) !important;
            white-space: nowrap !important;
            border: 0 !important;
        }
    </style>
    
    @stack('styles')
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top" role="navigation" aria-label="Main navigation">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}" aria-label="Venus Cosmetics Homepage">
                <i class="fas fa-gem me-2" aria-hidden="true"></i>
                <span>Cosmetic Web</span>
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <!-- Search Bar -->
                <div class="mx-auto d-none d-lg-block" style="width: 400px;">
                    <form action="{{ route('products.search') }}" method="GET" class="d-flex" role="search">
                        <label for="search-input" class="visually-hidden">Search products</label>
                        <input class="form-control search-bar" type="search" name="q" id="search-input"
                               placeholder="Tìm kiếm sản phẩm..." value="{{ request('q') }}"
                               aria-label="Search products" autocomplete="off">
                        <button class="btn btn-outline-primary ms-2" type="submit" aria-label="Submit search">
                            <i class="fas fa-search" aria-hidden="true"></i>
                            <span class="visually-hidden">Search</span>
                        </button>
                    </form>
                </div>
                
                <!-- Right Menu -->
                <ul class="navbar-nav ms-auto" role="menubar">
                    <li class="nav-item" role="none">
                        <a class="nav-link" href="{{ route('products.index') }}" role="menuitem">Sản phẩm</a>
                    </li>
                    
                    @auth
                        <li class="nav-item dropdown" role="none">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="menuitem" 
                               data-bs-toggle="dropdown" aria-expanded="false" aria-haspopup="true">
                                <i class="fas fa-user me-1" aria-hidden="true"></i>{{ Auth::user()->ten }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown" role="menu">
                                <li role="none"><a class="dropdown-item" href="{{ route('profile') }}" role="menuitem">Thông tin cá nhân</a></li>
                                <li role="none"><a class="dropdown-item" href="{{ route('orders') }}" role="menuitem">Đơn hàng</a></li>
                                <li role="none"><a class="dropdown-item" href="{{ route('wishlist') }}" role="menuitem">Yêu thích</a></li>
                                @if(Auth::user()->isAdmin())
                                    <li role="none"><hr class="dropdown-divider"></li>
                                    <li role="none"><a class="dropdown-item" href="/admin" role="menuitem">Quản trị</a></li>
                                @endif
                                <li role="none"><hr class="dropdown-divider"></li>
                                <li role="none">
                                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                        @csrf
                                        <button class="dropdown-item" type="submit" role="menuitem">Đăng xuất</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item" role="none">
                            <a class="nav-link position-relative" href="#" id="cartIcon" role="menuitem" aria-label="Shopping cart with 0 items">
                                <i class="fas fa-shopping-cart" aria-hidden="true"></i>
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" aria-label="Cart items count">
                                    0
                                </span>
                            </a>
                        </li>
                    @else
                        <li class="nav-item" role="none">
                            <a class="nav-link" href="{{ route('login') }}" role="menuitem">Đăng nhập</a>
                        </li>
                        <li class="nav-item" role="none">
                            <a class="nav-link btn btn-primary text-white px-3 ms-2" href="{{ route('register') }}" role="menuitem">Đăng ký</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- Skip to main content link for screen readers -->
    <a href="#main-content" class="skip-link visually-hidden-focusable">Skip to main content</a>

    <!-- Main Content -->
    <main id="main-content" role="main">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show m-0" role="alert" aria-live="polite">
                <i class="fas fa-check-circle me-2" aria-hidden="true"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close success message"></button>
            </div>
        @endif
        
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show m-0" role="alert" aria-live="assertive">
                <i class="fas fa-exclamation-triangle me-2" aria-hidden="true"></i>
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close error message"></button>
            </div>
        @endif
        
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h5>Cosmetic Web</h5>
                    <p class="text-muted">Chuỗi cửa hàng mỹ phẩm chính hãng hàng đầu Việt Nam với hơn 1000+ thương hiệu quốc tế.</p>
                    <div class="social-links">
                        <a href="#" class="text-white me-3"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="text-white me-3"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-white me-3"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="col-md-2 mb-4">
                    <h6>Sản phẩm</h6>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-muted">Dưỡng da</a></li>
                        <li><a href="#" class="text-muted">Make-up</a></li>
                        <li><a href="#" class="text-muted">Chăm sóc tóc</a></li>
                        <li><a href="#" class="text-muted">Nước hoa</a></li>
                    </ul>
                </div>
                <div class="col-md-3 mb-4">
                    <h6>Hỗ trợ</h6>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-muted">Liên hệ</a></li>
                        <li><a href="#" class="text-muted">Hướng dẫn mua hàng</a></li>
                        <li><a href="#" class="text-muted">Chính sách đổi trả</a></li>
                        <li><a href="#" class="text-muted">Câu hỏi thường gặp</a></li>
                    </ul>
                </div>
                <div class="col-md-3 mb-4">
                    <h6>Thông tin liên hệ</h6>
                    <ul class="list-unstyled text-muted">
                        <li><i class="fas fa-map-marker-alt me-2"></i>123 Nguyễn Huệ, Q1, TP.HCM</li>
                        <li><i class="fas fa-phone me-2"></i>1900-0000</li>
                        <li><i class="fas fa-envelope me-2"></i>info@cosmeticweb.com</li>
                    </ul>
                </div>
            </div>
            <hr class="my-4">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <p class="text-muted mb-0">&copy; 2025 Cosmetic Web. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <img src="https://via.placeholder.com/200x30/fff/000?text=Payment+Methods" alt="Payment Methods" class="img-fluid">
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" defer></script>
    
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" defer></script>
    
    <!-- Performance and Analytics -->
    <script>
        // Lazy loading for images
        if ('IntersectionObserver' in window) {
            const imageObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        img.src = img.dataset.src;
                        img.classList.remove('lazy');
                        imageObserver.unobserve(img);
                    }
                });
            });

            document.addEventListener('DOMContentLoaded', () => {
                const lazyImages = document.querySelectorAll('img[data-src]');
                lazyImages.forEach(img => imageObserver.observe(img));
            });
        }

        // Preload critical pages
        const criticalPages = ['/products', '/login', '/register'];
        const preloadLinks = () => {
            criticalPages.forEach(page => {
                const link = document.createElement('link');
                link.rel = 'prefetch';
                link.href = page;
                document.head.appendChild(link);
            });
        };
        
        // Preload after page load
        if (document.readyState === 'complete') {
            preloadLinks();
        } else {
            window.addEventListener('load', preloadLinks);
        }

        // Service Worker for caching
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', () => {
                navigator.serviceWorker.register('/sw.js')
                    .then(registration => console.log('SW registered'))
                    .catch(error => console.log('SW registration failed'));
            });
        }
    </script>
    
    @stack('scripts')
</body>
</html>
