<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rese</title>
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    @yield('css')
</head>
<body>
    <header class="header">
        <div class="header__inner">
            <input id="drawer-input" class="drawer-hidden" type="checkbox">
            <label for="drawer-input" class="drawer-open">
                <span class="menu-icon"></span>
            </label>
            <a class="header__inner--logo" href="/">Rese</a>
            <nav class="nav__content">
                @if (Auth::check())
                <form action="/logout" method="post">
                @csrf
                <ul class="nav__list">
                    <li class="nav__item"><a class="nav__item--link" href="/">Home</a></li>
                    <button class="nav__item nav__item--link button" type="submit">Logout</button>
                    <li class="nav__item"><a class="nav__item--link" href="/mypage">Mypage</a></li>
                </ul>
                </form>
                @else
                <ul class="nav__list">
                    <li class="nav__item"><a class="nav__item--link" href="/">Home</a></li>
                    <li class="nav__item"><a class="nav__item--link" href="/register">Registration</a></li>
                    <li class="nav__item"><a class="nav__item--link" href="/login">Login</a></li>
                </ul>
                @endif
            </nav>
        </div>
    </header>

    <main>
        @yield('content')
    </main>
</body>
</html>