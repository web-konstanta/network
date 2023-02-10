@extends('layouts.app')

@section('title', 'Registration')

@section('content')
    <form action="{{ route('register') }}" method="post" class="form" enctype="multipart/form-data">
        @csrf
        <div class="form__section">
            <div class="form__block">
                <h4 class="form__label">Create login</h4>
                <input class="form__input" name="name" type="text" placeholder="User name">
                @error('name')
                <p style="color: #f00f00">{{ $message }}</p>
                @enderror
            </div>
            <div class="form__block">
                <h4 class="form__label">Enter your email</h4>
                <input class="form__input" name="email" type="email" placeholder="Email">
                @error('email')
                <p style="color: #f00f00">{{ $message }}</p>
                @enderror
            </div>
            <div class="form__block">
                <h4 class="form__label">Enter your region(City, Country)</h4>
                <input class="form__input" name="region" type="text" placeholder="Region">
                @error('region')
                <p style="color: #f00f00">{{ $message }}</p>
                @enderror
            </div>
            <div class="form__block">
                <h4 class="form__label">Select the avatar</h4>
                <input class="form__input" name="avatar" type="file">
                @error('avatar')
                <p style="color: #f00f00">{{ $message }}</p>
                @enderror
            </div>
            <div class="form__block">
                <h4 class="form__label">Create password</h4>
                <input class="form__input" name="password" type="password" placeholder="Password">
                @error('password')
                <p style="color: #f00f00">{{ $message }}</p>
                @enderror
            </div>
            <div class="form__block">
                <h4 class="form__label">Confirm your password</h4>
                <input class="form__input" name="password_confirmation" type="password" placeholder="Confirm password">
                @error('password__confirmation')
                <p style="color: #f00f00">{{ $message }}</p>
                @enderror
            </div>
            <div class="form__block">
                <button class="form__button" type="submit">Register</button>
            </div>
        </div>
    </form>
@endsection
