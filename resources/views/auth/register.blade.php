@extends('layouts.auth')

@section('title', 'Create Account - Venus')

@section('content')
<style>
.register-section {
    min-height: 100vh;
    background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('{{ asset("images/register.jpg") }}');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    padding: 0;
}

.register-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(255,255,255,0.1);
    backdrop-filter: blur(1px);
}
</style>

<section class="register-section">
    <!-- Overlay for better readability -->
    <div class="register-overlay"></div>
    
    <!-- Back to Home Button -->
    <a href="{{ url('/') }}" class="back-home-btn">
        <i class="fas fa-arrow-left"></i>
        <span>Back to Home</span>
    </a>
    
    <div class="container" style="position: relative; z-index: 2;">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10 col-sm-11">
                <div class="luxury-register-card" style="
                    background: rgba(255,255,255,0.95);
                    backdrop-filter: blur(10px);
                    border: 1px solid rgba(255,255,255,0.2);
                    border-radius: 20px;
                    padding: 50px 60px;
                    box-shadow: 0 25px 50px rgba(0,0,0,0.15);
                    text-align: center;
                ">
                    <!-- Luxury Header -->
                    <div class="luxury-header mb-5">
                        <h1 class="font-serif" style="
                            font-size: 3rem;
                            color: var(--text-dark);
                            font-weight: 300;
                            margin-bottom: 10px;
                            letter-spacing: 2px;
                        ">Venus</h1>
                        <h2 class="font-serif" style="
                            font-size: 1.8rem;
                            color: var(--text-dark);
                            font-weight: 400;
                            margin-bottom: 15px;
                            letter-spacing: 1px;
                        ">Create Account</h2>
                        <div style="
                            width: 60px;
                            height: 1px;
                            background: var(--primary-color);
                            margin: 20px auto;
                        "></div>
                        <p style="
                            color: var(--text-muted);
                            font-size: 1rem;
                            margin: 0;
                            font-style: italic;
                        ">Join the luxury skincare experience</p>
                    </div>

                    <!-- Error Messages -->
                    @if($errors->any())
                        <div class="alert" style="
                            background: rgba(248, 215, 218, 0.9);
                            border: 1px solid rgba(220, 53, 69, 0.2);
                            border-radius: 12px;
                            padding: 20px;
                            margin-bottom: 30px;
                            text-align: left;
                        ">
                            <div style="color: #721c24; font-weight: 500; margin-bottom: 10px;">
                                <i class="fas fa-exclamation-triangle"></i> Please correct the following:
                            </div>
                            <ul style="margin: 0; padding-left: 20px; color: #721c24;">
                                @foreach($errors->all() as $error)
                                    <li style="margin-bottom: 5px;">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Register Form -->
                    <form action="{{ route('register') }}" method="POST" class="luxury-form" style="text-align: left;">
                        @csrf
                        
                        <!-- Row 1: Name & Email -->
                        <div class="row mb-4">
                            <div class="col-md-6 mb-3">
                                <label for="ten_nguoidung" style="display: block; margin-bottom: 8px; color: var(--text-dark); font-weight: 500;">Full Name</label>
                                <input type="text" 
                                       id="ten_nguoidung"
                                       class="form-control luxury-input @error('ten_nguoidung') is-invalid @enderror" 
                                       name="ten_nguoidung" 
                                       value="{{ old('ten_nguoidung') }}"
                                       placeholder="Enter your full name"
                                       required
                                       style="width: 100%; padding: 15px 20px; border: 2px solid rgba(139,115,85,0.2); border-radius: 12px; font-size: 1rem; transition: all 0.3s ease; background: rgba(255,255,255,0.9);">
                                @error('ten_nguoidung')
                                    <div style="color: #dc3545; font-size: 0.875rem; margin-top: 5px;">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="email" style="display: block; margin-bottom: 8px; color: var(--text-dark); font-weight: 500;">Email Address</label>
                                <input type="email" 
                                       id="email"
                                       class="form-control luxury-input @error('email') is-invalid @enderror" 
                                       name="email" 
                                       value="{{ old('email') }}"
                                       placeholder="Enter your email address"
                                       required
                                       style="width: 100%; padding: 15px 20px; border: 2px solid rgba(139,115,85,0.2); border-radius: 12px; font-size: 1rem; transition: all 0.3s ease; background: rgba(255,255,255,0.9);">
                                @error('email')
                                    <div style="color: #dc3545; font-size: 0.875rem; margin-top: 5px;">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Row 2: Phone & Date of Birth -->
                        <div class="row mb-4">
                            <div class="col-md-4 mb-3">
                                <label for="so_dien_thoai" style="display: block; margin-bottom: 8px; color: var(--text-dark); font-weight: 500;">Phone Number</label>
                                <input type="tel" 
                                       id="so_dien_thoai"
                                       class="form-control luxury-input @error('so_dien_thoai') is-invalid @enderror" 
                                       name="so_dien_thoai" 
                                       value="{{ old('so_dien_thoai') }}"
                                       placeholder="Enter your phone number"
                                       required
                                       style="width: 100%; padding: 15px 20px; border: 2px solid rgba(139,115,85,0.2); border-radius: 12px; font-size: 1rem; transition: all 0.3s ease; background: rgba(255,255,255,0.9);">
                                @error('so_dien_thoai')
                                    <div style="color: #dc3545; font-size: 0.875rem; margin-top: 5px;">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="ngay_sinh" style="display: block; margin-bottom: 8px; color: var(--text-dark); font-weight: 500;">Date of Birth</label>
                                <input type="date" 
                                       id="ngay_sinh"
                                       class="form-control luxury-input @error('ngay_sinh') is-invalid @enderror" 
                                       name="ngay_sinh" 
                                       value="{{ old('ngay_sinh') }}"
                                       style="width: 100%; padding: 15px 20px; border: 2px solid rgba(139,115,85,0.2); border-radius: 12px; font-size: 1rem; transition: all 0.3s ease; background: rgba(255,255,255,0.9);">
                                @error('ngay_sinh')
                                    <div style="color: #dc3545; font-size: 0.875rem; margin-top: 5px;">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label style="display: block; margin-bottom: 8px; color: var(--text-dark); font-weight: 500;">Gender</label>
                                <div class="luxury-gender-group">
                                    <div class="gender-option">
                                        <input class="gender-radio" type="radio" name="gioi_tinh" id="nam" value="Nam" {{ old('gioi_tinh') == 'Nam' ? 'checked' : '' }} required>
                                        <label class="gender-label" for="nam">Male</label>
                                    </div>
                                    <div class="gender-option">
                                        <input class="gender-radio" type="radio" name="gioi_tinh" id="nu" value="Nữ" {{ old('gioi_tinh') == 'Nữ' ? 'checked' : '' }} required>
                                        <label class="gender-label" for="nu">Female</label>
                                    </div>
                                </div>
                                @error('gioi_tinh')
                                    <div style="color: #dc3545; font-size: 0.875rem; margin-top: 5px;">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Row 3: Address (Full Width) -->
                        <div class="row mb-4">
                            <div class="col-12 mb-3">
                                <label for="dia_chi" style="display: block; margin-bottom: 8px; color: var(--text-dark); font-weight: 500;">Address</label>
                                <input type="text" 
                                       id="dia_chi"
                                       class="form-control luxury-input @error('dia_chi') is-invalid @enderror" 
                                       name="dia_chi" 
                                       value="{{ old('dia_chi') }}"
                                       placeholder="Enter your full address"
                                       required
                                       style="width: 100%; padding: 15px 20px; border: 2px solid rgba(139,115,85,0.2); border-radius: 12px; font-size: 1rem; transition: all 0.3s ease; background: rgba(255,255,255,0.9);">
                                @error('dia_chi')
                                    <div style="color: #dc3545; font-size: 0.875rem; margin-top: 5px;">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Row 4: Password & Confirm Password -->
                        <div class="row mb-4">
                            <div class="col-md-6 mb-3">
                                <label for="password" style="display: block; margin-bottom: 8px; color: var(--text-dark); font-weight: 500;">Password</label>
                                <input type="password" 
                                       id="password"
                                       class="form-control luxury-input @error('password') is-invalid @enderror" 
                                       name="password" 
                                       placeholder="Create a strong password"
                                       required
                                       style="width: 100%; padding: 15px 20px; border: 2px solid rgba(139,115,85,0.2); border-radius: 12px; font-size: 1rem; transition: all 0.3s ease; background: rgba(255,255,255,0.9);">
                                @error('password')
                                    <div style="color: #dc3545; font-size: 0.875rem; margin-top: 5px;">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="password_confirmation" style="display: block; margin-bottom: 8px; color: var(--text-dark); font-weight: 500;">Confirm Password</label>
                                <input type="password" 
                                       id="password_confirmation"
                                       class="form-control luxury-input" 
                                       name="password_confirmation" 
                                       placeholder="Confirm your password"
                                       required
                                       style="width: 100%; padding: 15px 20px; border: 2px solid rgba(139,115,85,0.2); border-radius: 12px; font-size: 1rem; transition: all 0.3s ease; background: rgba(255,255,255,0.9);">
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="row">
                            <div class="col-12 text-center">
                                <button type="submit" style="
                                    width: 100%;
                                    max-width: 400px;
                                    padding: 18px;
                                    background: linear-gradient(135deg, var(--primary-color), #6D5B3D);
                                    color: white;
                                    border: none;
                                    border-radius: 12px;
                                    font-size: 1.1rem;
                                    font-weight: 600;
                                    cursor: pointer;
                                    transition: all 0.3s ease;
                                    margin-top: 20px;
                                ">
                                    Create Account
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Login Link -->
                    <div class="text-center mt-4">
                        <p style="color: var(--text-muted); margin: 0; font-size: 0.95rem;">
                            Already have an account? 
                            <a href="{{ route('login') }}" style="color: var(--primary-color); text-decoration: none; font-weight: 500;">
                                Sign In
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.luxury-input:focus, .form-control:focus {
    border-color: var(--primary-color) !important;
    box-shadow: 0 0 0 3px rgba(139,115,85,0.1) !important;
    outline: none !important;
}

.input-group-text {
    background: var(--beige-light) !important;
    border-color: rgba(139,115,85,0.2) !important;
}

/* Luxury Gender Selection */
.luxury-gender-group {
    display: flex;
    gap: 15px;
    align-items: center;
    height: 49px;
}

.gender-option {
    position: relative;
}

.gender-radio {
    display: none;
}

.gender-label {
    display: inline-block;
    padding: 10px 20px;
    background: rgba(255,255,255,0.9);
    border: 2px solid rgba(139,115,85,0.2);
    border-radius: 25px;
    color: var(--text-dark);
    font-weight: 500;
    cursor: pointer;
    transition: all 0.3s ease;
    backdrop-filter: blur(5px);
    min-width: 80px;
    text-align: center;
}

.gender-radio:checked + .gender-label {
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    color: white;
    border-color: var(--primary-color);
    box-shadow: 0 5px 15px rgba(139,115,85,0.3);
}

.gender-label:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(139,115,85,0.2);
    border-color: var(--primary-color);
}

