@extends('layouts.app')

@section('title', 'Login page')

@section('content')
    <form action="{{ route('login') }}" method="post" class="form">
        @csrf
        <div class="form__section">
            <h1 class="form__logo">Social network</h1>
            <div class="form__block">
                <input class="form__input-login" type="email" name="email" placeholder="User name or email">
                @error('email')
                <p style="color: #f00f00">{{ $message }}</p>
                @enderror
            </div>
            <div class="form__block">
                <input class="form__input-login" type="password" name="password" placeholder="Password">
                @error('password')
                <p style="color: #f00f00">{{ $message }}</p>
                @enderror
            </div>
            <div class="form__block">
                <button class="form__button" type="submit">Login</button>
            </div>
            <p class="form__or">OR</p>
            <div class="form__block-footer">
                <img class="form__icon" src="{{ asset('img/facebook.svg') }}">
                <a href="#" class="form__link">Continue with facebook</a>
            </div>
        </div>
        <a href="{{ route('register') }}" class="form__register"><span class="form__span">You don`t have an account?</span> Register</a>
    </form>
@endsection
