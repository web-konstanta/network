@extends('layouts.app')

@section('title', 'Post view')

@section('content')
    <main class="main__section">
        <div style="display: flex; flex-direction: column">
            <img src="{{ url('storage/' . $post->image) }}" class="main__serction-image" width="500">
            <p>
                <span id="countLikes">{{ $post->likes->count() }}</span> likes
            </p>
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
        </div>
        <div>
            <div class="main__section-block">
                <img src="{{ url('storage/' . $post->user->avatar) }}" class="main__section-avatar">
                <p class="main__section-nick">{{ $post->user->name }}</p>
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
            </ul>
            <div>
                @foreach ($comments as $comment)
                    <div style="display: flex; justify-content: space-between">
                        <div>
                            <div class="main__section-block">
                                <img src="{{ url('storage/' . $comment->user->avatar) }}" class="main__section-avatar">
                                <p>{{ $comment->user->name }}</p>
                            </div>
                            <p style="margin-top: -5px">{{ $comment->text }}</p>
                        </div>
                        @if ($currentUser->id === $comment->user_id)
                            <form action="{{ route('users.comments.delete', $comment->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="border: none; background: none">
                                    <img src="{{ asset('img/remove.png') }}" style="width: 24px; height: 24px; margin-top: 26px">
                                </button>
                            </form>
                        @endif
                    </div>
                @endforeach
            </div>
            <div class="comments-list">
            </div>
            <div class="modal">
                <p class="modal__close">X</p>
                <input class="modal__input"></textarea>
                <input data-id="{{ $post->id }}" type="submit" value="Add comment" class="modal__button">
            </div>
        </div>
    </main>
@endsection