/* Enhanced Input Focus */
.luxury-input:focus, .form-control:focus {
    border-color: var(--primary-color) !important;
    box-shadow: 0 0 0 3px rgba(139,115,85,0.1) !important;
    outline: none !important;
    background: rgba(255,255,255,1) !important;
}

/* Glass Reflection Effect */
.glass-reflection {
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: linear-gradient(
        45deg,
        transparent 30%,
        rgba(255,255,255,0.1) 50%,
        transparent 70%
    );
    animation: shimmer 3s infinite;
    pointer-events: none;
}

@keyframes shimmer {
    0% {
        transform: translateX(-100%) translateY(-100%) rotate(45deg);
    }
    100% {
        transform: translateX(100%) translateY(100%) rotate(45deg);
    }
}

/* Luxury Gender Selection */
.luxury-gender-group {
    display: flex;
    gap: 15px;
    align-items: center;
    height: 49px;
}

.gender-option {
    position: relative;
}

.gender-radio {
    display: none;
}

.gender-label {
    display: inline-block;
    padding: 10px 20px;
    background: rgba(255,255,255,0.8);
    border: 2px solid rgba(139,115,85,0.2);
    border-radius: 25px;
    color: var(--text-dark);
    font-weight: 500;
    cursor: pointer;
    transition: all 0.3s ease;
    backdrop-filter: blur(5px);
    position: relative;
    overflow: hidden;
}

