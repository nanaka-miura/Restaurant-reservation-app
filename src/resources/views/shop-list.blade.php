@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/shop-list.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
@endsection


@section('content')
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
@endsection