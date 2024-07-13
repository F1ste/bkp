<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('front/css/style.css?v=17434256263423467379016422223') }}"/>
        @hasSection('title')
            <title>@yield('title') &mdash; {{ config('app.name') }}</title>
        @else
            <title>{{ config('app.name') }}</title>
        @endif
    </head>
    <body>
    <div class="notifications-container"></div>
        <x-header />
        <main class="page">
        
            <div class="sidebar sidebar__expanded">
                <div class="sidebar__items">
                    <a href="/profile/setting" class="sidebar__item _icon-person">Профиль</a>
                    <a href="{{route('profile.services')}}" class="sidebar__item _icon-bookmark">Проекты</a>
                    <a href="{{route('profile.feedback')}}" class="sidebar__item _icon-edit">Отклики</a>
                    <a href="/profile/chat" class="sidebar__item _icon-chat">Диалоги</a>
                    <a href="/profile/notifications" class="sidebar__item _icon-notification">Уведомления</a>
                    <a href="#" class="sidebar__item _icon-settings" data-modal="#modal-help">Помощь</a>
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

        <div class="modal-wrapper" style="display:none">
            <div id="modal-help" class="modal">
                <form action="{{ route('profile.help') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <div>Помощь</div>
                        <button type="button" class="modal-close">&times;</button>
                    </div>
                    <label for="help-question" class="profile__form-label form__label">Напишите Ваш вопрос</label>
                    <textarea name="message" class="profile__form-input form__input" id="help-question" style="width:500px; max-width: calc(100% - 20px); height: 160px" required></textarea>

                    <div style="display:flex; align-items:center; column-gap:15px; padding-top:15px">
                        <button type="submit" class="btn btn-filled">Отправить</button>
                        <p id="help-response">Ответ придёт Вам на почту</p>
                    </div>
                </form>
            </div>
        </div>
        

        <x-send-to-moderation-popup/>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script src="{{ asset('/plugins/ckeditor/ckeditor.js') }}"></script>
        <script src="{{ asset('/plugins/ckfinder/ckfinder.js') }}"></script>
        <script src="{{ asset('front/js/editor.js') }}"></script>
        <script src="{{ mix('front/js/app.js') }}"></script>
        <script src="{{ asset('front/js/app2.js?v=17434256263423467379016422223') }}"></script>
    </body>
</html>
