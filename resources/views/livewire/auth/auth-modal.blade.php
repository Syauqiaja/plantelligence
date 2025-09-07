<div class="modal-content border-0 shadow-lg rounded" style="overflow: hidden;">
    <x-modal.modal-header>
        <div class="w-100 text-center">
            <div class="mb-3">
                <i class="fas fa-user-circle text-white" style="font-size: 3rem; opacity: 0.9;"></i>
            </div>
            <h4 class="modal-title text-white fw-bold mb-0" id="authModalTitle">
                {{ $isLogin ? 'Welcome Back' : 'Create Your Account' }}
            </h4>
            <p class="text-white-50 mb-0 mt-1" id="authModalSubtitle">
                {{ $isLogin ? 'Sign in to your account' : 'Register to get started' }}
            </p>
        </div>
    </x-modal.modal-header>
    <!-- Body -->
    <div class="modal-body p-4" style="background: #f8f9fa;">
        <!-- Login Form -->
        @if($isLogin)
        <form wire:submit="submit">
            <div class="mb-3">
                <label class="form-label fw-semibold text-dark">
                    <i class="fas fa-envelope text-primary me-2"></i>Email Address
                </label>
                <input type="email" wire:model="email" class="form-control form-control-lg border-0 shadow-sm"
                    placeholder="Enter your email" required>
                @error('email')
                {{ $message }}
                @enderror
            </div>
            <div class="mb-4">
                <label class="form-label fw-semibold text-dark">
                    <i class="fas fa-lock text-primary me-2"></i>Password
                </label>
                <input type="password" wire:model="password" class="form-control form-control-lg border-0 shadow-sm"
                    placeholder="Enter your password" required>

                @error('password')
                {{ $message }}
                @enderror
            </div>
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="rememberMe">
                    <label class="form-check-label text-secondary" for="rememberMe">
                        Remember me
                    </label>
                </div>
                <a href="{{ route('password.request') }}" class="text-decoration-none text-primary fw-semibold">Forgot Password?</a>
            </div>
            <button type="submit" class="btn btn-lg w-100 text-white fw-bold mb-3"
                style="background: linear-gradient(135deg, rgb(8, 171, 171) 0%, rgb(0, 136, 255) 100%); border: none; border-radius: 12px;">
                <i class="fas fa-sign-in-alt me-2"></i>Sign In
            </button>
        </form>
        @else
        <!-- Register Form -->
        <form wire:submit="submit">
            <div class="mb-3">
                <label class="form-label fw-semibold text-dark">
                    <i class="fas fa-user text-primary me-2"></i>Name
                </label>
                <input type="text" wire:model="name" class="form-control form-control-lg border-0 shadow-sm"
                    placeholder="Full Name" required>

                @error('name')
                {{ $message }}
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold text-dark">
                    <i class="fas fa-envelope text-primary me-2"></i>Email Address
                </label>
                <input type="email" wire:model="email" class="form-control form-control-lg border-0 shadow-sm"
                    placeholder="Enter your email" required>

                @error('email')
                {{ $message }}
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold text-dark">
                    <i class="fas fa-lock text-primary me-2"></i>Password
                </label>
                <input type="password" wire:model="password" class="form-control form-control-lg border-0 shadow-sm"
                    placeholder="Create password" required>

                @error('password')
                {{ $message }}
                @enderror
            </div>
            <div class="mb-4">
                <label class="form-label fw-semibold text-dark">
                    <i class="fas fa-lock text-primary me-2"></i>Confirm Password
                </label>
                <input type="password" wire:model="password_confirmation"
                    class="form-control form-control-lg border-0 shadow-sm" placeholder="Confirm password" required>

                @error('password_confirmation')
                {{ $message }}
                @enderror
            </div>
            <div class="form-check mb-4">
                <input class="form-check-input" type="checkbox" id="agreeTerms" required>
                <label class="form-check-label text-secondary" for="agreeTerms">
                    I agree to the <a href="#" class="text-primary text-decoration-none">Terms of Service</a>
                    and
                    <a href="#" class="text-primary text-decoration-none">Privacy Policy</a>
                </label>
            </div>
            <button type="submit" class="btn btn-lg w-100 text-white fw-bold mb-3"
                style="background: linear-gradient(135deg, rgb(8, 171, 171) 0%, rgb(0, 136, 255) 100%); border: none; border-radius: 12px;">
                <i class="fas fa-user-plus me-2"></i>Create Account
            </button>
        </form>
        @endif

        <!-- Toggle -->
        <div class="text-center">
            <p class="text-secondary mb-0">
                {{ $isLogin ? "Don't have an account?" : "Already have an account?" }}
                <button type="button" class="btn btn-link p-0 text-primary fw-bold text-decoration-none ms-1"
                    wire:click="toggleMode">
                    {{ $isLogin ? 'Sign up' : 'Sign in' }}
                </button>
            </p>
        </div>
    </div>
</div>