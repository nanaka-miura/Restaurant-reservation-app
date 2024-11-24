<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rese</title>
    <link rel="stylesheet" href="{{ asset('css/shop-mypage_confirmation.css') }}">
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
        <div class="content">
            <table class="table">
                <tr class="table__row">
                    <th class="table__header">日付</th>
                    <th class="table__header">時間</th>
                    <th class="table__header">予約店舗</th>
                    <th class="table__header">名前</th>
                    <th class="table__header">人数</th>
                </tr>
                @foreach ($reservations as $reservation)
                <tr class="table__row">
                    <td class="table__item">{{ $reservation->date->format('Y-m-d') }}</td>
                    <td class="table__item">{{ $reservation->time->format('H:i') }}</td>
                    <td class="table__item">{{ $reservation->shop->name }}</td>
                    <td class="table__item">{{ $reservation->user->name }}</td>
                    <td class="table__item">{{ $reservation->number }}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </main>
</body>
</html>