@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
@endsection

@section('content')
<div class="register__content">
    <form class="form" action="/register" method="post">
        @csrf
        <div class="form__header">
            <p class="form__header--item">Registration</p>
        </div>
        <div class="form__input">
            <i class="fa-solid fa-user" style="color: #4B4B4B;"></i>
            <input class="form__input--name" type="text" name="name" placeholder="Username">
            @error('name')
            {{ $message }}
            @enderror
        </div>
        <div class="form__input">
            <i class="fa-solid fa-envelope" style="color: #4B4B4B;"></i>
            <input class="form__input--email" type="email" name="email" placeholder="Email">
            @error('email')
            {{ $message }}
            @enderror
        </div>
        <div class="form__input">
            <i class="fa-solid fa-lock" style="color: #4B4B4B;"></i>
            <input class="form__input--password" type="password" name="password" placeholder="Password">
            @error('password')
            {{ $message }}
            @enderror
        </div>
        <div class="form__button">
            <button class="form__button--submit" type="submit">登録</button>
        </div>
    </form>
</div>
@endsection