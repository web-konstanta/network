@extends('admin.layouts.admin')

@section('title', 'Post management')

@section('content')
    <div class="content-wrapper" style="min-height: 217.4px;">
        <div class="p-5 mb-4 bg-light rounded-3">
            <div class="container-fluid py-5">
                <h1 class="display-5 fw-bold">Post id: {{ $post->id }}</h1>
                <img src="{{ url('storage/' . $post->image) }}" style="display: block">
                <p class="col-md-8 fs-4 mt-3">Post likes: {{ $post->likes->count() }}</p>
                <p class="col-md-8 fs-4">Post text: {{ $post->text }}</p>
                <p class="col-md-8 fs-4 mt-3">Post tags:</p>
                <ul style="list-style: none">
                    @foreach($post->tags as $tag)
                        <li>#{{ $tag->name }}</li>
                    @endforeach
                </ul>
                <p class="col-md-8 fs-4 mt-3">Post comments:</p>
                <ul style="list-style: none">
                    @foreach($post->comments as $comment)
                        <li>{{ $comment->text }} (from: <img style="width: 50px; border-radius: 50%" src="{{ url('storage/' . $comment->user->avatar) }}"> {{ $comment->user->name }})</li>
                    @endforeach
                </ul>
                <a class="btn btn-primary btn-lg mt-3" href="{{ route('admin.post.index') }}">Back to posts</a>
            </div>
        </div>
    </div>
@endsection
