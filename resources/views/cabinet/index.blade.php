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
        <nav class="user__list">
            <div class="user__settings-avatar">
                <img class="user__avatar" src="{{ url('storage/' . Auth::user()->avatar) }}" alt="Avatar icon">
            </div>
            <header class="user__section">
                <ul class="user__settings">
                    <li>
                        <button>
                            <a href="{{ route('posts.create') }}" class="user__edit">Add post</a>
                        </button>
                    </li>
                    <li>
                        <button>
                            <a href="{{ route('cabinet.edit', Auth::user()->id) }}" class="user__edit">Edit profile</a>
                        </button>
                    </li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                            <button>Logout</button>
                        </form>
                    </li>
                </ul>
                <ul class="user__info">
                    <li class="user__info-login">{{ Auth::user()->name }}</li>
                    <li>{{ Auth::user()->region }}</li>
                    <li>{{ Auth::user()->hobby->name }}</li>
                    <li>
                        <a href="{{ App\Models\User::getLink(Auth::user()->link) }}" class="user__link">
                            {{ App\Models\User::getLink(Auth::user()->link) }}
                        </a>
                    </li>
                </ul>
            </header>
        </nav>
        <hr>
        <h1 class="posts__title">Post</h1>
        <main class="posts">
            @foreach ($posts as $post)
                <section class="posts__section">
                    <img src="{{ url('storage/' . $post->image) }}" width="250" height="300">
                </section>
            @endforeach
        </main>
    </div>
</body>
</html>
