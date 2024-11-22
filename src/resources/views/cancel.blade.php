@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/cancel.css') }}">
@endsection

@section('content')
<div class="cancel__content">
    <div class="cancel__message">
        <p class="cancel__message--item">ご予約をキャンセルしました</p>
        <div class="cancel__message--return-button">
            <a href="/mypage" class="cancel__message--return-button--item">戻る</a>
        </div>
    </div>
</div>
@endsection