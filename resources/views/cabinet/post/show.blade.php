@extends('layouts.app')

@section('title', 'Post view')

@section('content')
    <main class="main__section">
        <div style="display: flex; flex-direction: column">
            <img src="{{ url('storage/' . $post->image) }}" class="main__serction-image" width="500">
            <p style="margin-bottom: -20px">
                <span id="countLikes">{{ $post->likes->count() }}</span> likes
            </p>
        </div>
        <div>
            <div class="main__section-block">
                <img src="{{ url('storage/' . Auth::user()->avatar) }}" class="main__section-avatar">
                <p class="main__section-nick">{{ Auth::user()->name }}</p>
                <button>
                    <a style="text-decoration: none; color: #000000" href="{{ route('posts.edit', $post->id) }}">Edit</a>
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
            </ul>
            <div>
                @foreach ($post->comments as $comment)
                    <div style="display: flex; justify-content: space-between">
                        <div>
                            <div class="main__section-block">
                                <img src="{{ url('storage/' . $comment->user->avatar) }}" class="main__section-avatar">
                                <p>{{ $comment->user->name }}</p>
                            </div>
                            <p style="margin-top: -5px">{{ $comment->text }}</p>
                        </div>
                        @if (\Illuminate\Support\Facades\Auth::user()->id === $comment->user_id)
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
        </div>
    </main>
@endsection
