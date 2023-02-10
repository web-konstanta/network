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
                <img class="user__avatar" src="{{  asset('img/avatar.jpg') }}" alt="Avatar icon">
            </div>
            <section class="user__section">
                <ul class="user__settings">
                    <li>anakostiy_anti</li>
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
                    <li class="user__info-login">Konst@_nta</li>
                    <li>Sports & recreation</li>
                    <li>Kharkov, Ukraine 🇺🇦</li>
                    <li>t.me/anakostiy_music</li>
                </ul>
            </section>
        </nav>
    </div>
</body>
</html>
