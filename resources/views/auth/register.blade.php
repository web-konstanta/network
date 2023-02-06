@extends('layouts.app')

@section('title', 'Registration')

@section('content')
    <form action="#" class="form">
        <div class="form__section">
            <div class="form__block">
                <h4 class="form__label">Create user name</h4>
                <input class="form__input" type="text" placeholder="User name">
            </div>
            <div class="form__block">
                <h4 class="form__label">Enter your email</h4>
                <input class="form__input" type="text" placeholder="Email">
            </div>
            <div class="form__block">
                <h4 class="form__label">Create password</h4>
                <input class="form__input" type="text" placeholder="Password">
            </div>
            <div class="form__block">
                <h4 class="form__label">Confirm your password</h4>
                <input class="form__input" type="text" placeholder="Confirm password">
            </div>
            <div class="form__block">
                <button class="form__button" type="submit">Register</button>
            </div>
        </div>
    </form>
@endsection
