<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('front/css/style.css') }}"/>
        @hasSection('title')
            <title>@yield('title') &mdash; {{ config('app.name') }}</title>
        @else
            <title>{{ config('app.name') }}</title>
        @endif
    </head>
    <body>

        <x-header />
        <main class="page">
            <div class="sidebar sidebar__expanded">
                <div class="sidebar__items">
                    <a href="/profile/setting" class="sidebar__item _icon-person">Профиль</a>
                    <a href="{{route('profile.services')}}" class="sidebar__item _icon-bookmark">Проекты</a>
                    <a href="{{route('profile.feedback')}}" class="sidebar__item _icon-edit">Отклики</a>
                    <a href="/profile/chat" class="sidebar__item _icon-chat">Диалоги</a>
                    <a href="/profile/notifications" class="sidebar__item _icon-notification">Уведомления</a>
                    <a href="#" class="sidebar__item _icon-settings">Помощь</a>
                </div>
                <div class="sidebar__info">
                    <div class="sidebar__info-item">
                        8 800 555 35 35
                    </div>
                    <div class="sidebar__info-item">
                        <a href="mailto:mss.soboleva@gmail.com">mss.soboleva@gmail.com</a>
                    </div>
                    <div class="sidebar__info-item">
                        Копирайт
                    </div>
                    <div class="sidebar__info-socials socials">
                        <a href="" class="socials__social-item icon-telegram">
                            <i class="socials__icon _icon-telegram"></i>
                        </a>
                        <a href="" class="socials__social-item icon-vk">
                            <i class="socials__icon _icon-vk"></i>
                        </a>
                        <a href="" class="socials__social-item icon-youtube">
                            <i class="socials__icon _icon-youtube"></i>
                        </a>
                    </div>
                </div>
                <a href="/logout" class="sidebar__item _icon-logout">Выход</a>
            </div>
            @yield('content')
        </main>

        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script src="{{ asset('/plugins/ckeditor/ckeditor.js') }}"></script>
        <script src="{{ asset('/plugins/ckfinder/ckfinder.js') }}"></script>
        <script src="{{ asset('front/js/editor.js') }}"></script>
        <script src="{{ asset('front/js/app.js') }}"></script>
        <script src="{{ asset('front/js/app2.js') }}"></script>
    </body>
</html>
