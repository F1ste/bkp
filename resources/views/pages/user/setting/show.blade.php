@extends('layouts.authorisation')

@section('title', 'Просмотр пользователя ' . $user->id)

@section('content')
    <div class="page__container">
        <section class="profile personal-account">

            <div class="profile__container">
                <div class="profile__content">
                    <form data-one-select action="#">
                        <div class="profile__form-block">
                            <div class="profile__title personal__title">Организация</div>
                            <div class="profile__main-info">
                                <div class="profile__form-item form__item">
                                    <label for="org" class="profile__form-label form__label">Название организации</label>
                                    <input id="org" type="text" class="profile__form-input form__input" placeholder="Название организации" data-placeholder="Название организации" value='{{ $user->org }}' disabled>
                                </div>
                                <div class="profile__form-select">
                                    <label class="profile__form-label form__label">Регион</label>
                                    <select id="city" data-scroll name="form[]" class="form__select" disabled>
                                        <option value="" @if ($user->city == '') selected @endif>Регион</option>
                                    @foreach ($regions as $region)
                                        <option value="{{ $region->id }}" @if ($user->city == $region->id) selected @endif>{{ $region->name }}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="profile__form-item form__item">
                                    <label for="ruk" class="profile__form-label form__label">Руководитель организации</label>
                                    <input id="ruk" type="text" class="profile__form-input form__input" placeholder="Руководитель организации" data-placeholder="Руководитель организации" value='{{ $user->ruk }}' disabled>
                                </div>
                                <div class="profile__form-item form__item">
                                    <label for="inn" class="profile__form-label form__label">ИНН организации</label>
                                    <input id="inn" type="text" class="profile__form-input form__input" placeholder="ИНН организации" data-placeholder="ИНН организации" value='{{ $user->inn }}' disabled>
                                </div>
                                <div class="profile__form-item form__item">
                                    <label for="napr" class="profile__form-label form__label">Направление деятельности</label>
                                    <input id="napr" type="text" class="profile__form-input form__input" placeholder="Направление деятельности" data-placeholder="Направление деятельности" value='{{ $user->napr }}' disabled>
                                </div>
                                <div class="profile__form-item form__item">
                                    <label for="tel_org" class="profile__form-label form__label">
                                        Телефон организации
                                    </label>
                                    <input id="tel_org" type="text" class="profile__form-input form__input" placeholder="Телефон организации" data-placeholder="Телефон организации" data-inputmask="'mask': '8 999 999 99 99'" value='{{ $user->tel_org }}' disabled>
                                </div>
                            </div>
                        </div>
                        <div class="profile__form-block">
                            <div class="profile__title personal__title">Социальные сети организации</div>
                            <div class="profile__socials">
                                <div class="profile__form-item form__item">
                                    <label for="sait" class="profile__form-label form__label">Сайт организации</label>
                                    <input id="sait" type="text" class="profile__form-input form__input" placeholder="Сайт" data-placeholder="Сайт" value='{{ $user->sait }}' disabled>
                                </div>
                                <div class="profile__form-item form__item">
                                    <label for="vk" class="profile__form-label form__label">Вконтакте</label>
                                    <input id="vk" type="text" class="profile__form-input form__input" placeholder="Ссылка" data-placeholder="Ссылка" value='{{ $user->vk }}' disabled>
                                </div>
                                <div class="profile__form-item form__item">
                                    <label for="telegram" class="profile__form-label form__label">Телеграм</label>
                                    <input id="telegram" type="text" class="profile__form-input form__input" placeholder="Ссылка" data-placeholder="Ссылка" value='{{ $user->telegram }}' disabled>
                                </div>
                                <div class="profile__form-item form__item">
                                    <label for="youtube" class="profile__form-label form__label">Ютуб</label>
                                    <input id="youtube" type="text" class="profile__form-input form__input" placeholder="Ссылка" data-placeholder="Ссылка" value='{{ $user->youtube }}' disabled>
                                </div>
                            </div>
                        </div>
                        <div class="profile__form-block">
                            <div class="profile__title personal__title">Пользователь</div>
                            <div class="profile__user">
                                <div class="profile__form-item form__item">
                                    <label for="surname" class="profile__form-label form__label">Фамилия</label>
                                    <input id="surname" type="text" class="profile__form-input form__input" placeholder="Фамилия" data-placeholder="Фамилия" value='{{ $user->surname }}' disabled>
                                </div>
                                <div class="profile__form-item form__item">
                                    <label for="first-name" class="profile__form-label form__label">Отчество</label>
                                    <input id="first-name" type="text" class="profile__form-input form__input" placeholder="Отчество" data-placeholder="Отчество" value='{{ $user->first_name }}' disabled>
                                </div>
                                <div class="profile__form-item form__item">
                                    <label for="phone" class="profile__form-label form__label">
                                        Телефон
                                    </label>
                                    <input id="phone" type="text" class="profile__form-input form__input" placeholder="Телефон" data-placeholder="Телефон" data-inputmask="'mask': '8 999 999 99 99'" value='{{ $user->phone }}' disabled>
                                </div>
                                <div class="profile__form-item form__item">
                                    <label for="dpl" class="profile__form-label form__label">Должность</label>
                                    <input id="dpl" type="text" class="profile__form-input form__input" placeholder="Должность" data-placeholder="Должность" value='{{ $user->dpl }}' disabled>
                                </div>
                                <div class="profile__form-item form__item">
                                    <label for="name" class="profile__form-label form__label">Имя</label>
                                    <input id="name" type="text" class="profile__form-input form__input" placeholder="Имя" data-placeholder="Имя" value='{{ $user->name }}' disabled>
                                </div>
                                <div class="profile__cover-letter">
                                    <div class="profile__form-item form__item">
                                        <label for="about" class="profile__form-label form__label">Краткое сопроводительное письмо</label>
                                        <textarea id="about" type="text" class="profile__form-input form__input project-description" placeholder="Краткое сопроводительное письмо" data-placeholder="Краткое сопроводительное письмо" disabled>{{ $user->about }}</textarea>
                                    </div>
                                </div>
                                <div class="profile__form-item form__item">
                                    <label for="email" class="profile__form-label form__label">Электронная почта</label>
                                    <input id="email" type="text" class="profile__form-input form__input" placeholder="Электронная почта" data-placeholder="Электронная почта" value='{{ $user->email }}' disabled>
                                </div>
                                <div class="profile__form-item form__item">
                                    <label for="portfol" class="profile__form-label form__label">Ссылка на соц. сети или портфолио</label>
                                    <input id="portfol" type="text" class="profile__form-input form__input" placeholder="Ссылка на соц. сети или портфолио" data-placeholder="Ссылка на соц. сети или портфолио" value='{{ $user->portfol }}' disabled>
                                </div>
                                <div class="profile__checkbox-wrapper">

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
