<x-guest-layout>
    <div class="container">
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <div class="container-login">
            <div class="content-login">
                <div class="star"></div>
                <h1 class="login-title">Let's learn together</h1>
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email Address -->
                    <div class="form-group">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')"
                            required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="form-group">
                        <x-input-label for="password" :value="__('Password')" />
                        <x-text-input id="password" class="form-control" type="password" name="password" required
                            autocomplete="current-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Remember Me -->
                    <div class="form-group form-check">
                        <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                        <label for="remember_me" class="form-check-label">{{ __('Remember me') }}</label>
                    </div>

                    <div class="actions-form">
                        @if (Route::has('password.request'))
                            <a class="forgot-password" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif
                        <br />
                        <x-primary-button class="b-green">
                            {{ __('Log in') }}
                        </x-primary-button>
                    </div>
                </form>
                <a href="{{route('home')}}" class="home">Go Back To Home</a>
                <a class="register" href="{{ route('register') }}">You don't have account --> Sign Up</a>
            </div>
        </div>
    </div>
</x-guest-layout>
<style>
    .login-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        /* background-color: #f8f9fa; */
    }

    .login-content {
        /* background-color: #fff; */
        padding: 40px;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        max-width: 400px;
        width: 100%;
    }

    .login-title {
        text-align: center;
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-control {
        display: block;
        width: 100%;
        padding: 10px;
        font-size: 16px;
        border: 1px solid #ced4da;
        border-radius: 4px;
    }

    .form-check {
        display: flex;
        align-items: center;
        margin-bottom: 20px;
    }

    .form-check-input {
        margin-right: 8px;
    }

    .form-check-label {
        font-size: 14px;
        color: #6c757d;
    }

    .form-actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .forgot-password {
        font-size: 14px;
        color: #6c757d;
        text-decoration: none;
    }

    .forgot-password:hover {
        color: #495057;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        color: #fff;
        padding: 10px 20px;
        font-size: 16px;
        border-radius: 4px;
        cursor: pointer;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004a9c;
    }
</style>
