@extends('layouts.index')

@section('title', 'Регистрация')

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
                        <img src="image/logo-with-text.svg" alt="Культурная биржа">
                    </a>
                </div>
                <div data-tabs class="auth__form tabs">
                    <nav data-tabs-titles class="auth-form__heading tabs__navigation">
                        <a href="{{ route('login') }}" type="button" class="auth-form__heading-item title tabs__title ">Вход</a>
                        <button type="button" class="auth-form__heading-item title tabs__title _tab-active">Регистрация</button>
                    </nav>

                    <div class="tabs__content">
                        <div class="tabs__body">
                            <x-auth-validation-errors class="mb-4" :errors="$errors" />
                            <form method="POST" action="{{ route('register') }}" class="auth-form__form-body form__body">
                                @csrf
                                <div class="auth-form__form-item form__item">
                                    <label for="FormEmailReg" class="auth-form__form-label form__label">Email</label>
                                    <input id="FormEmailReg" name="email" :value="old('email')" class="auth-form__form-input form__input" placeholder="Email">
                                </div>
                                <div class="auth-form__form-item form__item">
                                    <label for="formRegPass" class="auth-form__form-label form__label">Пароль</label>
                                    <input data-required data-error="Поле должно быть заполнено" id="formPassReg" type="password" name="password" class="auth-form__form-input form__input" autocomplete="off" placeholder="Введите пароль">
                                </div>
                                <div class="auth-form__form-item form__item">
                                    <label for="formPassRegRep" class="auth-form__form-label form__label">Пароль еще раз</label>
                                    <input data-required data-error="Поле должно быть заполнено" id="formPassRegRep" type="password" name="password_confirmation" required class="auth-form__form-input form__input" autocomplete="off" placeholder="Повторите пароль">
                                </div>
                                <div class="auth-form__form-item form__item checkbox__item">
                                    <div class="auth-form__checkbox checkbox">
                                        <input data-no-focus-classes="" id="terms" required type="checkbox" name="terms" class="auth-form__checkbox-input checkbox__input">
                                        <label for="terms" class="auth-form__form-label checkbox__label "><span>Я согласен с <a href="/policy">условиями пользования сервисом</a></span></label>
                                    </div>
                                </div>

                                <button type="submit" class="auth-form__btn form__submit btn btn-filled">Зарегистрироваться</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </section>
    </main>

@endsection
