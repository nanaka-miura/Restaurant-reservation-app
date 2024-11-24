<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rese</title>
    <link rel="stylesheet" href="{{ asset('css/shop-mypage.css') }}">
    <script src="https://unpkg.com/html5-qrcode/minified/html5-qrcode.min.js"></script>

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
                <ul class="nav__list">
                    <li class="nav__item"><a class="nav__item--link" href="/shop/create">店舗情報の作成</a></li>
                    <li class="nav__item"><a class="nav__item--link" href="/shop/update">店舗情報の更新</a></li>
                    <li class="nav__item"><a class="nav__item--link" href="/shop/reservation-confirmation">予約情報の確認</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main>
        <div class="main__content">
            <ul class="content__group">
                <li class="content__item"><a class="content__item--link" href="/shop/create">店舗情報の作成</a></li>
                <li class="content__item"><a class="content__item--link" href="/shop/update">店舗情報の更新</a></li>
                <li class="content__item"><a class="content__item--link" href="/shop/reservation-confirmation">予約情報の確認</a></li>
                </ul>
        </div>
    </main>
</body>
</html>