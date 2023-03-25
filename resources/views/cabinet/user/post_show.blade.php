@extends('layouts.app')

@section('title', 'Post view')

@section('content')
    <main class="main__section">
        <div style="display: flex; flex-direction: column">
            <img src="{{ url('storage/' . $post->image) }}" class="main__serction-image" width="500">
            <p>
                <span id="countLikes">{{ $post->likes->count() }}</span> likes
            </p>
            <div style="display: flex">
                <img id="like" data-id="{{ $post->id }}" style="width: 24px; {{ $post->isLikedBy($post->id, $currentUser) ? 'visibility: collapse' : '' }}" src="{{ asset('img/heart.png') }}">
                <img id="unlike" data-id="{{ $post->id }}" style="width: 24px; {{ $post->isLikedBy($post->id, $currentUser) ? '' : 'visibility: collapse' }}" src="{{ asset('img/heart(1).png') }}">
            </div>
        </div>
        <div>
            <div class="main__section-block">
                <img src="{{ url('storage/' . $post->user->avatar) }}" class="main__section-avatar">
                <p class="main__section-nick">{{ $post->user->name }}</p>
                <button>
                    <a href="{{ route('posts.edit', $post->id) }}">Edit</a>
                </button>
                <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button>Delete</button>
                </form>
            </div>
            <hr>
            <div class="main__section-block">
                <img src="{{ url('storage/' . $post->user->avatar) }}" class="main__section-avatar">
                <p class="main__section-text">{{ $post->text }}</p>
            </div>
            <ul class="main__serction-tags">
                @foreach ($post->tags as $tag)
                    <li>#{{ $tag->name }}</li>
                @endforeach
            </ule=>
        </div>
    </main>
@endsection
