@extends('mail.layout')

@section('preheader')
    Проект "{{ $project->name_proj }}" опубликован.
@endsection

@section('content')
    <h1 style="font-family: Helvetica, sans-serif; Margin: 0; margin-bottom: 16px; font-size: 22px;">Ваш проект опубликован.</h1>
    <p style="font-family: Helvetica, sans-serif; font-size: 16px; font-weight: normal; Margin: 0; margin-bottom: 16px;">
        Поздравляем! Ваш проект опубликован в разделе «<a href="{{ route('profile.services') }}">Проекты</a>». Зайдите в личный кабинет, возможно, кто-то уже откликнулся!
    </p>
    <p style="font-family: Helvetica, sans-serif; font-size: 16px; font-weight: normal; Margin: 0; margin-bottom: 16px;">
        Желаем вам продуктивной работы!
    </p>
@endsection
