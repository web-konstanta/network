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
                    <button>
                        <a href="#" class="user__edit">Follow</a>
                    </button>
                </li>
            </ul>
            <ul class="user__info">
                <li>{{ $user->region }}</li>
                <li>{{ $user->hobby->name }}</li>
                <li>
                    <a href="{{ App\Models\User::getUserLink($user->link, $user->id) }}" class="user__link">
                        {{ App\Models\User::getUserLink($user->link, $user->id) }}
                    </a>
                </li>
            </ul>
        </header>
    </nav>
    <hr>
    <h1 class="posts__title">Post</h1>
    <main class="posts">
        @foreach($posts as $post)
            <a href="#">
                <section class="posts__section">
                    <img src="{{ url('storage/' . $post->image) }}" width="250" height="300">
                </section>
            </a>
        @endforeach
    </main>
</div>
</body>
</html>
