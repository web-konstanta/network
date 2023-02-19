@extends('layouts.app')

@section('title', 'Add new post')

@section('content')
    <form action="{{ route('posts.store') }}" method="post" class="form" enctype="multipart/form-data">
        @csrf
        <div class="form__section">
            <div class="form__block">
                <h4 class="form__label">Post description</h4>
                <textarea class="form__input" name="text">{{ old('text') }}</textarea>
            </div>
            <div class="form__block">
                <h4 class="form__label">Change the avatar</h4>
                <input class="form__input" name="image" type="file">
            </div>
            <div class="form__block">
                <button class="form__button" type="submit">Add post</button>
            </div>
        </div>
    </form>
@endsection
