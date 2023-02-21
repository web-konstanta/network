@extends('layouts.app')

@section('title', 'Edit post')

@section('content')
    <form action="{{ route('posts.update', $post->id) }}" method="post" class="form" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="form__section">
            <div class="form__block">
                <h4 class="form__label">Post description</h4>
                <textarea class="form__input" name="text">{{ $post->text }}</textarea>
            </div>
            <div class="form__block">
                <h4 class="form__label">Change the avatar</h4>
                <img style="display: block" src="{{ url('storage/' . $post->image) }}" width="120">
                <input class="form__input" name="image" type="file">
            </div>
            <div class="form__block">
                <h4 class="form__label">Select tags</h4>
                <select multiple class="form__select" name="tags_id[]">
                    @foreach ($tags as $tag)
                        <option
                            @foreach ($post->tags as $item)
                                {{ $item->id == $tag->id ? 'selected' : '' }}
                            @endforeach
                        value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form__block">
                <button class="form__button" type="submit">Add post</button>
            </div>
        </div>
    </form>
@endsection
