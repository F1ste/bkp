@extends('mail.layout')

@section('preheader')
    На ваш проект "{{ $project->name_proj }}" кто-то откликнулся.
@endsection

@section('content')
    <p style="font-family: Helvetica, sans-serif; font-size: 16px; font-weight: normal; Margin: 0; margin-bottom: 16px;">
        Уважаемый пользователь, на ваш проект <a href="{{ route('projects.project', [$project]) }}">{{ $project->name_proj }}</a> пришел новый отклик.
        Кто-то хочет обсудить сотрудничество.
        Перейдите в <a href="{{ route('profile.feedback.owner', [$feedback->id]) }}">личный кабинет</a>, чтобы узнать подробности.
    </p>
    <p style="font-family: Helvetica, sans-serif; font-size: 16px; font-weight: normal; Margin: 0; margin-bottom: 16px;">
        Желаем вам продуктивной работы!
    </p>
@endsection
