<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rese</title>
    <link rel="stylesheet" href="{{ asset('css/shop-mypage_shop-update.css') }}">
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
            <form class="form" action="/shop/update" method="post" enctype="multipart/form-data">
            @csrf
                <div class="form__header">
                    <p class="form__header--item">店舗情報の更新</p>
                </div>
                <div class="form__input">
                    <p class="form__input--header">店舗名</p>
                    <input class="form__input--name" type="text" name="name" value="{{ $shop->name }}">
                </div>
                <div class="form__input">
                    <p class="form__input--header">エリア</p>
                    <select class="form__input--genre" name="area" id="">
                        <option value="{{ $shop->area }}" hidden>{{ $shop->area }}</option>
                        @foreach (config('pref') as $key => $score)
                        <option value="{{ $score }}">{{ $score }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form__input">
                    <p class="form__input--header">ジャンル</p>
                    <select class="form__input--genre" name="genre" id="">
                        <option value="{{ $shop->genre->id }}" hidden>{{ $shop->genre->genre }}</option>
                        @foreach ($genres as $genre)
                        <option value="{{ $genre->id }}">{{ $genre->genre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form__input">
                    <p class="form__input--header">説明</p>
                    <textarea class="form__input--content"  name="content" id="">{{ $shop->content }}</textarea>
                </div>
                <div class="form__input">
                    <p class="form__input--header">店舗画像</p>
                    <div class="form__input--file">
                        <label class="form__input--file--label" for="file-upload">画像を選択する</label>
                        <input id="file-upload" class="form__file--item" type="file" name="image" accept="image/*" style="display: none;" onchange="previewImage(event)">
                    </div>
                    <div class="form__error">
                    @error('image')
                        {{ $message }}
                    @enderror
                    </div>
                </div>
                <img id="preview-image" src="{{ $shop->image }}" alt="選択した画像のプレビュー">
                <div class="form__button">
                    <button class="form__button--submit" type="submit">登録</button>
                </div>
            </form>
        </div>
    </main>
</body>
</html>
<script>
    function previewImage(event) {
    const file = event.target.files[0];
    const reader = new FileReader();
    const previewImage = document.getElementById('preview-image');

    reader.onload = function (e) {
        previewImage.src = e.target.result;
        previewImage.style.display = 'block';
    };

    if (file) {
        reader.readAsDataURL(file);
    } else {
        previewImage.style.display = 'none';
    }
}
</script>