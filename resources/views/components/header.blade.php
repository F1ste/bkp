<div class="wrapper">
        <header class="header">
            <div class="header__container">
                <a href="/" class="header__logo">
                    <img src="{{ asset('image/logo.svg') }}" alt="Культурная Биржа">
                    <div class="logo__text">Культурная <br> Биржа</div>
                </a>

                <div class="header__menu menu">
                    <nav class="menu__body">
                        <ul class="menu__list">
<!--                             <li class="menu__item">
                                <div data-spollers data-one-spoller data-spollers-speed="200" href="" class="menu__link accordion__title">
                                    <button type="button" data-spoller data-spoller-close class="menu__accordion-menu accordion__title _icon-accordionArrow">
                                        О Бирже
                                    </button>
                                    <div class="menu__accordion-body accordion__body main-text">
                                        <a href="/about" class="menu__accordion-link">О проекте </a>
                                        <a href="/partners" class="menu__accordion-link">Партнеры</a>
                                    </div>
                                </div>
                            </li> -->
                            <li class="menu__item"><a href="/about" class="menu__link">О Бирже</a></li>
                            <li class="menu__item"><a href="/projects" class="menu__link">Проекты</a></li>
                            <li class="menu__item"><a href="/news" class="menu__link">Новости</a></li>
                            <li class="menu__item"><a href="/faq" class="menu__link">FAQ</a></li>
                            <li class="menu__item"><a href="/contacts" class="menu__link">Контакты</a></li>
                            <form id="headerSearch" class="menu__search-form form">
                                <div class="menu__form-item search-item form-item">
                                    <input type="text" class="form__input _icon-search" name="searchText" placeholder="Найти...">
                                    <button type="submit" class="menu__search-submit search-submit _icon-search"></button>
                                </div>
                                <div class="search-results">
                                    <div class="search-results__group-name">
                                    
                                
                                    </div>
                                    <div class="search-results__item">
                                        
                                    </div>
                                    <div class="search-results__group-name">
                                        
                                    </div>
                                    <div class="search-results__item">
                                       
                                    </div>
                                </div>
                            </form>
                            

                            @if(auth()->user())

                                @if(auth()->user()->roles[0]->name == 'admin')
                                    <a href="{{ route('admin.dashboard') }}" class="header__login-btn btn btn-filled">Админка</a>
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