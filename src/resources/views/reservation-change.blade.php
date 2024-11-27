@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/reservation-change.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
@endsection

@section('content')
<div class="change__content">
    <form class="change__form" action="{{ url('/mypage/change/' . $reservation->id) }}" method="post">
        @csrf
        <div class="reservation__detail">
            <div class="detail-title">
                <i class="fa-solid fa-clock"></i>
                <p>予約</p>
            </div>
            <div class="detail__group">
                <p class="detail__header">Shop</p>
                <input class="detail__item readonly" type="text" name="name" value="{{ $reservation->shop->name }}" readonly>
            </div>
            <div class="detail__group">
                <p class="detail__header">Date</p>
                <input class="detail__item" type="date" name="date" value="{{ $reservation->date->format('Y-m-d') }}">
            </div>
            <div class="error-message">
                @error('date')
                {{ $message }}
                @enderror
            </div>
            <div class="detail__group">
                <p class="detail__header">Time</p>
                <select class="detail__item" name="time">
                    <option value="{{ $reservation->time->format('H:i') }}">{{ $reservation->time->format('H:i') }}</option>
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
            </div>
            <div class="error-message">
                @error('time')
                {{ $message }}
                @enderror
            </div>
            <div class="detail__group">
                <p class="detail__header">Number</p>
                <select class="detail__item" name="number" id="">
                    <option value="{{ $reservation->number }}">{{ $reservation->number }}</option>
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
            <div class="error-message">
                @error('number')
                {{ $message }}
                @enderror
            </div>
            <div class="detail__group">
                <p class="detail__header">Menu</p>
                <select class="detail__item" name="menu_id" id="">
                    @foreach($menus as $menu)
                    <option value="{{ $menu->id }}">{{ $menu->menu }}</option>
                    @endforeach
                </select>
            </div>
            <div class="error-message">
                @error ('menu_id')
                {{ $message }}
                @enderror
            </div>
            <div class="detail__group">
                <button class="reservation-change__button" type="submit">変更する</button>
            </div>
        </div>
    </form>
</div>

@endsection