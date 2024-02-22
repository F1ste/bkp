<div class="wrapper">
    <header class="header">
        <div class="header__container">
            <a href="/" class="header__logo">
                <img src="{{ asset('image/logo-with-text.png') }}" alt="Культурная Биржа">
            </a>

            <div class="header__menu menu">
                <nav class="menu__body">
                    <ul class="menu__list">
                        <li class="menu__item"><a href="/about" class="menu__link">О Бирже</a></li>
                        <li class="menu__item"><a href="/projects" class="menu__link">Проекты</a></li>
                        <li class="menu__item"><a href="/news" class="menu__link">Новости</a></li>
                        <li class="menu__item"><a href="/faq" class="menu__link">FAQ</a></li>
                        <li class="menu__item"><a href="/contacts" class="menu__link">Контакты</a></li>
                        <form id="headerSearch" class="menu__search-form form" action="/search">
                            <div class="menu__form-item search-item form-item">
                                <input type="text" class="form__input _icon-search" name="searchText" placeholder="Найти...">
                                <button type="submit" class="menu__search-submit search-submit _icon-search"></button>
                            </div>
                            <div class="search-results">
                                <div class="search-results__group-name"></div>
                                <div class="search-results__item"></div>
                                <div class="search-results__group-name"></div>
                                <div class="search-results__item"></div>
                            </div>
                        </form>

                        @if (auth()->user())
                            @if (auth()->user()->hasRole('admin'))
                                <a href="{{ route('admin.projects.moderation') }}" class="header__login-btn btn btn-filled">Админка</a>
                            @else
                                <a href="{{ route('login') }}" class="header__login-btn btn btn-filled">Личный кабинет</a>
                            @endif
                        @else
                            <a href="{{ route('login') }}" class="header__login-btn btn btn-filled">Вход</a>
                        @endif
                    </ul>
                </nav>
            </div>
            <button type="button" class="menu__icon icon-menu"><span></span></button>
        </div>
    </header>
