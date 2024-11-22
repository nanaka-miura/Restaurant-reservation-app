@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/rating.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
@endsection

@section('content')
<div class="change__content">
    <form class="change__form" action="{{ url('/mypage/rating/' . $reservation->id) }}" method="post">
        @csrf
        <div class="reservation__detail">
            <div class="detail-title">
                <i class="fa-solid fa-star"></i>
                <p>お店の評価</p>
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
                <p class="detail__header">Rating</p>
                <i class="fa-regular fa-thumbs-down" style="color: #ffffff;"></i>
                <input class="detail__item--input" type="radio" id="1" name="rating" value="1">
                <label class="detail__item--label" for="1">1</label>
                <input class="detail__item--input" type="radio" id="2" name="rating" value="2">
                <label class="detail__item--label" for="2">2</label>
                <input class="detail__item--input" type="radio" id="3" name="rating" value="3">
                <label class="detail__item--label" for="3">3</label>
                <input class="detail__item--input" type="radio" id="4" name="rating" value="4">
                <label class="detail__item--label" for="4">4</label>
                <input class="detail__item--input" type="radio" id="5" name="rating" value="5">
                <label class="detail__item--label" for="5">5</label>
                <i class="fa-regular fa-thumbs-up" style="color: #ffffff;"></i>
            </div>
            <div class="error-message">
                @error('rating')
                {{ $message }}
                @enderror
            </div>
            <div class="detail__group">
                <p class="detail__header">Comment</p>
                <textarea class="detail__item--textarea" name="comment" id=""></textarea>
            </div>
            <div class="error-message">
                @error('comment')
                {{ $message }}
                @enderror
            </div>
            <div class="detail__group">
                <button class="reservation-change__button" type="submit">評価する</button>
            </div>
        </div>
    </form>
</div>
@endsection