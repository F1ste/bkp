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
            <div class="sidebar">
                <div class="sidebar__items">
                    <div data-spollers data-one-spoller class="spollers">
                        <div class="spollers__item">
                            <button type="button" data-spoller class="sidebar__item _icon-dashboard" dataText="Страницы">
                            </button>
                            <div class="spollers__body">
                                <div class="spollers__wrapper">
                                    <a href="/admin/dashboard" class="sidebar__item _icon-dashboard" dataText="Главная"></a>
                                    <a href="/admin/about/edit-1" class="sidebar__item _icon-dashboard" dataText="О Бирже"></a>
                                    <a href="/admin/faq/faq-1" class="sidebar__item _icon-dashboard" dataText="Вопрос-ответ"></a>
                                    <a href="/admin/contact/contact-1" class="sidebar__item _icon-dashboard" dataText="Контакты"></a>
                                </div>
                            </div>
                        </div>
                        <div class="spollers__item">
                            <button type="button" data-spoller class="sidebar__item _icon-bookmark" dataText="Проекты">
                            </button>
                            <div class="spollers__body">
                                <div class="spollers__wrapper">
                                    <a href="/admin/dashboard" class="sidebar__item _icon-sand-watch" dataText="Модерация"></a>
                                    <a href="/admin/onpublic" class="sidebar__item _icon-aprooved" dataText="Опубликованные"></a>
                                    <a href="/admin/arhiv" class="sidebar__item _icon-cloud-check" dataText="Архив"></a>
                                    <a href="/admin/otclon" class="sidebar__item _icon-trash" dataText="Отклоненные"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="/admin/news" class="sidebar__item _icon-invoice" dataText="Новости"></a>
                    <!--<a href="#" class="sidebar__item _icon-coment-plus" dataText="Отклики"></a>
                    <a href="#" class="sidebar__item _icon-statistic" dataText="Статистика"></a>-->

                    <a href="/admin/rubric" class="sidebar__item _icon-categories" dataText="Рубрики для новостей"></a>
                    <a href="/admin/tema" class="sidebar__item _icon-categories" dataText="Тематика проекта"></a>
                    <a href="/admin/tip" class="sidebar__item _icon-categories" dataText="Тип события"></a>
                    <a href="/admin/teg" class="sidebar__item _icon-categories" dataText="Теги проекта"></a>
                    <a href="/admin/partners" class="sidebar__item _icon-categories" dataText="Кого ищем"></a>
                    <a href="/admin/banners" class="sidebar__item _icon-image" dataText="Рекламные баннеры"></a>
                </div>
<!--                 <div class="sidebar__info">
                </div> -->
                <div class="sidebar__expand"><button type="button" class="sidebar__item _icon-chevron" dataText=""></button></div>
                <a href="/logout" class="sidebar__item _icon-logout" dataText="Выход"></a>
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
