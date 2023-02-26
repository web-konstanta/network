@extends('layouts.app')

@section('title', 'Add new post')

@section('content')
    <main class="posts">
        @include('includes.sidebar')
        @foreach($posts as $post)
            <div class="posts_list">
                <section class="post__item">
                    <div class="post__item-header">
                        <img class="user__avatar" src="{{ url('storage/' . $post->user->avatar) }}">
                        <p>{{ $post->user->name }}</p>
                    </div>
                    <hr class="user__item-line">
                    <img class="user__image" src="{{ url('storage/' . $post->image) }}">
                    <p>{{ $post->text }}</p>
                </section>
            </div>
        @endforeach
    </main>
@endsection