.gender-label::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(
        90deg,
        transparent,
        rgba(255,255,255,0.4),
        transparent
    );
    transition: left 0.5s ease;
}

.gender-label:hover::before {
    left: 100%;
}

.gender-radio:checked + .gender-label {
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    color: white;
    border-color: var(--primary-color);
    box-shadow: 
        0 5px 15px rgba(139,115,85,0.3),
        inset 0 1px 0 rgba(255,255,255,0.2);
}

.gender-label:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(139,115,85,0.2);
    border-color: var(--primary-color);
}

/* Enhanced Input Focus */
.luxury-input:focus, .form-control:focus {
    border-color: var(--primary-color) !important;
    box-shadow: 
        0 0 0 3px rgba(139,115,85,0.1),
        0 0 20px rgba(139,115,85,0.2) !important;
    outline: none !important;
    background: rgba(255,255,255,1) !important;
}

.back-home-btn {
    position: absolute;
    top: 30px;
    left: 30px;
    z-index: 10;
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 12px 20px;
    background: rgba(255,255,255,0.9);
    color: var(--primary-color);
    text-decoration: none;
    border-radius: 25px;
    font-weight: 500;
    font-size: 0.9rem;
    transition: all 0.3s ease;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255,255,255,0.2);
}

.back-home-btn:hover {
    background: var(--primary-color);
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(139,115,85,0.3);
}

.back-home-btn i {
    font-size: 0.8rem;
}

@media (max-width: 768px) {
    .luxury-register-card {
        padding: 40px 30px !important;
        margin: 20px;
    }
    
    .row > div {
        margin-bottom: 15px;
    }
    
    .back-home-btn {
        top: 20px;
        left: 20px;
        padding: 10px 16px;
        font-size: 0.85rem;
    }
}
</style>
@endsection
