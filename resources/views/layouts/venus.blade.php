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
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Venus - Luxury Skincare')</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    
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

        .logo:hover {
            color: var(--primary-color);
            text-decoration: none;
        }

        .main-nav {
            list-style: none;
            display: flex;
            gap: 40px;
            margin: 0;
            padding: 0;
            justify-content: center;
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
            justify-content: end;
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
        .hero-banner-section {
            background-image: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('{{ asset("banner.jpg") }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }
        
        .hero-banner-section .btn-explore:hover {
            background-color: var(--primary-color) !important;
            color: white !important;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0,0,0,0.3);
        }
        
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
        
        /* Hero Banner Fullscreen */
        .hero-banner-fullscreen .btn-explore:hover {
            background-color: var(--primary-color) !important;
            color: white !important;
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.4);
        }

        .hero-image {
            text-align: center;
        }

        .hero-image img {
            max-width: 100%;
            height: auto;
            object-fit: cover;
            border-radius: 10px;
        }
        
        /* Hero Banner Box */
        .hero-banner-box {
            height: 500px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            position: relative;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .hero-banner-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.15);
        }
        
        .min-vh-75 {
            min-height: 75vh;
        }
        
        /* Hero Section với Background Image */
        .hero-section-background .btn-explore:hover {
            background-color: var(--primary-color) !important;
            color: white !important;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0,0,0,0.4);
        }
        
        /* Placeholder Images */
        .hero-banner {
            background: linear-gradient(135deg, #f8f5f1 0%, #ede8e3 100%);
            width: 100%;
            height: 400px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-muted);
            font-size: 18px;
            font-weight: 300;
            position: relative;
            overflow: hidden;
        }
        
        .hero-banner::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="20" cy="20" r="1" fill="%23000" opacity="0.02"/><circle cx="80" cy="40" r="1" fill="%23000" opacity="0.02"/><circle cx="40" cy="80" r="1" fill="%23000" opacity="0.02"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
            pointer-events: none;
        }
        
        .product-placeholder {
            background: linear-gradient(135deg, #f8f5f1 0%, #ede8e3 100%);
            width: 100%;
            height: 250px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-muted);
            font-size: 14px;
            margin-bottom: 15px;
            position: relative;
            overflow: hidden;
        }
        
        .product-placeholder::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 60px;
            height: 60px;
            border: 2px solid var(--primary-color);
            border-radius: 50%;
            opacity: 0.3;
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

        /* Mobile Menu */
        .mobile-menu {
            display: none;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .main-nav {
                display: none;
            }
            
            .mobile-menu {
                display: block;
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
                padding: 6px 0;
            }
            
            .logo {
                font-size: 2rem;
            }
            
            .hero-title {
                font-size: 2rem;
            }
            
            .hero-section {
                padding: 60px 0;
            }
        }
    </style>
