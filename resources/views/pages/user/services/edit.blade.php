@extends('layouts.authorisation')

@section('title', 'Редактировать проект')

@section('content')
    <div class="page__container">

        <section class="create-project personal-account" id="collection-edit" data-id="{{ $id }}" data-image="{{ route('profile.services.upload') }}" data-update="{{ route('profile.services.edit') }}">

            <div class="create-project__container">
                <div data-one-select class="create-project__content">
                    <div class="create-project__title personal__title">Создание проекта</div>

                    <div class="create-project__general-info">
                        <div class="create-project__form-img">
                            <label class="create-project__form-label form__label">Основное фото проекта</label>
                            <div class="create-project__main-photo form__input add-photo">
                                <div data-img="{{ route('profile.services.img') }}" class="create-project__drag-and-drop drag-and-drop" id='img1'>
                                @if ($collection->img1 == '')
                                    <div class="create-project__drag-wrapper drag-wrapper" id='img1_box'>
                                        <form id='form_img_1'><input id='img1_input' type="file" name="file" class="file__input" accept=".jpeg, .jpg, .png" hidden></form>
                                        <div class="create-project__upload-logo"><img src="/image/iconsFont/add-img.svg" alt="Загрузите основное фото проекта"></div>
                                        <div class="create-project__upload-info">Загрузите основное фото проекта</div>
                                    </div>

                                    <img id="img1_fin" class='form_img_cul' style="width: 100%;" src="">
                                    <button id="img1_delete" class="delete-img__button" style="display: none;"></button>
                                @else
                                    <div style="display: none;" class="create-project__drag-wrapper drag-wrapper" id='img1_box'>
                                        <form id='form_img_1'><input id='img1_input' type="file" name="file" class="file__input" accept=".jpeg, .jpg, .png" hidden></form>
                                        <div class="create-project__upload-logo"><img src="/image/iconsFont/add-img.svg" alt="Загрузите основное фото проекта"></div>
                                        <div class="create-project__upload-info">Загрузите основное фото проекта</div>
                                    </div>

                                    <img id="img1_fin" class='form_img_cul' style="display: block; width: 100%;" src="{{ $collection->img1 }}">
                                    <button id="img1_delete" class="delete-img__button"></button>
                                @endif
                                </div>
                            </div>
                            <div class="create-project__photo-propetries">950x310 px, до 1 Мб</div>
                        </div>
                        <div class="create-project__main-info">
                            <div class="create-project__main-col">
                                <div class="create-project__form-item form__item">
                                    <label for="name_proj" class="create-project__form-label form__label">Название проекта</label>
                                    <input value="{{ $collection->name_proj }}" id="name_proj" type="text" name="projectName" class="create-project__form-input form__input" placeholder="Название проекта" data-placeholder="Название проекта" data-validate data-required data-error="Заполните данное поле">
                                </div>
                                <div class="create-project__form-item form__item">
                                    <label for="date_service_from" class="create-project__form-label form__label">Сроки начала проекта</label>
                                    <input data-datepicker data-datepicker_1 id="date_service_from" type="text" name="projectName" value="{{ Carbon\Carbon::parse($collection->date_service_from)->format('d.m.Y') }}" class="create-project__form-input form__input" placeholder="C" data-placeholder="C" readonly autocomplete="off">
                                </div>
                                <div class="create-project__form-item form__item">
                                    <label for="date_service_to" class="create-project__form-label form__label">Сроки окончания проекта</label>
                                    <input data-datepicker data-datepicker_2 id="date_service_to" type="text" name="projectName" value="{{ Carbon\Carbon::parse($collection->date_service_to)->format('d.m.Y') }}" class="create-project__form-input form__input" placeholder="До" data-placeholder="До" readonly autocomplete="off">
                                </div>
                            </div>
                            <div class="create-project__main-col">
                                <div class="create-project__form-select">
                                    <label class="create-project__form-label form__label">Регион</label>
                                    <select id="region" data-scroll name="form[]" class="form__select">
                                        <option value="" @if ($collection->region == '') selected @endif>Выбрать</option>
                                    @foreach ($region as $el)
                                        <option value="{{ $el->name }}" @if ($collection->region == $el->name) selected @endif>{{ $el->name }}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="create-project__form-select">
                                    <label class="create-project__form-label form__label">Тип события</label>
                                    <select id="tip" data-scroll name="form[]" class="form__select">
                                        <option value="" @if ($collection->tip == '') selected @endif>Выбрать</option>
                                    @foreach ($event as $el)
                                        <option value="{{ $el->name }}" @if ($collection->tip == $el->name) selected @endif>{{ $el->name }}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="create-project__form-select">
                                    <label class="create-project__form-label form__label">Тематика проекта</label>
                                    <select id="tema" data-scroll name="form[]" class="form__select">
                                        <option value="" @if ($collection->tema == '') selected @endif>Выбрать</option>
                                    @foreach ($subject as $el)
                                        <option value="{{ $el->name }}" @if ($collection->tema == $el->name) selected @endif>{{ $el->name }}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="create-project__form-select">
                                    <label class="create-project__form-label form__label">Теги проекта</label>
                                    <select id="teg" data-scroll multiple name="form[]" class="form__select">
                                        <option value="" selected>Выбрать</option>
                                    @foreach ($tegs as $el)
                                        <option value="{{ $el->name }}" @if (in_array($el->name, $teg)) selected @endif>{{ $el->name }}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="create-project__description">
                        <div class="create-project__project-description">
                            <div class="create-project__form-item form__item">
                                <label for="excerpt" class="create-project__form-label form__label">Описание проекта</label>
                                <textarea id="excerpt" type="text" name="projectDescription" class="create-project__form-input form__input project-description" placeholder="Не более 10000 символов" data-placeholder="Не более 10000 символов">{{ $collection->excerpt }}</textarea>
                            </div>
                        </div>
                        <div class="create-project__project-gallery">
                            <div class="create-project__form-img">
                                <label class="create-project__form-label form__label">Галерея проекта</label>
                                <div class="create-project__gallery-big form__input add-photo">

                                @if ($collection->img2 == '')
                                    <div data-img="{{ route('profile.services.img') }}" class="create-project__drag-and-drop drag-and-drop" id='img2'>
                                        <div class="create-project__drag-wrapper drag-wrapper" id='img2_box'>
                                            <form id='form_img_2'><input id='img2_input' type="file" name="file" class="file__input" accept=".jpeg, .jpg, .png" hidden></form>
                                            <div class="create-project__upload-logo"><img src="/image/iconsFont/add-img_thin.svg" alt="Загрузите фото "></div>
                                            <div class="create-project__upload-info">Загрузите фото </div>
                                        </div>
                                        <img id="img2_fin" class='form_img_cul' style='width: 100%;' src="">
                                        <button id="img2_delete" class="delete-img__button" style="display: none;"></button>
                                    </div>
                                @else
                                    <div data-img="{{ route('profile.services.img') }}" class="create-project__drag-and-drop drag-and-drop" id='img2'>
                                        <div style="display: none;" class="create-project__drag-wrapper drag-wrapper" id='img2_box'>
                                            <form id='form_img_2'><input id='img2_input' type="file" name="file" class="file__input" accept=".jpeg, .jpg, .png" hidden></form>
                                            <div class="create-project__upload-logo"><img src="/image/iconsFont/add-img_thin.svg" alt="Загрузите фото "></div>
                                            <div class="create-project__upload-info">Загрузите фото </div>
                                        </div>
                                        <img id="img2_fin" class='form_img_cul' style="display: block; width: 100%;" src="{{ $collection->img2 }}">
                                        <button id="img2_delete" class="delete-img__button"></button>
                                    </div>
                                @endif

                                </div>
                            </div>
                            <div class="create-project__form-img">
                                <div class="create-project__gallery form__input add-photo">

                                @if ($collection->img3 == '')
                                    <div data-img="{{ route('profile.services.img') }}" class="create-project__drag-and-drop drag-and-drop" id='img3'>
                                        <div class="create-project__drag-wrapper drag-wrapper" id='img3_box'>
                                            <form id='form_img_3'><input id='img3_input' type="file" name="file" class="file__input" accept=".jpeg, .jpg, .png" hidden></form>
                                            <div class="create-project__upload-logo"><img src="/image/iconsFont/add-img_thin.svg" alt="Загрузите фото "></div>
                                        </div>
                                        <img id="img3_fin" class='form_img_cul' style='width: 100%;' src="">
                                        <button id="img3_delete" class="delete-img__button" style="display: none;"></button>
                                    </div>
                                @else
                                    <div data-img="{{ route('profile.services.img') }}" class="create-project__drag-and-drop drag-and-drop" id='img3'>
                                        <div style="display: none;" class="create-project__drag-wrapper drag-wrapper" id='img3_box'>
                                            <form id='form_img_3'><input id='img3_input' type="file" name="file" class="file__input" accept=".jpeg, .jpg, .png" hidden></form>
                                            <div class="create-project__upload-logo"><img src="/image/iconsFont/add-img_thin.svg" alt="Загрузите фото "></div>
                                        </div>
                                        <img id="img3_fin" class='form_img_cul' style="display: block; width: 100%;" src="{{ $collection->img3 }}">
                                        <button id="img3_delete" class="delete-img__button"></button>
                                    </div>
                                @endif

                                </div>
                            </div>
                            <div class="create-project__form-img">
                                <div class="create-project__gallery form__input add-photo">

                                @if ($collection->img4 == '')
                                    <div data-img="{{ route('profile.services.img') }}" class="create-project__drag-and-drop drag-and-drop" id='img4'>
                                        <div class="create-project__drag-wrapper drag-wrapper" id='img4_box'>
                                            <form id='form_img_4'><input id='img4_input' type="file" name="file" class="file__input" accept=".jpeg, .jpg, .png" hidden></form>
                                            <div class="create-project__upload-logo"><img src="/image/iconsFont/add-img_thin.svg" alt="Загрузите фото "></div>
                                        </div>
                                        <img id="img4_fin" class='form_img_cul' style='width: 100%;' src="">
                                        <button id="img4_delete" class="delete-img__button" style="display: none;"></button>
                                    </div>
                                @else
                                    <div data-img="{{ route('profile.services.img') }}" class="create-project__drag-and-drop drag-and-drop" id='img4'>
                                        <div style="display: none;" class="create-project__drag-wrapper drag-wrapper" id='img4_box'>
                                            <form id='form_img_4'><input id='img4_input' type="file" name="file" class="file__input" accept=".jpeg, .jpg, .png" hidden></form>
                                            <div class="create-project__upload-logo"><img src="/image/iconsFont/add-img_thin.svg" alt="Загрузите фото "></div>
                                        </div>
                                        <img id="img4_fin" class='form_img_cul' style="display: block; width: 100%;" src="{{ $collection->img4 }}">
                                        <button id="img4_delete" class="delete-img__button"></button>
                                    </div>
                                @endif

                                </div>
                            </div>
                            <div class="create-project__form-img">
                                <div class="create-project__gallery form__input add-photo">

                                @if ($collection->img5 == '')
                                    <div data-img="{{ route('profile.services.img') }}" class="create-project__drag-and-drop drag-and-drop" id='img5'>
                                        <div class="create-project__drag-wrapper drag-wrapper" id='img5_box'>
                                            <form id='form_img_5'><input id='img5_input' type="file" name="file" class="file__input" accept=".jpeg, .jpg, .png" hidden></form>
                                            <div class="create-project__upload-logo"><img src="/image/iconsFont/add-img_thin.svg" alt="Загрузите фото "></div>
                                        </div>
                                        <img id="img5_fin" class='form_img_cul' style='width: 100%;' src="">
                                        <button id="img5_delete" class="delete-img__button" style="display: none;"></button>
                                    </div>
                                @else
                                    <div data-img="{{ route('profile.services.img') }}" class="create-project__drag-and-drop drag-and-drop" id='img5'>
                                        <div style="display: none;" class="create-project__drag-wrapper drag-wrapper" id='img5_box'>
                                            <form id='form_img_5'><input id='img5_input' type="file" name="file" class="file__input" accept=".jpeg, .jpg, .png" hidden></form>
                                            <div class="create-project__upload-logo"><img src="/image/iconsFont/add-img_thin.svg" alt="Загрузите фото "></div>
                                        </div>
                                        <img id="img5_fin" class='form_img_cul' style="width: 100%; display: block;" src="{{ $collection->img5 }}">
                                        <button id="img5_delete" class="delete-img__button"></button>
                                    </div>
                                @endif

                                </div>
                            </div>
                            <div class="create-project__form-img">
                                <div class="create-project__gallery form__input add-photo">

                                @if ($collection->img5 == '')
                                    <div data-img="{{ route('profile.services.img') }}" class="create-project__drag-and-drop drag-and-drop" id='img6'>
                                        <div class="create-project__drag-wrapper drag-wrapper" id='img6_box'>
                                            <form id='form_img_6'><input id='img6_input' type="file" name="file" class="file__input" accept=".jpeg, .jpg, .png" hidden></form>
                                            <div class="create-project__upload-logo"><img src="/image/iconsFont/add-img_thin.svg" alt="Загрузите фото "></div>
                                        </div>
                                        <img id="img6_fin" class='form_img_cul' style='width: 100%;' src="">
                                        <button id="img6_delete" class="delete-img__button" style="display: none;"></button>
                                    </div>
                                @else
                                    <div data-img="{{ route('profile.services.img') }}" class="create-project__drag-and-drop drag-and-drop" id='img6'>
                                        <div style="display: none;" class="create-project__drag-wrapper drag-wrapper" id='img6_box'>
                                            <form id='form_img_6'><input id='img6_input' type="file" name="file" class="file__input" accept=".jpeg, .jpg, .png" hidden></form>
                                            <div class="create-project__upload-logo"><img src="/image/iconsFont/add-img_thin.svg" alt="Загрузите фото "></div>
                                        </div>
                                        <img id="img6_fin" class='form_img_cul' style="width: 100%; display: block;" src="{{ $collection->img6 }}">
                                        <button id="img6_delete" class="delete-img__button"></button>
                                    </div>
                                @endif

                                </div>
                            </div>
                            <div class="create-project__add-code">
                                <div class="create-project__form-item form__item">
                                    <label for="video" class="create-project__form-label form__label">
                                        Код видео
                                        <button type="button" data-tippy-content="Вставьте код (frame) видео. Плееры, которые поддерживает платформа: YouTube, RuTube, «ВКонтакте» или «Одноклассники»" class="_icon-info"></button>
                                    </label>
                                    <textarea id="video" type="text" name="addCode" class="create-project__form-input form__input add-code" placeholder="Добавьте код встраивания плеера трансляции" data-placeholder="Не более 10000 символов">{{ $collection->video }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="create-project__find-partners">
                        <div class="create-project__title personal__title">Кого ищем</div>
                        <div class="find-partners__content">
                        @php
                            $count = 3;
                            $partnerCount = 1;
                            $descriptionId = 0;
                        @endphp
                        @foreach ($serch as $serchs)
                            <div class="find-partners__partner-block">

                                <div class="create-project__form-select">
                                    <label class="create-project__form-label form__label">Кого ищем</label>
                                    <select data-scroll name="form[]" class="form__select">
                                        <option value="" @if ($serchs->sel == '') selected @endif>Выбрать</option>

                                        @foreach ($roles as $el)
                                            <option value="{{ $el->name }}" @if ($serchs->sel == $el->name) selected @endif>{{ $el->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="create-project__form-item form__item">
                                    <label for="FormProjectRoleUntil" class="create-project__form-label form__label">До
                                        какого числа принимаются заявки</label>
                                    <input id="FormProjectRoleUntil" autocomplete="off" data-datepicker data-datepicker_{{ $count }} type="text" name="projectName" class="create-project__form-input form__input" value='{{ $serchs->inp }}' placeholder="До 10.09.2023" data-placeholder="До 10.09.2023" readonly autocomplete="off">
                                </div>
                                <div class="create-project__role-description form__item">
                                    <label for="FormProjectPartnerDescription{{$descriptionId}}" class="create-project__form-label form__label">Описание</label>
                                    <textarea id="FormProjectPartnerDescription{{$descriptionId}}" type="text" name="roleDescription" class="create-project__form-input form__input project-description" placeholder="Не более 10000 символов" data-placeholder="Не более 10000 символов">{{ $serchs->tex }}</textarea>
                                </div>
                                <div class="create-project__remove-partner">
                                    <button type="button" class="remove-partner btn btn-filled">Удалить роль</button>
                                </div>
                            </div>
                            @php $count++; $descriptionId++; @endphp
                        @endforeach
                        </div>
                        <div class="create-project__form-img add-partner">
                            Добавить роль партнера
                            <div class="create-project__gallery form__input add-partner__input">
                                <div class="create-project__drag-and-drop">
                                    <div class="create-project__drag-wrapper">
                                        <button type="button" name="addPartner" class="add-partner__btn" hidden=""></button>
                                        <div class="create-project__upload-logo"><img src="/image/iconsFont/add-img_thin.svg" alt="Загрузите фото "></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="create-project__footer">
                        <div class="create-project__title personal__title">Контакты для связи:</div>
                        <div class="create-project__footer-content">
                            <div class="create-project__form-item form__item">
                                <label for="name" class="create-project__form-label form__label">
                                    Имя Фамилия*
                                </label>
                                <input id="name" type="text" name="projectName" class="create-project__form-input form__input" value="{{ $collection->name }}" placeholder="Контакт" data-placeholder="Контакт" data-validate data-required data-error="Заполните данное поле">
                            </div>
                            <div class="create-project__form-item form__item">
                                <label for="tel" class="create-project__form-label form__label">
                                    Телефон*
                                    <button type="button" data-tippy-content="Укажите телефон контактного лица, которому можно позвонить, если возникнут технические вопросы." class="_icon-info"></button>
                                </label>
                                <input id="tel" type="text" name="projectName" class="create-project__form-input form__input" placeholder="8 000 000 00 00" data-placeholder="8 000 000 00 00" value="{{ $collection->tel }}" data-inputmask="'mask': '8 999 999 99 99'" data-validate data-required="phone" data-error="Введен некорректный телефон">
                            </div>
                            <div class="create-project__form-item form__item">
                                <label for="Femail" class="create-project__form-label form__label">
                                    Почта*
                                </label>
                                <input id="email" type="text" name="projectName" class="create-project__form-input form__input" placeholder="Email" data-placeholder="Email" value="{{ $collection->email }}" data-validate data-required="email" data-error="Введен некорректный Email">
                            </div>
                        </div>
                        <div class="create-project__buttons">
                            <button id='store-button' class="create-project__btn btn btn-filled">Сохранить</button>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    @endsection
