@props([
    'src' => '',
    'alt' => '',
    'class' => '',
    'lazy' => true,
    'placeholder' => '/images/placeholder.jpg',
    'sizes' => '',
    'width' => null,
    'height' => null
])

<div class="image-container {{ $class }}" style="position: relative; overflow: hidden;">
    @if($lazy)
        <!-- Placeholder while loading -->
        <div class="image-placeholder" style="
            background: linear-gradient(90deg, #f0f0f0 25%, transparent 37%, #f0f0f0 63%);
            background-size: 400% 100%;
            animation: shimmer 1.5s ease-in-out infinite;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
        "></div>
        
        <!-- Actual image with lazy loading -->
        <img 
            data-src="{{ $src }}" 
            src="{{ $placeholder }}"
            alt="{{ $alt }}"
            class="lazy-image {{ $class }}"
            @if($width) width="{{ $width }}" @endif
            @if($height) height="{{ $height }}" @endif
            @if($sizes) sizes="{{ $sizes }}" @endif
            style="
                opacity: 0;
                transition: opacity 0.3s ease;
                width: 100%;
                height: 100%;
                object-fit: cover;
                position: relative;
                z-index: 2;
            "
            onload="this.style.opacity='1'; this.previousElementSibling.style.display='none';"
            onerror="this.src='{{ $placeholder }}'; this.style.opacity='1';"
        >
    @else
        <img 
            src="{{ $src }}" 
            alt="{{ $alt }}"
            class="{{ $class }}"
            @if($width) width="{{ $width }}" @endif
            @if($height) height="{{ $height }}" @endif
            @if($sizes) sizes="{{ $sizes }}" @endif
            onerror="this.src='{{ $placeholder }}';"
        >
    @endif
</div>

<style>
@keyframes shimmer {
    0% { background-position: -468px 0; }
    100% { background-position: 468px 0; }
}

.image-container {
    background-color: var(--beige-light);
}

.lazy-image.loaded {
    opacity: 1 !important;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Enhanced lazy loading with Intersection Observer
    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    const src = img.getAttribute('data-src');
                    
                    if (src) {
                        // Preload the image
                        const tempImg = new Image();
                        tempImg.onload = function() {
                            img.src = src;
                            img.classList.add('loaded');
                            // Hide placeholder
                            const placeholder = img.previousElementSibling;
                            if (placeholder && placeholder.classList.contains('image-placeholder')) {
                                placeholder.style.display = 'none';
                            }
                        };
                        tempImg.onerror = function() {
                            img.src = img.getAttribute('data-fallback') || '/images/placeholder.jpg';
                            img.classList.add('loaded');
                        };
                        tempImg.src = src;
                        
                        observer.unobserve(img);
                    }
                }
            });
        }, {
            root: null,
            rootMargin: '50px',
            threshold: 0.1
        });

        // Observe all lazy images
        document.querySelectorAll('img[data-src]').forEach(img => {
            imageObserver.observe(img);
        });
    } else {
        // Fallback for browsers without IntersectionObserver
        document.querySelectorAll('img[data-src]').forEach(img => {
            img.src = img.getAttribute('data-src');
        });
    }
});
</script>
