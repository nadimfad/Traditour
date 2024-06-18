@extends('tampilan.index')
@section('konten')
    <div class="login">
        <img src="{{ asset('image/alam.jpg') }}" alt="login image" class="login__img">

        <form method="POST" action="{{ route('register') }}" class="login__form" style="margin-top: 80px;">
            @csrf
            <h1 class="login__title">Register</h1>

            <div class="login__content">
                <div class="login__box">
                    <i class="ri-user-3-line login__icon"></i>

                    <div class="login__box-input">
                        <input type="text" required class="login__input" id="register-username" name="username"
                            placeholder=" ">
                        <label for="register-username" class="login__label">Username</label>
                    </div>
                </div>
                <div class="login__box">
                    <i class="ri-mail-line login__icon"></i>

                    <div class="login__box-input">
                        <input type="email" required class="login__input" id="register-email" name="email"
                            placeholder=" ">
                        <label for="register-email" class="login__label">Email</label>
                    </div>
                </div>

                <div class="login__box">
                    <i class="ri-lock-2-line login__icon"></i>

                    <div class="login__box-input">
                        <input type="password" required class="login__input" id="register-pass" name="password"
                            placeholder=" ">
                        <label for="register-pass" class="login__label">Password</label>
                        <i class="ri-eye-off-line login__eye" id="register-eye"></i>
                    </div>
                </div>

                <div class="login__box">
                    <i class="ri-lock-2-line login__icon"></i>

                    <div class="login__box-input">
                        <input type="password" required class="login__input" id="register-confirm-pass"
                            name="password_confirmation" placeholder=" ">
                        <label for="register-confirm-pass" class="login__label">Confirm Password</label>
                        <i class="ri-eye-off-line login__eye" id="register-confirm-eye"></i>
                    </div>
                </div>
            </div>

            <button type="submit" class="login__button">Register</button>

            <p class="login__register">
                Sudah Memiliki Akun? <a href="{{ route('login') }}">Login</a>
            </p>
        </form>
    </div>
@endsection
