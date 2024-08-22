@extends('layouts.index')

@section('title', 'Восстановление пароля')

@section('content')

    <main class="page">
        <section class="auth">
            <div class="auth__media-block media-block">
                <picture>
                    <source srcset="{{asset('image/auth-bg.webp')}}" type="image/webp"><img src="image/auth-bg.png" alt="Изображение">
                </picture>
            </div>
            <div class="auth__content">
                <div class="auth__heading">
                    <a href="/">
                        <img src="{{ asset('image/logo-with-text.png') }}" alt="Культурная биржа">
                    </a>
                </div>
                <div data-tabs class="auth__form tabs">
                    <div class="tabs__content">
                        <div class="tabs__body">

                            <h1 class="faq__question-title" style="margin-bottom:0.5rem">Создание нового пароля</h1>

                            @if (session('status') == 'verification-link-sent')
                                <div class="mb-4 font-medium text-sm text-green-600">
                                    {{ __('A new verification link has been sent to the email address you provided during registration') }}.
                                </div>
                            @endif

                            <div class="mb-4 text-sm text-gray-600" style="margin-bottom:1em">
                                Введите новый пароль для вашей учетной записи.
                            </div>

                            <x-auth-session-status class="mb-4" :status="session('status')" />
                            <x-auth-validation-errors class="mb-4 _form-error" style="margin-bottom:0.5em" :errors="$errors" />

                            <form method="POST" action="{{ route('password.update') }}" class="auth-form__form-body form__body">
                                @csrf
                                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                                <div class="auth-form__form-item form__item">
                                    <label for="FormEmail" class="auth-form__form-label form__label">{{ __('Email') }}</label>
                                    <input id="FormEmail" name="email" type="email" :value="old('email', $request->email)" class="auth-form__form-input form__input" placeholder="Email" required autofocus>
                                </div>

                                <div class="auth-form__form-item form__item">
                                    <label for="FormPassword" class="auth-form__form-label form__label">Пароль</label>
                                    <input id="FormPassword" name="password" type="password" class="auth-form__form-input form__input" placeholder="Введите пароль" autocomplete="off" required>
                                </div>

                                <div class="auth-form__form-item form__item">
                                    <label for="FormPasswordConfirmation" class="auth-form__form-label form__label">Пароль еще раз</label>
                                    <input id="FormPasswordConfirmation" name="password_confirmation" type="password" class="auth-form__form-input form__input" placeholder="Введите пароль ещё раз" autocomplete="off" required>
                                </div>

                                <button type="submit" class="auth-form__btn form__submit btn btn-filled">Сохранить пароль</button>
                            </form>

                        </div>

                    </div>
                </div>
            </div>

        </section>
    </main>

@endsection

