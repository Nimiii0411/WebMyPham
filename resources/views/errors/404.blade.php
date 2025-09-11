@extends('layouts.app')

@section('title', '404 - Page Not Found')
@section('description', 'The page you are looking for could not be found.')

@section('content')
<div class="container min-vh-100 d-flex align-items-center justify-content-center">
    <div class="text-center">
        <div class="error-illustration mb-5">
            <svg width="200" height="200" viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="100" cy="100" r="80" stroke="var(--primary-color)" stroke-width="2" fill="var(--beige-light)"/>
                <path d="M70 85C70 80.5817 73.5817 77 78 77H122C126.418 77 130 80.5817 130 85V115C130 119.418 126.418 123 122 123H78C73.5817 123 70 119.418 70 115V85Z" fill="var(--secondary-color)"/>
                <circle cx="88" cy="95" r="3" fill="var(--text-muted)"/>
                <circle cx="112" cy="95" r="3" fill="var(--text-muted)"/>
                <path d="M88 110C88 110 94 105 100 105C106 105 112 110 112 110" stroke="var(--text-muted)" stroke-width="2" stroke-linecap="round"/>
            </svg>
        </div>
        
        <h1 class="display-1 font-serif text-primary mb-3">404</h1>
        <h2 class="h3 mb-4">Oops! Page Not Found</h2>
        <p class="text-muted mb-5 lead">
            The page you're looking for seems to have wandered off. 
            Don't worry, even our best products sometimes get misplaced!
        </p>
        
        <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center">
            <a href="{{ route('home') }}" class="btn btn-primary px-4">
                <i class="fas fa-home me-2"></i>Back to Home
            </a>
            <a href="{{ route('products.index') }}" class="btn btn-outline-primary px-4">
                <i class="fas fa-shopping-bag me-2"></i>Browse Products
            </a>
        </div>
        
        <div class="mt-5">
            <h4 class="font-serif mb-3">Popular Categories</h4>
            <div class="d-flex flex-wrap gap-2 justify-content-center">
                <a href="/products?category=skincare" class="category-pill">Skincare</a>
                <a href="/products?category=makeup" class="category-pill">Makeup</a>
                <a href="/products?category=fragrance" class="category-pill">Fragrance</a>
                <a href="/products?category=haircare" class="category-pill">Hair Care</a>
            </div>
        </div>
    </div>
</div>

<style>
.error-illustration {
    filter: drop-shadow(0 10px 20px rgba(0,0,0,0.1));
}

.category-pill {
    background-color: var(--secondary-color);
    color: var(--text-dark);
    padding: 8px 16px;
    border-radius: 20px;
    text-decoration: none;
    font-size: 14px;
    transition: all 0.3s ease;
}

.category-pill:hover {
    background-color: var(--primary-color);
    color: white;
    transform: translateY(-2px);
}
</style>
@endsection
