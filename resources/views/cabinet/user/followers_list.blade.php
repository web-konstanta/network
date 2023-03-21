@extends('layouts.app')

@section('title', 'Registration')

@section('content')
    @include('includes.sidebar')
    <main class="search">
        <form action="{{ route('cabinet.user.search') }}" method="get" class="search__form">
        </form>
        @error('search')
        <p style="color: #f00f00">{{ $message }}</p>
        @enderror
        <table class="search__result">
            @foreach($user->users as $subscriber)
                <tr>
                    <td>
                        <a href="{{ route('users.show', $subscriber->id) }}">
                            <img src="{{ url('storage/' . $subscriber->avatar) }}" width="65" height="65" style="border-radius: 50%">
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('users.show', $subscriber->id) }}" class="search__nick">{{ $subscriber->name }}</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </main>
@endsection
