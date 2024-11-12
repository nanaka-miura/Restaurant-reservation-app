<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation Reminder</title>
</head>
<body>
    <h3>本日のご来店、心よりお待ちしております！</h3>
    <p>{{ $reservation->user->name }} 様</p>
    <p>ご予約店舗: {{$reservation->shop->name }}</p>
    <p>日付: {{ $reservation->date->format("m月d日") }}</p>
    <p>時間: {{ $reservation->time->format("H:i") }}</p>
    <p>お会いできることを楽しみにしております！</p>
</body>
</html>