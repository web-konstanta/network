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
                <img class="user__avatar" src="{{ url('storage/' . Auth::user()->avatar) }}" alt="Avatar icon">
            </div>
            <header class="user__section">
                <ul class="user__settings">
                    <li>
                        <button class="user__buttons">
                            <a href="{{ route('cabinet.edit', Auth::user()->id) }}" class="user__edit">Edit profile</a>
                        </button>
                    </li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="user__buttons">Logout</button>
                        </form>
                    </li>
                    <li>
                        <button class="delete-account user__buttons">Delete account</button>
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
                    <li class="user__info-login">{{ Auth::user()->name }}</li>
                    <li>{{ Auth::user()->region }}</li>
                    <li>{{ $user->getHobbyName($user->hobby_id) }}</li>
                    <li>
                        <a href="{{ $user->getLink(Auth::user()->link) }}" class="user__link">
                            {{ $user->getLink(Auth::user()->link) }}
                        </a>
                    </li>
                </ul>
            </header>
        </nav>
        <div class="delete__alert">
            <div class="delete-alert" style="float: right; cursor: pointer">X</div>
            <p>Do you really want to delete an account?</p>
            <form action="{{ route('cabinet.user.delete', $user->id) }}" method="post">
                @method('DELETE')
                @csrf
                <button style="border-radius: 10px; padding: 5px 10px; border: none; background: grey; color: #ffffff">Delete account</button>
            </form>
        </div>
        <hr>
        <h1 class="posts__title">Posts</h1>
        <main class="posts">
            @foreach ($posts as $post)
                <a href="{{ route('posts.show', $post->id) }}">
                    <section class="posts__section">
                        <img src="{{ url('storage/' . $post->image) }}" width="250" height="300">
                    </section>
                </a>
            @endforeach
        </main>
    </div>
    <script src="{{ asset('https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js') }}"></script>
<script src="{{ asset('js/delete-account.js') }}"></script>
</body>
</html>
