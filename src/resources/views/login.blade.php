@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
@endsection

@section('content')
<div class="login__content">
    <form class="form" action="/login" method="post">
        <div class="form__header">
            <p class="form__header--item">Login</p>
        </div>
        <div class="form__input">
            <i class="fa-solid fa-envelope" style="color: #4B4B4B;"></i>
            <input class="form__input--email" type="email" placeholder="Email">
        </div>
        <div class="form__input">
            <i class="fa-solid fa-lock"  style="color: #4B4B4B;"></i>
            <input class="form__input--password" type="password" placeholder="Password">
        </div>
        <div class="form__button">
            <button class="form__button--submit" type="submit">ログイン</button>
        </div>
    </form>
</div>
@endsection