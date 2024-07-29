<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('front/css/style.css?v=124223535753423456234346737905422224') }}"/>
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
                    <a href="{{ route('admin.news.index') }}" class="sidebar__item _icon-invoice">Новости</a>
                    <div data-spollers data-one-spoller class="spollers">
                        <div class="spollers__item">
                            <button type="button" data-spoller class="sidebar__item _icon-bookmark sidebar__item--chevron">
                                Проекты
                            </button>
                            <div class="spollers__body">
                                <div class="spollers__wrapper">
                                    <a href="{{ route('admin.projects.moderation') }}" class="sidebar__item _icon-sand-watch">Модерация</a>
                                    <a href="{{ route('admin.projects.public') }}" class="sidebar__item _icon-aprooved">Опубликованные</a>
                                    <a href="{{ route('admin.projects.archive') }}" class="sidebar__item _icon-cloud-check">Архив</a>
                                    <a href="{{ route('admin.projects.declined') }}" class="sidebar__item _icon-trash">Отклоненные</a>
                                </div>
                            </div>
                        </div>
                        <div class="spollers__item">
                            <button type="button" data-spoller class="sidebar__item _icon-edit sidebar__item--chevron">Страницы</button>
                            <div class="spollers__body">
                                <div class="spollers__wrapper">
                                    <a href="{{ route('admin.projects.moderation') }}" class="sidebar__item _icon-pencil">Главная</a>
                                    <a href="{{ route('admin.about.edit', ['id' => 1]) }}" class="sidebar__item _icon-pencil">О Бирже</a>
                                    <a href="{{ route('admin.faq') }}" class="sidebar__item _icon-pencil">Вопрос-ответ</a>
                                    <a href="{{ route('admin.contact.edit', ['contact' => 1]) }}" class="sidebar__item _icon-pencil">Контакты</a>
                                    <a href="{{ route('admin.footer') }}" class="sidebar__item _icon-pencil">Настройки футера</a>
                                </div>
                            </div>
                        </div>
                        <div class="spollers__item">
                            <button type="button" data-spoller class="sidebar__item _icon-settings sidebar__item--chevron">Настройки</button>
                            <div class="spollers__body">
                                <div class="spollers__wrapper">
                                    <a href="{{ route('admin.news.categories.index') }}" class="sidebar__item _icon-categories">Рубрики для новостей</a>
                                    <a href="{{ route('admin.projects.subjects.index') }}" class="sidebar__item _icon-categories">Тематика проекта</a>
                                    <a href="{{ route('admin.projects.events.index') }}" class="sidebar__item _icon-categories">Тип события</a>
                                    <a href="{{ route('admin.projects.tags.index') }}" class="sidebar__item _icon-categories">Теги проекта</a>
                                    <a href="{{ route('admin.projects.roles.index') }}" class="sidebar__item _icon-categories">Роли</a>
                                    <a href="{{ route('admin.banners.index') }}" class="sidebar__item _icon-image">Рекламные баннеры</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <a href="{{ route('admin.user') }}" class="sidebar__item _icon-rate">Рейтинг пользователей</a>
                    <a href="{{ route('admin.statictics') }}" class="sidebar__item _icon-statistic">Статистика</a>
                </div>

                <div class="sidebar__items mt-auto">
                    @can('viewTelescope')
                    <a href="{{ route('telescope') }}" target="_blank" class="sidebar__item _icon-info">Laravel Telescope</a>
                    @endcan
                    <a href="{{ route('logout') }}" class="sidebar__item _icon-logout">Выход</a>
                </div>
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

        <x-send-to-moderation-popup-admin />
        @if(session('message'))
        <script>
            window.sess = {
                csrfToken: '{{ csrf_token() }}',
                sessionData: @json(session('message')) // Передайте данные сессии в формате JSON
            };
        </script>
        @endif
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script src="{{ asset('/plugins/ckeditor/ckeditor.js') }}"></script>
        <script src="{{ asset('/plugins/ckfinder/ckfinder.js') }}"></script>
        <script src="{{ asset('front/js/editor.js') }}"></script>
        <script src="{{ mix('front/js/app.js') }}"></script>
        <script src="{{ asset('front/js/app2.js?v=124223535753423456234346737905422224') }}"></script>
    </body>
</html>
