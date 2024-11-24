<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rese</title>
    <link rel="stylesheet" href="{{ asset('css/admin-mypage.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <header>
        <div class="header__inner">
            <a class="header__inner--logo" href="/">Rese</a>
        </div>
    </header>
    <main>
        <div class="register__content">
            <form class="form" action="/admin/mypage" method="post">
            @csrf
                <div class="form__header">
                    <p class="form__header--item">店舗代表者登録</p>
                </div>
                @if(session('message'))
                <div class="alert-success">
                {{ session('message') }}
                </div>
                @endif
                <div class="form__input">
                    <i class="fa-solid fa-user" style="color: #4B4B4B;"></i>
                    <input class="form__input--name" type="text" name="name" placeholder="Username">
                </div>
                <div class="error-message">
                @error('name')
                {{ $message }}
                @enderror
                </div>
                <div class="form__input">
                    <i class="fa-solid fa-envelope" style="color: #4B4B4B;"></i>
                    <input class="form__input--email" type="email" name="email" placeholder="Email">
                </div>
                <div class="error-message">
                @error('email')
                {{ $message }}
                @enderror
                </div>
                <div class="form__input">
                    <i class="fa-solid fa-lock" style="color: #4B4B4B;"></i>
                    <input class="form__input--password" type="password" name="password" placeholder="Password">
                </div>
                <div class="error-message">
                @error('password')
                {{ $message }}
                @enderror
                </div>
                <div class="form__button">
                    <button class="form__button--submit" type="submit">登録</button>
                </div>
            </form>
        </div>
    </main>
</body>
</html>