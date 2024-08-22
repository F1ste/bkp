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
                    <div class="tabs__content">
                        <div class="tabs__body">
                            <h1 class="faq__question-title" style="margin-bottom:0.5rem">{{ __('Forgot your password?') }}</h1>

                            <div class="mb-4 text-sm text-gray-600" style="margin-bottom:1em">
                                {{ __('Enter your email address and we will send you instructions on how to reset your password.') }}
                            </div>

                            <x-auth-session-status class="mb-4" style="margin-bottom:0.5em" :status="session('status')" />
                            <x-auth-validation-errors class="mb-4 _form-error" style="margin-bottom:0.5em" :errors="$errors" />

                            <form method="POST" action="{{ route('password.email') }}" class="auth-form__form-body form__body">
                                @csrf
                                <div class="auth-form__form-item form__item">
                                    <label for="FormEmailAuth" class="auth-form__form-label form__label">Email </label>
                                    <input id="FormEmailAuth" id="email" type="email" name="email" :value="old('email')" required autofocus class="auth-form__form-input form__input" placeholder="Email">
                                </div>
                                <button type="submit" class="auth-form__btn form__submit btn btn-filled">
                                    {{ __('Email Password Reset Link') }}
                                </button>
                            </form>

                        </div>

                    </div>
                </div>
            </div>

        </section>
    </main>

@endsection
