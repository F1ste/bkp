@extends('mail.layout')

@section('preheader')
    Доступы от Вашего личного кабинета внутри письма.
@endsection

@section('content')
    <h1 style="font-family: Helvetica, sans-serif; Margin: 0; margin-bottom: 16px; font-size: 22px;">Спасибо за регистрацию на Культурной бирже</h1>
    <p style="font-family: Helvetica, sans-serif; font-size: 16px; font-weight: normal; Margin: 0; margin-bottom: 16px;">
        Ваш логин: {{ $email ?? '' }}, пароль: {{ $password ?? '' }}
    </p>
    <p style="font-family: Helvetica, sans-serif; font-size: 16px; font-weight: normal; Margin: 0; margin-bottom: 16px;">
        Теперь вы можете выложить свой проект, а также стать партнером других инициатив.
    </p>
    <p style="font-family: Helvetica, sans-serif; font-size: 16px; font-weight: normal; Margin: 0; margin-bottom: 16px;">
        Желаем вам продуктивной работы!
    </p>
@endsection
