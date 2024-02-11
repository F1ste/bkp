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
        <x-header />

        <main class="page">
            <div class="sidebar sidebar__expanded">
                <div class="sidebar__items">
                    <a href="/admin/news" class="sidebar__item _icon-invoice">Новости</a>
                    <div data-spollers data-one-spoller class="spollers">
                        <div class="spollers__item">
                            <button type="button" data-spoller class="sidebar__item _icon-bookmark sidebar__item--chevron">
                                Проекты
                            </button>
                            <div class="spollers__body">
                                <div class="spollers__wrapper">
                                    <a href="/admin/dashboard" class="sidebar__item _icon-sand-watch">Модерация</a>
                                    <a href="/admin/onpublic" class="sidebar__item _icon-aprooved">Опубликованные</a>
                                    <a href="/admin/arhiv" class="sidebar__item _icon-cloud-check">Архив</a>
                                    <a href="/admin/otclon" class="sidebar__item _icon-trash">Отклоненные</a>
                                </div>
                            </div>
                        </div>
                        <div class="spollers__item">
                            <button type="button" data-spoller class="sidebar__item _icon-edit sidebar__item--chevron">Страницы</button>
                            <div class="spollers__body">
                                <div class="spollers__wrapper">
                                    <a href="/admin/dashboard" class="sidebar__item _icon-pencil">Главная</a>
                                    <a href="{{route('admin.about.edit',['id'=>1])}}" class="sidebar__item _icon-pencil">О Бирже</a>
                                    <a href="{{route('admin.faq')}}" class="sidebar__item _icon-pencil">Вопрос-ответ</a>
                                    <a href="{{route('admin.contact.edit', ['contact' => 1])}}" class="sidebar__item _icon-pencil">Контакты</a>
                                    <a href="/admin/footer" class="sidebar__item _icon-pencil">Настройки футера</a>
                                </div>
                            </div>
                        </div>
                        <div class="spollers__item">
                            <button type="button" data-spoller class="sidebar__item _icon-settings sidebar__item--chevron">Настройки</button>
                            <div class="spollers__body">
                                <div class="spollers__wrapper">
                                    <a href="/admin/rubric" class="sidebar__item _icon-categories">Рубрики для новостей</a>
                                    <a href="/admin/tema" class="sidebar__item _icon-categories">Тематика проекта</a>
                                    <a href="/admin/tip" class="sidebar__item _icon-categories">Тип события</a>
                                    <a href="/admin/teg" class="sidebar__item _icon-categories">Теги проекта</a>
                                    <a href="/admin/banners" class="sidebar__item _icon-image">Рекламные баннеры</a>
                                    <a href="/admin/partners" class="sidebar__item _icon-categories">Роли</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <a href="/admin/user" class="sidebar__item _icon-rate">Рейтинг пользователей</a>
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
