@extends('layouts.index')

@section('title', 'Восстановление пароля')

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
                        <a href="{{ route('login') }}" type="buttom" class="auth-form__heading-item title tabs__title">Вход</a>
                        <a href="{{ route('register') }}" type="button" class="auth-form__heading-item title tabs__title">Регистрация</a>
                    </nav>
                    <div class="tabs__content">
                        <div class="tabs__body">
                            <x-auth-session-status class="mb-4" :status="session('status')" />
                            <x-auth-validation-errors class="mb-4" :errors="$errors" />

                            <h1 class="faq__question-title" style="margin-bottom:0.5rem">{{ __('Confirm the action') }}</h1>

                            <div class="mb-4 text-sm text-gray-600" style="margin-bottom:2em">
                                {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
                            </div>

                            <form method="POST" action="{{ route('password.confirm') }}" class="auth-form__form-body form__body">
                                @csrf

                                <div class="auth-form__form-item form__item">
                                    <label for="password" class="auth-form__form-label form__label">{{ __('Password') }} </label>
                                    <input id="password" id="password" type="password" name="password" required autofocus class="auth-form__form-input form__input" autocomplete="current-password" placeholder="Введите пароль">
                                </div>
                                <button type="submit" class="auth-form__btn form__submit btn btn-filled">
                                    {{ __('Confirm') }}
                                </button>
                            </form>

                        </div>

                    </div>
                </div>
            </div>

        </section>
    </main>

@endsection
