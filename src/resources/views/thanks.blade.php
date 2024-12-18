@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endsection

@section('content')
<div class="thanks__content">
    <div class="thanks__message">
        <p class="thanks__message--item">会員登録ありがとうございます</p>
        <div class="thanks__message--login-button">
            <a href="/" class="thanks__message--login-button--item">ホームへ</a>
        </div>
    </div>
</div>
@endsection