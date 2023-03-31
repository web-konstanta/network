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
        <h1 class="posts__title">Saved posts</h1>
        <main class="posts">
            @foreach ($posts as $post)
                <a href="{{ route('posts.show', $post->post->id) }}">
                    <section class="posts__section">
                        <img src="{{ url('storage/' . $post->post->image) }}" width="250" height="300">
                    </section>
                </a>
            @endforeach
        </main>
    </div>
</body>
</html>
