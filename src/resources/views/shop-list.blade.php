<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rese</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/shop-list.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <div class="header-left">
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
            <div class="header-right">
                <form class="search-form" action="/search" method="get">
                    <select class="search-form__input search-form__input--area" name="area" id="">
                        <option value="" hidden>All area</option>
                        @foreach (config('pref') as $key => $score)
                        <option value="{{ $score }}">{{ $score }}</option>
                        @endforeach
                    </select>
                    <select class="search-form__input search-form__input--genre" name="genre" id="">
                        <option value="" hidden>All genre</option>
                        <option value="寿司">寿司</option>
                        <option value="焼肉">焼肉</option>
                        <option value="居酒屋">居酒屋</option>
                        <option value="イタリアン">イタリアン</option>
                        <option value="ラーメン">ラーメン</option>
                    </select>
                    <i class="fa-solid fa-magnifying-glass" style="color: #F2F2F2;"></i>
                    <input class="search-form__input search-form__input--keyword" name="keyword" type="text" placeholder="Search ...">
                </form>
            </div>
        </div>
    </header>
    <main>
        <div class="content">
            <div class="shop-card__group">
            @foreach($shops as $shop)
                <div class="shop-card">
                    <div class="shop-card__top">
                        <img class="shop-card__img" src="{{ $shop->image }}" alt="">
                    </div>
                    <div class="shop-card__bottom">
                        <h3 class="shop-card__title">{{ $shop->name }}</h3>
                        <div class="shop-card__tag">
                            <p class="shop-card__tag--area">{{ $shop->area }}</p>
                            <p class="shop-card__tag--genre">{{ $shop->genre }}</p>
                        </div>
                        <div class="shop-card__item">
                            <a href="{{ url('/detail/' . $shop->id) }}" class="shop-card__item--detail-button">詳しくみる</a>
                            <form action="{{ url('/like/' . $shop->id) }}" method="post">
                                @csrf
                                <button class="button" type="submit">
                                @if(in_array($shop->id, $like, true))
                                <i class="fa-solid fa-heart" style="color: #FF0000;"></i>
                                @else
                                <i class="fa-solid fa-heart" style="color: #EEEEEE;"></i>
                                @endif
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </main>
</body>
</html>