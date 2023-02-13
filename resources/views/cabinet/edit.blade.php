@extends('layouts.app')

@section('title', 'Registration')

@section('content')
    <form action="{{ route('cabinet.update', $user->id) }}" method="post" class="form" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="form__section">
            <div class="form__block">
                <h4 class="form__label">Edit login</h4>
                <input class="form__input" name="name" type="text" value="{{ $user->name }}" placeholder="User login">
                @error('name')
                    <p style="color: #f00f00">{{ $message }}</p>
                @enderror
            </div>
            <div class="form__block">
                <h4 class="form__label">Change region</h4>
                <input class="form__input" name="region" type="text" value="{{ $user->region }}" placeholder="The region">
                @error('region')
                    <p style="color: #f00f00">{{ $message }}</p>
                @enderror
            </div>
            <div class="form__block">
                <h4 class="form__label">Add link in bio</h4>
                <input class="form__input" name="link" type="text" value="{{ $user->link }}" placeholder="Bio link">
                @error('link')
                    <p style="color: #f00f00">{{ $message }}</p>
                @enderror
            </div>
            <div class="form__block">
                <h4 class="form__label">Change the avatar</h4>
                <img src="{{ url('storage/' . $user->avatar) }}" width="120" style="display: block">
                <input class="form__input" name="avatar" type="file">
            </div>
            <div class="form__block">
                <h4 class="form__label">Choose your hobby</h4>
                <select class="form__select" name="hobby_id">
                    <option value="1">-</option>
                    @foreach ($hobbies as $hobby)
                        @if($hobby->id === 1)
                            @php
                                continue
                            @endphp
                        @endif
                        <option
                        {{ $user->hobby_id === $hobby->id ? 'selected' : '' }}
                        value="{{ $hobby->id }}">{{ $hobby->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form__block">
                <button class="form__button" type="submit">Save</button>
            </div>
        </div>
    </form>
@endsection
