@extends('layouts.app')

@section('title', 'Add new post')

@section('content')
    @include('includes.sidebar')
    <form action="{{ route('posts.store') }}" method="post" class="form" enctype="multipart/form-data">
        @csrf
        <div class="form__section">
            <div class="form__block">
                <h4 class="form__label">Post description</h4>
                <textarea class="form__input" name="text">{{ old('text') }}</textarea>
                @error('text')
                    <p style="color: #f00f00">{{ $message }}</p>
                @enderror
            </div>
            <div class="form__block">
                <h4 class="form__label">Change the avatar</h4>
                <input class="form__input" name="image" type="file">
                @error('image')
                    <p style="color: #f00f00">{{ $message }}</p>
                @enderror
            </div>
            <div class="form__block">
                <h4 class="form__label">Select tags</h4>
                <select multiple class="form__select" name="tags_id[]">
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form__block">
                <button class="form__button" type="submit">Add post</button>
            </div>
        </div>
    </form>
@endsection
