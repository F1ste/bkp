@extends('layouts.index')

@section('title', 'Авторизация')

@section('content')

    <main class="page">
        <section class="auth">
            <div class="auth__media-block media-block">
                <picture>
                    <source srcset="image/auth-bg.webp" type="image/webp"><img src="image/auth-bg.png" alt="Изображение">
                </picture>
            </div>
            <div class="auth__content">
                <div class="auth__heading">
                    <a href="/">
                        <img src="image/logo-with-text.png" alt="Культурная биржа">
                    </a>
                </div>
                <div data-tabs class="auth__form tabs">
                    <nav data-tabs-titles class="auth-form__heading tabs__navigation">
                        <button type="button" class="auth-form__heading-item title tabs__title _tab-active">Вход</button>
                        <a href="{{ route('register') }}" type="button" class="auth-form__heading-item title tabs__title">Регистрация</a>
                    </nav>
                    <div data-tabs-body class="tabs__content">
                        <div class="tabs__body">
                            <x-auth-session-status class="mb-4" :status="session('status')" />
                            <x-auth-validation-errors class="mb-4 _form-error" style="margin-bottom:0.5em" :errors="$errors" />
                            <form method="POST" action="{{ route('login') }}" class="auth-form__form-body form__body">
                                @csrf

                                <div class="auth-form__form-item form__item">
                                    <label for="FormEmailAuth" class="auth-form__form-label form__label">Email </label>
                                    <input type="email" id="FormEmailAuth" id="email" name="email" :value="old('email')" required autofocus class="auth-form__form-input form__input" placeholder="Email">
                                </div>
                                <div class="auth-form__form-item form__item">
                                    <label for="password" class="auth-form__form-label form__label">Пароль</label>
                                    <input type="password" data-required data-error="Поле должно быть заполнено" id="password" id="password" name="password" required autocomplete="current-password" class="auth-form__form-input form__input" autocomplete=off placeholder="Введите пароль">
                                </div>
                                <button type="submit" class="auth-form__btn form__submit btn btn-filled">Войти</button>
                            </form>
                            <a href="{{route('password.request')}}" class="link__item forget-pass__link">Забыли пароль?</a>
                        </div>

                    </div>
                </div>
            </div>

        </section>
    </main>

@endsection
