@extends('layouts.authorisation')

@section('title', 'Настройки профиля')

@section('content')
    <div class="page__container">
        <section class="profile personal-account" id="setting" data-avatar="{{ route('profile.setting.avatar') }}" data-update="{{ route('profile.setting.update') }}">

            <div class="profile__container">
                <div class="profile__content">
                    <form data-one-select action="#">
                        <div class="profile__form-block">
                            <div class="profile__title personal__title">Организация</div>
                            <div class="profile__main-info">
                                <div class="profile__form-item form__item">
                                    <label for="org" class="profile__form-label form__label">Название организации</label>
                                    <input id="org" type="text" class="profile__form-input form__input" placeholder="Название организации" data-placeholder="Название организации" value='{{ auth()->user()->org }}'>
                                </div>
                                <div class="profile__form-select">
                                    <label class="profile__form-label form__label">Город</label>
                                    <select id="city" data-scroll name="form[]" class="form__select">
                                        <option value="" @if (auth()->user()->city == '') selected @endif>Город</option>
                                        <option value="2" @if (auth()->user()->city == '2') selected @endif>Москва</option>
                                        <option value="3"@if (auth()->user()->city == '3') selected @endif>Санкт-Петербург</option>
                                        <option value="4"@if (auth()->user()->city == '4') selected @endif>Воронеж</option>
                                    </select>
                                </div>
                                <div class="profile__form-item form__item">
                                    <label for="ruk" class="profile__form-label form__label">Руководитель организации</label>
                                    <input id="ruk" type="text" class="profile__form-input form__input" placeholder="Руководитель организации" data-placeholder="Руководитель организации" value='{{ auth()->user()->ruk }}'>
                                </div>
                                <div class="profile__form-item form__item">
                                    <label for="inn" class="profile__form-label form__label">ИНН организации</label>
                                    <input id="inn" type="text" class="profile__form-input form__input" placeholder="ИНН организации" data-placeholder="ИНН организации" value='{{ auth()->user()->inn }}'>
                                </div>
                                <div class="profile__form-item form__item">
                                    <label for="napr" class="profile__form-label form__label">Направление деятельности</label>
                                    <input id="napr" type="text" class="profile__form-input form__input" placeholder="Направление деятельности" data-placeholder="Направление деятельности" value='{{ auth()->user()->napr }}'>
                                </div>
                                <div class="profile__form-item form__item">
                                    <label for="tel_org" class="profile__form-label form__label">
                                        Телефон организации
                                    </label>
                                    <input id="tel_org" type="text" class="profile__form-input form__input" placeholder="Телефон организации" data-placeholder="Телефон организации" data-inputmask="'mask': '8 999 999 99 99'" value='{{ auth()->user()->tel_org }}'>
                                </div>
                            </div>
                        </div>
                        <div class="profile__form-block">
                            <div class="profile__title personal__title">Социальные сети организации</div>
                            <div class="profile__socials">
                                <div class="profile__form-item form__item">
                                    <label for="sait" class="profile__form-label form__label">Сайт организации</label>
                                    <input id="sait" type="text" class="profile__form-input form__input" placeholder="Сайт" data-placeholder="Сайт" value='{{ auth()->user()->sait }}'>
                                </div>
                                <div class="profile__form-item form__item">
                                    <label for="vk" class="profile__form-label form__label">Вконтакте</label>
                                    <input id="vk" type="text" class="profile__form-input form__input" placeholder="Ссылка" data-placeholder="Ссылка" value='{{ auth()->user()->vk }}'>
                                </div>
                                <div class="profile__form-item form__item">
                                    <label for="telegram" class="profile__form-label form__label">Телеграм</label>
                                    <input id="telegram" type="text" class="profile__form-input form__input" placeholder="Ссылка" data-placeholder="Ссылка" value='{{ auth()->user()->telegram }}'>
                                </div>
                                <div class="profile__form-item form__item">
                                    <label for="youtube" class="profile__form-label form__label">Ютуб</label>
                                    <input id="youtube" type="text" class="profile__form-input form__input" placeholder="Ссылка" data-placeholder="Ссылка" value='{{ auth()->user()->youtube }}'>
                                </div>
                            </div>
                        </div>
                        <div class="profile__form-block">
                            <div class="profile__title personal__title">Пользователь</div>
                            <div class="profile__user">
                                <div class="profile__form-item form__item">
                                    <label for="surname" class="profile__form-label form__label">Фамилия</label>
                                    <input id="surname" type="text" class="profile__form-input form__input" placeholder="Фамилия" data-placeholder="Фамилия" value='{{ auth()->user()->surname }}'>
                                </div>
                                <div class="profile__form-item form__item">
                                    <label for="first-name" class="profile__form-label form__label">Отчество</label>
                                    <input id="first-name" type="text" class="profile__form-input form__input" placeholder="Отчество" data-placeholder="Отчество" value='{{ auth()->user()->first_name }}'>
                                </div>
                                <div class="profile__form-item form__item">
                                    <label for="phone" class="profile__form-label form__label">
                                        Телефон
                                    </label>
                                    <input id="phone" type="text" class="profile__form-input form__input" placeholder="Телефон" data-placeholder="Телефон" data-inputmask="'mask': '8 999 999 99 99'" value='{{ auth()->user()->phone }}'>
                                </div>
                                <div class="profile__form-item form__item">
                                    <label for="dpl" class="profile__form-label form__label">Должность</label>
                                    <input id="dpl" type="text" class="profile__form-input form__input" placeholder="Должность" data-placeholder="Должность" value='{{ auth()->user()->dpl }}'>
                                </div>
                                <div class="profile__form-item form__item">
                                    <label for="name" class="profile__form-label form__label">Имя</label>
                                    <input id="name" type="text" class="profile__form-input form__input" placeholder="Имя" data-placeholder="Имя" value='{{ auth()->user()->name }}'>
                                </div>
                                <div class="profile__cover-letter">
                                    <div class="profile__form-item form__item">
                                        <label for="about" class="profile__form-label form__label">Краткое сопроводительное письмо</label>
                                        <textarea id="about" type="text" class="profile__form-input form__input project-description" placeholder="Краткое сопроводительное письмо" data-placeholder="Краткое сопроводительное письмо">{{ auth()->user()->about }}</textarea>
                                    </div>
                                </div>
                                <div class="profile__form-item form__item">
                                    <label for="email" class="profile__form-label form__label">Электронная почта</label>
                                    <input id="email" type="text" class="profile__form-input form__input" placeholder="Электронная почта" data-placeholder="Электронная почта" value='{{ auth()->user()->email }}'>
                                </div>
                                <div class="profile__form-item form__item">
                                    <label for="portfol" class="profile__form-label form__label">Ссылка на соц. сети или портфолио</label>
                                    <input id="portfol" type="text" class="profile__form-input form__input" placeholder="Ссылка на соц. сети или портфолио" data-placeholder="Ссылка на соц. сети или портфолио" value='{{ auth()->user()->portfol }}'>
                                </div>
                                <div class="profile__checkbox-wrapper">

                                </div>
                            </div>
                        </div>
                        <div class="profile__buttons">
                            <a id="update" href="#" class="profile__btn btn btn-filled">Сохранить</a>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
