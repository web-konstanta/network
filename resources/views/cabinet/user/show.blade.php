@extends('layouts.app')

@section('title', 'Post view')

@section('content')
    <main class="main__section">
        <img src="{{ url('storage/' . $post->image) }}" class="main__serction-image" width="500">
        <div>
            <div class="main__section-block">
                <img src="{{ url('storage/' . Auth::user()->avatar) }}" class="main__section-avatar">
                <p class="main__section-nick">{{ Auth::user()->name }}</p>
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
                <img src="{{ url('storage/' . Auth::user()->avatar) }}" class="main__section-avatar">
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
