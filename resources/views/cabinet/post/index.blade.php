@extends('layouts.app')

@section('title', 'Add new post')

@section('content')
    <main class="posts">
        @include('includes.sidebar')
        @foreach($posts as $post)
            <div class="posts_list">
                <section class="post__item">
                    <div class="post__item-header">
                        <a href="{{ route('users.show', $post->user->id) }}"><img class="user__avatar" src="{{ url('storage/' . $post->user->avatar) }}"></a>
                        <a class="user__link" href="{{ route('users.show', $post->user->id) }}">{{ $post->user->name }}</a>
                    </div>
                    <hr class="user__item-line">
                    <img class="user__image" src="{{ url('storage/' . $post->image) }}">
                    <p>
                        <span id="countLikes">{{ $post->likes->count() }}</span> likes
                    </p>
                    <div class="user__options">
                        <div class="likes" data-id="{{ $post->id }}" style="display: flex">
                            <img id="posts-like" data-id="{{ $post->id }}" style="width: 24px; {{ $post->isLikedBy($post->id, $currentUser) ? 'visibility: collapse' : '' }}" src="{{ asset('img/heart.png') }}">
                            <img id="posts-unlike" data-id="{{ $post->id }}" style="width: 24px; {{ $post->isLikedBy($post->id, $currentUser) ? '' : 'visibility: collapse' }}" src="{{ asset('img/heart(1).png') }}">
                        </div>
                        <a href="{{ route('users.post', $post->id) }}">
                            <img src="{{ asset('img/bubble-chat.png') }}">
                        </a>
                    </div>
                    <p>{{ $post->text }}</p>
                    @if ($post->comments->count() !== 0)
                        <p>View all {{ $post->comments->count() }} comments</p>
                    @endif
                </section>
            </div>
        @endforeach
    </main>
@endsection
