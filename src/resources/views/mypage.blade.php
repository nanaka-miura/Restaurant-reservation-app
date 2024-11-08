@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
@endsection

@section('content')
<div class="mypage-content">
    <div class="content__left">
        <h3 class="user__name--mobile">{{ $user->name }}さん</h3>
        <h3 class="reservation__content--header">予約状況</h3>
        @foreach($reservations as $reservation)
        <div class="reservation__detail">
            <div class="detail-title">
                <i class="fa-solid fa-clock"></i>
                <p>予約{{ $loop->iteration }}</p>
                <form class="cancel-button__form" action="{{ url('/cancel/' . $reservation->id) }}" method="post">
                    @csrf
                    <button class="cancel-button" type="submit">×</button>
                </form>
            </div>
            <div class="detail__group">
                <p class="detail__header">Shop</p>
                <p class="detail__item">{{ $reservation->shop->name }}</p>
            </div>
            <div class="detail__group">
                <p class="detail__header">Date</p>
                <p class="detail__item">{{ $reservation->date->format('Y-m-d') }}</p>
            </div>
            <div class="detail__group">
                <p class="detail__header">Time</p>
                <p class="detail__item">{{ $reservation->time->format('H:i') }}</p>
            </div>
            <div class="detail__group">
                <p class="detail__header">Number</p>
                <p class="detail__item">{{ $reservation->number }}</p>
            </div>
        </div>
        @endforeach
    </div>
    <div class="content__right">
        <h3 class="user__name">{{ $user->name }}さん</h3>
        <div class="likes__shop-list">
            <h3 class="likes__shop-list--header">お気に入り店舗</h3>
            <div class="likes__shop--group">
                @foreach($likes as $like)
                <div class="likes__shop--card">
                    <div class="shop-card__top">
                        <img class="shop-card__img" src="{{ $like->shop->image }}" alt="">
                    </div>
                    <div class="shop-card__bottom">
                        <h3 class="shop-card__title">{{ $like->shop->name }}</h3>
                        <div class="shop-card__tag">
                            <p class="shop-card__tag--area">{{ $like->shop->area }}</p>
                            <p class="shop-card__tag--genre">{{ $like->shop->genre }}</p>
                        </div>
                        <div class="shop-card__item">
                            <a href="{{ url('/detail/' . $like->shop_id) }}" class="shop-card__item--detail-button">詳しくみる</a>
                            <form action="{{ url('/like/' . $like->shop->id) }}" method="post">
                        @csrf
                        <button class="button" type="submit">
                        @if(in_array($like->shop->id, (array)$like))
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
    </div>
</div>
@endsection