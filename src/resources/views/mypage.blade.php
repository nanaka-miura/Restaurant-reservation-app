@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
@endsection

@section('content')
<div class="mypage-content">
    <div class="content__left">
        <h3 class="reservation__content--header">予約状況</h3>
        <div class="reservation__detail">
            <div class="detail-title">
                <i class="fa-solid fa-clock"></i>
                <p>予約1</p>
            </div>
            <div class="detail__group">
                <p class="detail__header">Shop</p>
                <p class="detail__item">仙人</p>
            </div>
            <div class="detail__group">
                <p class="detail__header">Date</p>
                <p class="detail__item">2021-04-01</p>
            </div>
            <div class="detail__group">
                <p class="detail__header">Time</p>
                <p class="detail__item">17:00</p>
            </div>
            <div class="detail__group">
                <p class="detail__header">Number</p>
                <p class="detail__item">1人</p>
            </div>
        </div>
    </div>
    <div class="content__right">
        <h3 class="user__name">testさん</h3>
        <div class="likes__shop-list">
            <h3 class="likes__shop-list--header">お気に入り店舗</h3>
            <div class="likes__shop--group">
                <div class="likes__shop--card">
                    <div class="shop-card__top">
                        <img class="shop-card__img" src="https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/sushi.jpg" alt="">
                    </div>
                    <div class="shop-card__bottom">
                        <h3 class="shop-card__title">仙人</h3>
                        <div class="shop-card__tag">
                            <p class="shop-card__tag--area">東京都</p>
                            <p class="shop-card__tag--genre">寿司</p>
                        </div>
                        <div class="shop-card__item">
                            <a href="/detail" class="shop-card__item--detail-button">詳しくみる</a>
                            <i class="fa-solid fa-heart" style="color: #ff0000;"></i>
                        </div>
                    </div>
                </div>
                <div class="likes__shop--card">
                    <div class="shop-card__top">
                        <img class="shop-card__img" src="https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/sushi.jpg" alt="">
                    </div>
                    <div class="shop-card__bottom">
                        <h3 class="shop-card__title">仙人</h3>
                        <div class="shop-card__tag">
                            <p class="shop-card__tag--area">東京都</p>
                            <p class="shop-card__tag--genre">寿司</p>
                        </div>
                        <div class="shop-card__item">
                            <a href="/detail" class="shop-card__item--detail-button">詳しくみる</a>
                            <i class="fa-solid fa-heart" style="color: #ff0000;"></i>
                        </div>
                    </div>
                </div>
                <div class="likes__shop--card">
                    <div class="shop-card__top">
                        <img class="shop-card__img" src="https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/sushi.jpg" alt="">
                    </div>
                    <div class="shop-card__bottom">
                        <h3 class="shop-card__title">仙人</h3>
                        <div class="shop-card__tag">
                            <p class="shop-card__tag--area">東京都</p>
                            <p class="shop-card__tag--genre">寿司</p>
                        </div>
                        <div class="shop-card__item">
                            <a href="/detail" class="shop-card__item--detail-button">詳しくみる</a>
                            <i class="fa-solid fa-heart" style="color: #ff0000;"></i>
                        </div>
                    </div>
                </div>
                <div class="likes__shop--card">
                    <div class="shop-card__top">
                        <img class="shop-card__img" src="https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/sushi.jpg" alt="">
                    </div>
                    <div class="shop-card__bottom">
                        <h3 class="shop-card__title">仙人</h3>
                        <div class="shop-card__tag">
                            <p class="shop-card__tag--area">東京都</p>
                            <p class="shop-card__tag--genre">寿司</p>
                        </div>
                        <div class="shop-card__item">
                            <a href="/detail" class="shop-card__item--detail-button">詳しくみる</a>
                            <i class="fa-solid fa-heart" style="color: #ff0000;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection