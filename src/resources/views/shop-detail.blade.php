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
            <div class="shop-name">
                @if(isset($previous))
                <a class="previous" href="{{ url('/detail/' .  $previous->id) }}"><</a>
                @endif
                <h3 class="shop-name__item">{{ $shop->name }}</h3>
                @if(isset($next))
                <a class="next" href="{{ url('/detail/' . $next->id) }}">></a>
                @endif
            </div>
            <img class="shop__img" src="{{ $shop->image }}" alt="">
            <div class="shop__tag">
                <p class="shop__tag--area">{{ $shop->area }}</p>
                <p class="shop__tag--genre">{{ $shop->genre }}</p>
            </div>
            <div class="shop__content">
                {{ $shop->content }}
            </div>
        </div>
        <div class="content__right">
            <div class="reservation__form">
                <form class="form" action="{{ url('/detail/' . $shop->id) }}" method="post">
                    @csrf
                    <div class="form__name">予約</div>
                    <div class="form__input--group">
                        <input class="form__input--date" type="date" name="date">
                        <div class="error-message">
                            @error ('date')
                            {{ $message }}
                            @enderror
                        </div>
                        <select class="form__input--time" name="time" id="">
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
                        <div class="error-message">
                            @error ('time')
                            {{ $message }}
                            @enderror
                        </div>
                        <select class="form__input--number" name="number" id="">
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
                        <div class="error-message">
                            @error ('number')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="confirmation">
                        <div class="confirmation__group">
                            <p class="confirmation__header">Shop</p>
                            <p class="confirmation__item">{{ $shop->name }}</p>
                        </div>
                        <div class="confirmation__group">
                            <p class="confirmation__header">Date</p>
                            <p class="confirmation__item" id="selected_date"></p>
                        </div>
                        <div class="confirmation__group">
                            <p class="confirmation__header">Time</p>
                            <p class="confirmation__item" id="selected_time"></p>
                        </div>
                        <div class="confirmation__group">
                            <p class="confirmation__header">Number</p>
                            <p class="confirmation__item" id="selected_number"></p>
                        </div>
                    </div>
                    <button class="form__button--submit" type="submit">予約する</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const dateSelect = document.querySelector('.form__input--date');
        const selectedDate = document.getElementById('selected_date');
        const savedDate = sessionStorage.getItem('selected_date');

        if (savedDate) {
            selectedDate.textContent = savedDate;
            dateSelect.value = savedDate;
        }
        dateSelect.addEventListener('change', function () {
            selectedDate.textContent = dateSelect.value;
            sessionStorage.setItem('selected_date', dateSelect.value);
        });

        const timeSelect = document.querySelector('.form__input--time');
        const selectedTime = document.getElementById('selected_time');
        const savedTime = sessionStorage.getItem('selected_time');

        if (savedTime) {
            selectedTime.textContent = savedTime;
            dateSelect.value = savedTime;
        }

        timeSelect.addEventListener('change', function () {
            selectedTime.textContent = timeSelect.value;
            sessionStorage.setItem('selected_time', timeSelect.value);
        });

        const numberSelect = document.querySelector('.form__input--number');
        const selectedNumber = document.getElementById('selected_number');
        const savedNumber = sessionStorage.getItem('selected_number');

        if (savedNumber) {
            selectedNumber.textContent = savedNumber;
            dateSelect.value = savedNumber;
        }

        numberSelect.addEventListener('change', function () {
            selectedNumber.textContent = numberSelect.value;
            sessionStorage.setItem('selected_number', numberSelect.value);
        });

        const submitButton = document.querySelector('.form__button--submit');
        submitButton.addEventListener('click', function () {
            sessionStorage.removeItem('selected_date');
            sessionStorage.removeItem('selected_time');
            sessionStorage.removeItem('selected_number');
        });
        });
</script>