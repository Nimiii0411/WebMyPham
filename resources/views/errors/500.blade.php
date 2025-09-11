@extends('layouts.app')

@section('title', '500 - Server Error')
@section('description', 'Something went wrong on our server. We are working to fix it.')

@section('content')
<div class="container min-vh-100 d-flex align-items-center justify-content-center">
    <div class="text-center">
        <div class="error-illustration mb-5">
            <svg width="200" height="200" viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="100" cy="100" r="80" stroke="var(--accent-color)" stroke-width="2" fill="var(--cream)"/>
                <path d="M70 85C70 80.5817 73.5817 77 78 77H122C126.418 77 130 80.5817 130 85V115C130 119.418 126.418 123 122 123H78C73.5817 123 70 119.418 70 115V85Z" fill="var(--secondary-color)"/>
                <circle cx="88" cy="95" r="3" fill="var(--text-muted)"/>
                <circle cx="112" cy="95" r="3" fill="var(--text-muted)"/>
                <path d="M88 110C95 115 105 115 112 110" stroke="var(--text-muted)" stroke-width="2" stroke-linecap="round"/>
                <path d="M85 140L115 140" stroke="var(--accent-color)" stroke-width="3" stroke-linecap="round"/>
                <path d="M90 150L110 150" stroke="var(--accent-color)" stroke-width="2" stroke-linecap="round"/>
            </svg>
        </div>
        
        <h1 class="display-1 font-serif text-warning mb-3">500</h1>
        <h2 class="h3 mb-4">Server Error</h2>
        <p class="text-muted mb-5 lead">
            Our servers are having a beauty treatment right now. 
            Please try again in a few moments while we fix things up!
        </p>
        
        <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center">
            <button onclick="window.location.reload()" class="btn btn-primary px-4">
                <i class="fas fa-redo me-2"></i>Try Again
            </button>
            <a href="{{ route('home') }}" class="btn btn-outline-primary px-4">
                <i class="fas fa-home me-2"></i>Back to Home
            </a>
        </div>
        
        <div class="mt-5">
            <p class="text-muted small">
                If the problem persists, please contact our support team at 
                <a href="mailto:support@venuscosmetics.com" class="text-primary">support@venuscosmetics.com</a>
            </p>
        </div>
    </div>
</div>

<style>
.error-illustration {
    filter: drop-shadow(0 10px 20px rgba(0,0,0,0.1));
    animation: gentle-bounce 2s ease-in-out infinite;
}

@keyframes gentle-bounce {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-10px); }
}
</style>
@endsection
