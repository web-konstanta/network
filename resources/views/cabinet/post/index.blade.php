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
                    <div class="modal">text</div>
                    <div style="display: flex; align-items: center; justify-content: space-between">
                        <div class="user__options">
                            <div class="likes" data-id="{{ $post->id }}" style="display: flex; margin-right: 20px">
                                <img id="posts-like" data-id="{{ $post->id }}" style="width: 24px; {{ $post->isLikedBy($post->id, $currentUser) ? 'display: none' : '' }}" src="{{ asset('img/heart.png') }}">
                                <img id="posts-unlike" data-id="{{ $post->id }}" style="width: 24px; {{ $post->isLikedBy($post->id, $currentUser) ? '' : 'display: none' }}" src="{{ asset('img/heart(1).png') }}">
                            </div>
                            <a style="margin-right: 20px" href="{{ route('users.post', $post->id) }}">
                                <img style="height: 24px" src="{{ asset('img/bubble-chat.png') }}">
                            </a>
                            <div class="save-buttons" data-id="{{ $post->id }}" style="display: flex">
                                <img id="save" style="{{ !is_null($post->isSavedBy($post->id, $currentUser)) ? 'display: none' : '' }}" data-id="{{ $post->id }}" style="height: 24px" src="{{ asset('img/save-instagram.png') }}">
                                <img id="unsave" style="{{ $post->isSavedBy($post->id, $currentUser) ? '' : 'display: none' }}" data-id="{{ $post->id }}" style="height: 24px" src="{{ asset('img/bookmark.png') }}">
                            </div>
                        </div>
                        <div class="complains">
                            <button id="send" data-id="{{ $post->id }}" style="{{ $post->isComplainedBy($post->id, $currentUser) ? 'display: none' : '' }}">Send a complain</button>
                            <button style="{{ $post->isComplainedBy($post->id, $currentUser) ? '' : 'display: none' }}">Complain sent</button>
                        </div>
                    </div>
                    <p>{{ $post->text }}</p>
                    @if ($post->comments->count() !== 0)
                        <a href="{{ route('users.post', $post->id) }}" style="opacity: 0.5; text-decoration: none; color: #000000">View all {{ $post->comments->count() }} comments</p>
                    @endif
                </section>
            </div>
        @endforeach
    </main>
@endsection
