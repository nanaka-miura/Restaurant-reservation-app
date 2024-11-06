<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rese</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/shop-detail.css') }}">
</head>
<body>
    <div class="detail__content">
        <div class="content__left">
            <header class="header">
            <div class="header__inner">
                <input id="drawer-input" class="drawer-hidden" type="checkbox">
                <label for="drawer-input" class="drawer-open">
                    <span class="menu-icon"></span>
                </label>
                <a class="header__inner--logo" href="/">Rese</a>
                <nav class="nav__content">
                @if (Auth::check())
                    <ul class="nav__list">
                        <li class="nav__item"><a class="nav__item--link" href="/">Home</a></li>
                        <li class="nav__item"><a class="nav__item--link" href="/logout">Logout</a></li>
                        <li class="nav__item"><a class="nav__item--link" href="/mypage">Mypage</a></li>
                    </ul>
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
            <div class="shop-name">
                <span class="previous"></span>
                <h3 class="shop-name__item">仙人</h3>
                <span class="next"></span>
            </div>
            <img class="shop__img" src="https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/sushi.jpg" alt="">
            <div class="shop__tag">
                <p class="shop__tag--area">東京都</p>
                <p class="shop__tag--genre">寿司</p>
            </div>
            <div class="shop__content">
                料理長厳選の食材から作る寿司を用いたコースをぜひお楽しみください。食材・味・価格、お客様の満足度を徹底的に追及したお店です。特別な日のお食事、ビジネス接待まで気軽に使用することができます。
            </div>
        </div>
        <div class="content__right">
            <div class="reservation__form">
                <form class="form" action="">
                    <div class="form__name">予約</div>
                    <div class="form__input--group">
                        <input class="form__input--date" type="date">
                        <select class="form__input--time" name="" id="">
                            <option value="" hidden>時間</option>
                            <option value="17:00">17:00</option>
                            <option value="17:30">17:30</option>
                            <option value="18:00">18:00</option>
                            <option value="18:30">18:30</option>
                            <option value="19:00">19:00</option>
                            <option value="19:30">19:30</option>
                            <option value="20:00">20:00</option>
                            <option value="20:30">20:30</option>
                            <option value="21:00">21:00</option>
                            <option value="21:30">21:30</option>
                            <option value="22:00">22:00</option>
                        </select>
                        <select class="form__input--number" name="" id="">
                            <option value="" hidden>人数</option>
                            <option value="1人">1人</option>
                            <option value="2人">2人</option>
                            <option value="3人">3人</option>
                            <option value="4人">4人</option>
                            <option value="5人">5人</option>
                            <option value="6人">6人</option>
                            <option value="7人">7人</option>
                            <option value="8人">8人</option>
                            <option value="9人">9人</option>
                            <option value="10人">10人</option>
                        </select>
                    </div>
                    <div class="confirmation">
                        <div class="confirmation__group">
                            <p class="confirmation__header">Shop</p>
                            <p class="confirmation__item">仙人</p>
                        </div>
                        <div class="confirmation__group">
                            <p class="confirmation__header">Date</p>
                            <p class="confirmation__item">2021-04-01</p>
                        </div>
                        <div class="confirmation__group">
                            <p class="confirmation__header">Time</p>
                            <p class="confirmation__item">17:00</p>
                        </div>
                        <div class="confirmation__group">
                            <p class="confirmation__header">Number</p>
                            <p class="confirmation__item">1人</p>
                        </div>
                    </div>
                    <button class="form__button--submit" type="submit">予約する</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>