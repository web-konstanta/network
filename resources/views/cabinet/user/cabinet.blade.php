<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/cabinet.css') }}">
    <title>Cabinet</title>
</head>
<body>
<div class="wrapper">
    @include('includes.sidebar')
    <nav class="user__list">
        <div class="user__settings-avatar">
            <img class="user__avatar" src="{{ url('storage/' . $user->avatar) }}" alt="Avatar icon">
        </div>
        <header class="user__section">
            <ul class="user__settings">
                <li>{{ $user->name }}</li>
                <li>
                    @if(is_null($customer))
                        <form action="{{ route('users.subscriber', $user->id) }}" method="post">
                            @csrf
                            <button class="user__buttons">Follow</button>
                        </form>
                    @else
                        <form action="{{ route('users.unfollow', $user->id) }}" method="post">
                            @csrf
                            <button class="user__buttons">Unfollow</button>
                        </form>
                    @endif
                </li>
            </ul>
            <ul class="user__settings">
                <li>{{ $posts->count() }} posts</li>
                <li>
                    <a class="user__follow" href="{{ route('users.subscriber-list', $user->id) }}">{{ $user->customers->count() }} followers</a>
                </li>
                <li>
                    <a class="user__follow" href="{{ route('users.followers-list', $user->id) }}">{{ $user->users->count() }} following</a>

                </li>
            </ul>
            <ul class="user__info">
                <li>{{ $user->region }}</li>
                <li>{{ $user->getHobbyName($user->hobby_id) }}</li>
                <li>
                    <a href="{{ $user->getUserLink($user->link, $user->id) }}" class="user__link">
                        {{ $user->getUserLink($user->link, $user->id) }}
                    </a>
                </li>
            </ul>
        </header>
    </nav>
    <hr>
    <h1 class="posts__title">Post</h1>
    <main class="posts">
        @foreach($posts as $post)
            <a href="{{ route('users.post', $post->id) }}">
                <section class="posts__section">
                    <img src="{{ url('storage/' . $post->image) }}" width="250" height="300">
                </section>
            </a>
        @endforeach
    </main>
</div>
</body>
</html>