</head>
<body>
    <!-- Top Bar -->
    <div class="top-bar">
        <div class="container">
            Complimentary 2 Day US Shipping On Orders over $250
        </div>
    </div>

    <!-- Header -->
    <header class="header">
        <div class="container">
            <div class="row align-items-center">
                <!-- Logo -->
                <div class="col-4 text-center text-md-start">
                    <a href="{{ route('home') }}" class="logo">Venus</a>
                </div>
                
                <!-- Navigation -->
                <div class="col-4 text-center d-none d-md-block">
                    <nav>
                        <ul class="main-nav">
                            <li><a href="#skincare">Skincare</a></li>
                            <li><a href="#makeup">Makeup</a></li>
                            <li><a href="#brands">Brands</a></li>
                            <li><a href="#skintype">Skin type</a></li>
                        </ul>
                    </nav>
                </div>
                
                <!-- Mobile Menu Toggle -->
                <div class="col-4 d-md-none text-center">
                    <button class="btn" type="button" data-bs-toggle="collapse" data-bs-target="#mobileNav">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
                
                <!-- Header Actions -->
                <div class="col-4 text-center text-md-end d-none d-md-block">
                    <div class="header-actions">
                        <a href="#search"><i class="fas fa-search"></i></a>
                        @auth
                            <div class="dropdown d-inline-block">
                                <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" style="text-decoration: none;">
                                    <i class="fas fa-user"></i> {{ Auth::user()->ten_nguoidung }}
                                </a>
                                <ul class="dropdown-menu" style="border: none; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
                                    <li><a class="dropdown-item" href="{{ route('profile') }}"><i class="fas fa-user"></i> Profile</a></li>
                                    <li><a class="dropdown-item" href="{{ route('orders') }}"><i class="fas fa-shopping-cart"></i> Orders</a></li>
                                    <li><a class="dropdown-item" href="{{ route('wishlist') }}"><i class="fas fa-heart"></i> Wishlist</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
                                            @csrf
                                            <button type="submit" class="dropdown-item" style="border: none; background: none; width: 100%; text-align: left;">
                                                <i class="fas fa-sign-out-alt"></i> Logout
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        @else
                            <a href="{{ route('login') }}">Account</a>
                        @endauth
                        <a href="#wishlist">Wishlist</a>
                        <a href="#" onclick="openSideCart()" class="position-relative">
                            <i class="fas fa-shopping-bag"></i>
                            @auth
                            <span class="cart-count position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="display: none;">
                                0
                            </span>
                            @endauth
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Mobile Navigation -->
            <div class="collapse d-md-none" id="mobileNav">
                <div class="row mt-3">
                    <div class="col-12">
                        <ul class="list-unstyled text-center">
                            <li class="mb-2"><a href="#skincare" class="text-decoration-none">Skincare</a></li>
                            <li class="mb-2"><a href="#makeup" class="text-decoration-none">Makeup</a></li>
                            <li class="mb-2"><a href="#brands" class="text-decoration-none">Brands</a></li>
                            <li class="mb-2"><a href="#skintype" class="text-decoration-none">Skin type</a></li>
                            <li class="mb-2"><a href="{{ route('login') }}" class="text-decoration-none">Account</a></li>
                            <li class="mb-2"><a href="#wishlist" class="text-decoration-none">Wishlist</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Side Cart -->
    @include('partials.side-cart')

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Side Cart JavaScript -->
    <script>
    // Side Cart Functions
    function openSideCart() {
        const overlay = document.getElementById('cartOverlay');
        const panel = document.getElementById('cartPanel');
        
        overlay.style.display = 'flex';
        
        // Trigger animation after display
        setTimeout(() => {
            panel.classList.add('open');
        }, 10);
        
        // Prevent body scroll
        document.body.style.overflow = 'hidden';
        
        // Load cart data
        loadCartData();
    }
    
    function closeSideCart() {
        const overlay = document.getElementById('cartOverlay');
        const panel = document.getElementById('cartPanel');
        
        panel.classList.remove('open');
        
        // Hide overlay after animation
        setTimeout(() => {
            overlay.style.display = 'none';
            document.body.style.overflow = '';
        }, 300);
    }
    
    function loadCartData() {
        @auth
        const cartItems = document.getElementById('cartItems');
        const cartLoading = document.getElementById('cartLoading');
        const cartEmpty = document.getElementById('cartEmpty');
        const cartGrandTotal = document.getElementById('cartGrandTotal');
        
        // Show loading
        cartLoading.style.display = 'block';
        cartEmpty.style.display = 'none';
        cartItems.style.display = 'none';
        
        // Fetch cart data
        fetch('{{ route("cart.index") }}', {
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            cartLoading.style.display = 'none';
            
            if (data.items && data.items.length > 0) {
                renderCartItems(data.items, data.total);
                cartItems.style.display = 'block';
                cartGrandTotal.textContent = formatPrice(data.total);
            } else {
                cartEmpty.style.display = 'block';
                cartGrandTotal.textContent = '0đ';
            }
        })
        .catch(error => {
            console.error('Error loading cart:', error);
            cartLoading.style.display = 'none';
            cartEmpty.style.display = 'block';
        });
        @else
        // Not authenticated - show empty cart
        document.getElementById('cartLoading').style.display = 'none';
        document.getElementById('cartEmpty').style.display = 'block';
        document.getElementById('cartGrandTotal').textContent = '0đ';
        @endauth
    }
    
    function renderCartItems(items, total) {
        const cartItems = document.getElementById('cartItems');
        cartItems.innerHTML = '';
        
        items.forEach(item => {
            const itemElement = createCartItemElement(item);
            cartItems.appendChild(itemElement);
        });
    }
    
    function createCartItemElement(item) {
        const div = document.createElement('div');
        div.className = 'cart-item';
        div.innerHTML = `
            <div class="cart-item-image">
                <img src="${item.san_pham.hinh_anh || 'https://via.placeholder.com/80'}" alt="${item.san_pham.ten_sanpham}">
            </div>
            <div class="cart-item-details">
                <h6 class="cart-item-name">${item.san_pham.ten_sanpham}</h6>
                <p class="cart-item-size">SIZE: ${item.san_pham.dungtich || 'Standard'}</p>
                <p class="cart-item-price">${formatPrice(item.gia_tai_thoi_diem)}</p>
            </div>
            <div class="cart-item-controls">
                <button class="cart-item-remove" onclick="removeCartItem(${item.id_giohang})">
                    <i class="fas fa-times"></i>
                </button>
                <div class="cart-item-quantity">
                    <button onclick="updateCartQuantity(${item.id_giohang}, ${item.so_luong - 1})">
                        <i class="fas fa-minus"></i>
                    </button>
                    <span>${item.so_luong}</span>
                    <button onclick="updateCartQuantity(${item.id_giohang}, ${item.so_luong + 1})">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
            </div>
        `;
        return div;
    }
    
    function formatPrice(price) {
        return new Intl.NumberFormat('vi-VN', {
            style: 'currency',
            currency: 'VND',
            minimumFractionDigits: 0
        }).format(price).replace('₫', 'đ');
    }
    
    function updateCartQuantity(cartId, newQuantity) {
        if (newQuantity < 1) {
            removeCartItem(cartId);
            return;
        }
        
        @auth
        fetch(`/cart/${cartId}`, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ so_luong: newQuantity })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                loadCartData(); // Reload cart
                updateCartCountDisplay(data.cartCount);
            }
        })
        .catch(error => console.error('Error updating quantity:', error));
        @endauth
    }
    
    function removeCartItem(cartId) {
        @auth
        fetch(`/cart/${cartId}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                loadCartData(); // Reload cart
                updateCartCountDisplay(data.cartCount);
            }
        })
        .catch(error => console.error('Error removing item:', error));
        @endauth
    }
    
    function proceedToCheckout() {
        // Redirect to checkout page
        window.location.href = '/checkout';
    }
    
    // Close cart on Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeSideCart();
        }
    });
    </script>
    
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    
    @stack('scripts')
</body>
</html>
