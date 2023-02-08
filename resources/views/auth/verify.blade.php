@extends('layouts.app')

@section('content')
    <div class="form__section">
        <div class="form__block">
            <form class="form" method="POST" action="{{ route('verification.resend') }}">
                @csrf
                @if (session('resent'))
                    <div style="color: #ffffff" role="alert">
                        {{ __('A fresh verification link has been sent to your email address.') }}
                    </div>
                @endif
                <h4 class="form__label">Verify your email account</h4>
                <button class="form__button" type="submit">Resend message</button>
            </form>
        </div>
    </div>
@endsection
