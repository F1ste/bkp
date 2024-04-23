@extends('mail.layout')

@section('content')
    <h1 style="font-family: Helvetica, sans-serif; Margin: 0; margin-bottom: 16px; font-size: 22px;">Мы получили Ваше обращение</h1>
    <p style="font-family: Helvetica, sans-serif; font-size: 16px; font-weight: normal; Margin: 0; margin-bottom: 16px;">
        <b>Текст обращения:</b> {{ $text }}
    </p>
    <p style="font-family: Helvetica, sans-serif; font-size: 16px; font-weight: normal; Margin: 0; margin-bottom: 16px;">
        Мы обработает Ваше обращение в ближайшее время. Ожидайте ответ на почту.
    </p>
    <p style="font-family: Helvetica, sans-serif; font-size: 16px; font-weight: normal; Margin: 0; margin-bottom: 16px;">
        Желаем вам продуктивной работы!
    </p>
@endsection
