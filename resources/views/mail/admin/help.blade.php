@extends('mail.layout')

@section('preheader')
    {{ $text }}
@endsection

@section('content')
    <p style="font-family: Helvetica, sans-serif; font-size: 16px; font-weight: normal; Margin: 0; margin-bottom: 16px;">
        Обращение от <a href="{{ route('profile.user', $user->id) }}">{{ trim($user->fullName ) }} [ID:{{ $user->id }}]</a>
    </p>
    <p style="font-family: Helvetica, sans-serif; font-size: 16px; font-weight: normal; Margin: 0; margin-bottom: 16px;">
        <b>Текст сообщения:</b> {{ $text }}
    </p>
@endsection
