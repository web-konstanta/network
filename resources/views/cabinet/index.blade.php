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
            <section class="user__section">
                <ul class="user__settings">
                    <li>
                        <button>Edit profile</button>
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
                    <li></li>
                    <li>{{  Auth::user()->region  }}</li>
                    <li></li>
                </ul>
            </section>
        </nav>
    </div>
</body>
</html>
