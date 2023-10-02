<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('front/css/style.css') }}"/>
        <title>@yield('title') - БКП</title>
    </head>
    <body>
        <div class="wrapper">
        <x-header />
           <main class="page">
            <div class="sidebar">
                <div class="sidebar__items">
                    <a href="/profile/dashboard" class="sidebar__item _icon-dashboard" dataText="Главная"></a>
                    <a href="/profile/setting" class="sidebar__item _icon-person" dataText="Профиль"></a>
                    <a href="#" class="sidebar__item _icon-bookmark" dataText="Проекты"></a>
                    <a href="#" class="sidebar__item _icon-edit" dataText="Отклики"></a>
                    <a href="#" class="sidebar__item _icon-chat" dataText="Диалоги"></a>
                    <a href="/profile/notifications" class="sidebar__item _icon-notification" dataText="Уведомления"></a>
                    <a href="#" class="sidebar__item _icon-settings" dataText="Помощь"></a>
                </div>
                <div class="sidebar__expand"><button type="button" class="sidebar__item _icon-chevron" dataText=""></button></div>
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
                <a href="/logout" class="sidebar__item _icon-logout" dataText="Выход"></a>
            </div>
        @yield('content')
            </main>
        </div>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script src="{{ asset('/plugins/ckeditor/ckeditor.js') }}"></script>
        <script src="{{ asset('/plugins/ckfinder/ckfinder.js') }}"></script>
        <script src="{{ asset('front/js/editor.js') }}"></script>
        <script src="{{ asset('front/js/app.js') }}"></script>
        <script src="{{ asset('front/js/app2.js') }}"></script>



    </body>
</html>
