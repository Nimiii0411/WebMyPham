@extends('layouts.auth')

@section('title', 'Sign In - Venus')

@section('content')
<section class="login-section" style="
    min-height: 100vh;
    background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('{{ asset('images/login.jpg') }}');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
">
    <!-- Overlay for better readability -->
    <div style="
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(255,255,255,0.05);
        backdrop-filter: blur(1px);
    "></div>
    
    <div class="container" style="position: relative; z-index: 2;">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 col-sm-8">
                <div class="luxury-login-card" style="
                    background: rgba(255,255,255,0.95);
                    backdrop-filter: blur(10px);
                    border: 1px solid rgba(255,255,255,0.2);
                    border-radius: 20px;
                    padding: 60px 50px;
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
                            font-size: 1.6rem;
                            color: var(--text-dark);
                            font-weight: 400;
                            margin-bottom: 15px;
                            letter-spacing: 1px;
                        ">Welcome Back</h2>
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
                        ">Sign in to your luxury account</p>
                    </div>

                    <!-- Success/Error Messages -->
                    @if(session('success'))
                        <div class="alert" style="
                            background: rgba(212, 237, 218, 0.9);
                            border: 1px solid rgba(25, 135, 84, 0.2);
                            border-radius: 12px;
                            padding: 20px;
                            margin-bottom: 30px;
                            text-align: left;
                        ">
                            <div style="color: #0a3622; font-weight: 500;">
                                <i class="fas fa-check-circle"></i> {{ session('success') }}
                            </div>
                        </div>
                    @endif

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
                                <i class="fas fa-exclamation-triangle"></i> Please check:
                            </div>
                            <ul style="margin: 0; padding-left: 20px; color: #721c24;">
                                @foreach($errors->all() as $error)
                                    <li style="margin-bottom: 5px;">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Login Form -->
                    <form action="{{ route('login') }}" method="POST" class="luxury-form">
                        @csrf
                        
                        <!-- Email Input -->
                        <div class="mb-4">
                            <input type="email" 
                                   class="luxury-input @error('email') is-invalid @enderror" 
                                   name="email" 
                                   value="{{ old('email') }}"
                                   placeholder="Email Address"
                                   required>
                        </div>

                        <!-- Password Input -->
                        <div class="mb-4">
                            <input type="password" 
                                   class="luxury-input @error('password') is-invalid @enderror" 
                                   name="password" 
                                   placeholder="Password"
                                   required>
                        </div>

                        <!-- Remember & Forgot -->
                        <div class="d-flex justify-content-between align-items-center mb-4" style="font-size: 0.9rem;">
                            <label class="luxury-checkbox-simple">
                                <input type="checkbox" name="remember">
                                <span style="color: var(--text-muted);">Remember me</span>
                            </label>
                            <a href="#" style="
                                color: var(--text-dark);
                                text-decoration: none;
                                border-bottom: 1px solid transparent;
                                transition: all 0.3s ease;
                            " onmouseover="this.style.borderBottomColor='var(--text-dark)'" 
                               onmouseout="this.style.borderBottomColor='transparent'">
                                Forgot password?
                            </a>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="luxury-submit-btn">
                            Sign In
                        </button>
                    </form>

                    <!-- Register Link -->
                    <div class="luxury-footer mt-4">
                        <p style="color: var(--text-muted); margin: 0; font-size: 0.95rem;">
                            Don't have an account? 
                            <a href="{{ route('register') }}" style="
                                color: var(--text-dark);
                                text-decoration: none;
                                font-weight: 500;
                                border-bottom: 1px solid var(--text-dark);
                                padding-bottom: 1px;
                            ">Create Account</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
/* Luxury Login Styles */
.luxury-input {
    width: 100%;
    padding: 15px 20px;
    border: 1px solid rgba(0,0,0,0.1);
    border-radius: 8px;
    background: rgba(255,255,255,0.9);
    font-size: 1rem;
    color: var(--text-dark);
    transition: all 0.3s ease;
    font-family: 'Inter', sans-serif;
}

.luxury-input:focus {
    outline: none;
    border-color: var(--primary-color);
    background: rgba(255,255,255,1);
    box-shadow: 0 0 0 3px rgba(139, 115, 85, 0.1);
}

.luxury-input::placeholder {
    color: rgba(0,0,0,0.5);
    font-style: italic;
}

.luxury-checkbox-simple {
    display: flex;
    align-items: center;
    cursor: pointer;
}

.luxury-checkbox-simple input[type="checkbox"] {
    margin-right: 8px;
    transform: scale(1.1);
}

.luxury-submit-btn {
    width: 100%;
    padding: 18px;
    background: var(--text-dark);
    color: white;
    border: none;
    border-radius: 8px;
    font-size: 1.1rem;
    font-weight: 500;
    letter-spacing: 1px;
    text-transform: uppercase;
    cursor: pointer;
    transition: all 0.3s ease;
    margin-top: 10px;
}

.luxury-submit-btn:hover {
    background: #6d5a47;
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.2);
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .luxury-login-card {
        padding: 40px 30px !important;
        margin: 20px;
    }
    
    .luxury-header h1 {
        font-size: 2.2rem !important;
    }
    
    .luxury-header h2 {
        font-size: 1.3rem !important;
    }
}
</style>
@endsection