@extends('mail.layout')

@section('preheader')
    Ваш отклик одобрен
@endsection

@section('content')
    <p style="font-family: Helvetica, sans-serif; font-size: 16px; font-weight: normal; Margin: 0; margin-bottom: 16px;">
        Уважаемый пользователь, сообщаем, что автор проекта <a href="{{ route('projects.project', [$project]) }}">{{ $project->name_proj }}</a> рассмотрел и принял ваш отклик.
        Теперь вы можете перейти с ним в диалог.
        Откройте <a href="{{ route('profile.feedback.candidat', [$feedback->id]) }}">личный кабинет</a> чтобы начать переписку.
    </p>
    <p style="font-family: Helvetica, sans-serif; font-size: 16px; font-weight: normal; Margin: 0; margin-bottom: 16px;">
        Желаем вам продуктивной работы!
    </p>
@endsection
