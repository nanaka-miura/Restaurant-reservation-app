@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/reserve-completed.css') }}">
@endsection

@section('content')
<div class="thanks__content">
    <div class="thanks__message">
        <p class="thanks__message--item">ご予約ありがとうございます</p>
        <div class="thanks__message--return-button">
            <a href="/" class="thanks__message--return-button--item">戻る</a>
        </div>
    </div>
</div>
@endsection