@extends('mail.layout')

@section('preheader')
    Проект "{{ $project->name_proj }}" оклонен.
@endsection

@section('content')
    <h1 style="font-family: Helvetica, sans-serif; Margin: 0; margin-bottom: 16px; font-size: 22px;">Ваш проект отклонен.</h1>
    <p style="font-family: Helvetica, sans-serif; font-size: 16px; font-weight: normal; Margin: 0; margin-bottom: 16px;">
        К сожалению, ваш проект <u>{{ $project->name_proj }}</u> не может быть опубликован.
        Пожалуйста, зайдите в <a href="{{ route('profile.services') }}">личный кабинет</a> и узнайте, почему.
    </p>
    <p style="font-family: Helvetica, sans-serif; font-size: 16px; font-weight: normal; Margin: 0; margin-bottom: 16px;">
        Желаем вам продуктивной работы!
    </p>
@endsection
