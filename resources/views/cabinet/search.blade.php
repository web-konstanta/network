@extends('layouts.app')

@section('title', 'Registration')

@section('content')
    @include('includes.sidebar')
    <main class="search">
        <form action="{{ route('cabinet.user.search') }}" method="get" class="search__form">
            <input name="search" type="text" class="search__input">
            <button type="submit" class="search__button">Search</button>
        </form>
        @error('search')
        <p style="color: #f00f00">{{ $message }}</p>
        @enderror
        <table class="search__result">
            @foreach($users as $user)
                <tr>
                    <td>
                        <a href="{{ route('users.show', $user->id) }}">
                            <img src="{{ url('storage/' . $user->avatar) }}" width="65" height="65" style="border-radius: 50%">
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('users.show', $user->id) }}" class="search__nick">{{ $user->name }}</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </main>
@endsection
