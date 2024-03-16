@extends('layouts.authorisation')

@section('title', 'Создать проект')

@section('content')
    <div class="page__container">
        <div class="dashboard-info personal-account">
            <div class="dashboard-info__container">
                <div class="dashboard-info__content _icon-info">
                    <div class="dashboard-info__text">Чтобы ваша заявка успешно прошла модерацию, изучите <a href="#">инструкцию.</a></div>
                </div>
            </div>
        </div>
        <section data-image="{{ route('profile.services.upload') }}" data-store="{{ route('profile.services.store') }}" id='collection-store' class="collection section-base create-project personal-account">

            <div class="create-project__container">
                <div data-one-select class="create-project__content">
                    <div class="create-project__title personal__title">Создание проекта</div>

                    <div class="create-project__general-info">
                        <div class="create-project__form-img">
                            <label class="create-project__form-label form__label">Основное фото проекта</label>
                            <div class="create-project__main-photo form__input add-photo">
                                <div data-img="{{ route('profile.services.img') }}" class="create-project__drag-and-drop drag-and-drop" id='img1'>
                                    <div class="create-project__drag-wrapper drag-wrapper" id='img1_box'>
                                        <form id='form_img_1'><input id='img1_input' type="file" name="file" class="file__input" accept=".jpeg, .jpg, .png" hidden></form>
                                        <div class="create-project__upload-logo"><img src="/image/iconsFont/add-img.svg" alt="Загрузите основное фото проекта"></div>
                                        <div class="create-project__upload-info">Загрузите основное фото проекта</div>
                                    </div>

                                    <img id="img1_fin" class='form_img_cul' style="width: 100%;" src="">
                                    <button id="img1_delete" class="delete-img__button" style="display: none;"></button>
                                </div>
                            </div>
                            <div class="create-project__photo-propetries">950x310 px, до 1 Мб</div>
                        </div>
                        <div class="create-project__main-info">
                            <div class="create-project__main-col">
                                <div class="create-project__form-item form__item">
                                    <label for="name_proj" class="create-project__form-label form__label">Название проекта</label>
                                    <input id="name_proj" type="text" name="projectName" class="create-project__form-input form__input" placeholder="Название проекта" data-placeholder="Название проекта">
                                </div>
                                <div class="create-project__form-item form__item">
                                    <label for="date_service_from" class="create-project__form-label form__label">Сроки начала проекта</label>
                                    <input data-datepicker data-datepicker_1 id="date_service_from" type="text" name="projectName" class="create-project__form-input form__input" placeholder="C" data-placeholder="C" readonly autocomplete="off">
                                </div>
                                <div class="create-project__form-item form__item">
                                    <label for="date_service_to" class="create-project__form-label form__label">Сроки окончания проекта</label>
                                    <input data-datepicker data-datepicker_2 id="date_service_to" type="text" name="projectName" class="create-project__form-input form__input" placeholder="До" data-placeholder="До" readonly autocomplete="off">
                                </div>
                            </div>
                            <div class="create-project__main-col">
                                <div class="create-project__form-select">
                                    <label class="create-project__form-label form__label">Регион</label>
                                    <select data-search id="region" data-scroll name="form[]" class="form__select">
                                        <option value="" selected>Выбрать</option>
                                        @foreach ($region as $el)
                                            <option value="{{ $el->name }}">{{ $el->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="create-project__form-select">
                                    <label class="create-project__form-label form__label">Тип события</label>
                                    <select id="tip" data-scroll name="form[]" class="form__select">
                                        <option value="" selected>Выбрать</option>
                                        @foreach ($event as $el)
                                            <option value="{{ $el->name }}">{{ $el->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="create-project__form-select">
                                    <label class="create-project__form-label form__label">Тематика проекта</label>
                                    <select id="tema" data-scroll name="form[]" class="form__select">
                                        <option value="" selected>Выбрать</option>
                                        @foreach ($subject as $el)
                                            <option value="{{ $el->name }}">{{ $el->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="create-project__form-select">
                                    <label class="create-project__form-label form__label">Теги проекта</label>
                                    <select data-search id="teg" data-scroll multiple name="form[]" class="form__select">
                                        <option value="" selected>Выбрать</option>
                                        @foreach ($tegs as $el)
                                            <option value="{{ $el->name }}">{{ $el->name }}</option>
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
                                <textarea id="excerpt" type="text" name="projectDescription" class="create-project__form-input form__input project-description" placeholder="Не более 10000 символов" data-placeholder="Не более 10000 символов"></textarea>
                            </div>
                        </div>
                        <div class="create-project__project-gallery">
                            <div class="create-project__form-img">
                                <label class="create-project__form-label form__label">Галерея проекта</label>
                                <div class="create-project__gallery-big form__input add-photo">

                                    <div data-img="{{ route('profile.services.img') }}" class="create-project__drag-and-drop drag-and-drop" id='img2'>
                                        <div class="create-project__drag-wrapper drag-wrapper" id='img2_box'>
                                            <form id='form_img_2'><input id='img2_input' type="file" name="file" class="file__input" accept=".jpeg, .jpg, .png" hidden></form>
                                            <div class="create-project__upload-logo"><img src="/image/iconsFont/add-img_thin.svg" alt="Загрузите фото "></div>
                                            <div class="create-project__upload-info">Загрузите фото </div>
                                        </div>
                                        <img id="img2_fin" class='form_img_cul' style="width: 100%;" src="">
                                        <button id="img2_delete" class="delete-img__button" style="display: none;"></button>
                                    </div>
                                </div>
                            </div>
                            <div class="create-project__form-img">
                                <div class="create-project__gallery form__input add-photo">

                                    <div data-img="{{ route('profile.services.img') }}" class="create-project__drag-and-drop drag-and-drop" id='img3'>
                                        <div class="create-project__drag-wrapper drag-wrapper" id='img3_box'>
                                            <form id='form_img_3'><input id='img3_input' type="file" name="file" class="file__input" accept=".jpeg, .jpg, .png" hidden></form>
                                            <div class="create-project__upload-logo"><img src="/image/iconsFont/add-img_thin.svg" alt="Загрузите фото "></div>
                                        </div>
                                        <img id="img3_fin" class='form_img_cul' style="width: 100%;" src="">
                                        <button id="img3_delete" class="delete-img__button" style="display: none;"></button>
                                    </div>
                                </div>
                            </div>
                            <div class="create-project__form-img">
                                <div class="create-project__gallery form__input add-photo">

                                    <div data-img="{{ route('profile.services.img') }}" class="create-project__drag-and-drop drag-and-drop" id='img4'>
                                        <div class="create-project__drag-wrapper drag-wrapper" id='img4_box'>
                                            <form id='form_img_4'><input id='img4_input' type="file" name="file" class="file__input" accept=".jpeg, .jpg, .png" hidden></form>
                                            <div class="create-project__upload-logo"><img src="/image/iconsFont/add-img_thin.svg" alt="Загрузите фото "></div>
                                        </div>
                                        <img id="img4_fin" class='form_img_cul' style="width: 100%;" src="">
                                        <button id="img4_delete" class="delete-img__button" style="display: none;"></button>
                                    </div>
                                </div>
                            </div>
                            <div class="create-project__form-img">
                                <div class="create-project__gallery form__input add-photo">

                                    <div data-img="{{ route('profile.services.img') }}" class="create-project__drag-and-drop drag-and-drop" id='img5'>
                                        <div class="create-project__drag-wrapper drag-wrapper" id='img5_box'>
                                            <form id='form_img_5'><input id='img5_input' type="file" name="file" class="file__input" accept=".jpeg, .jpg, .png" hidden></form>
                                            <div class="create-project__upload-logo"><img src="/image/iconsFont/add-img_thin.svg" alt="Загрузите фото "></div>
                                        </div>
                                        <img id="img5_fin" class='form_img_cul' style="width: 100%;" src="">
                                        <button id="img5_delete" class="delete-img__button" style="display: none;"></button>
                                    </div>
                                </div>
                            </div>
                            <div class="create-project__form-img">
                                <div class="create-project__gallery form__input add-photo">

                                    <div data-img="{{ route('profile.services.img') }}" class="create-project__drag-and-drop drag-and-drop" id='img6'>
                                        <div class="create-project__drag-wrapper drag-wrapper" id='img6_box'>
                                            <form id='form_img_6'><input id='img6_input' type="file" name="file" class="file__input" accept=".jpeg, .jpg, .png" hidden></form>
                                            <div class="create-project__upload-logo"><img src="/image/iconsFont/add-img_thin.svg" alt="Загрузите фото "></div>
                                        </div>
                                        <img id="img6_fin" class='form_img_cul' style="width: 100%;" src="">
                                        <button id="img6_delete" class="delete-img__button" style="display: none;"></button>
                                    </div>
                                </div>
                            </div>
                            <div class="create-project__add-code">
                                <div class="create-project__form-item form__item">
                                    <label for="video" class="create-project__form-label form__label">Код видео
                                        <button type="button" data-tippy-content="Вставьте код (frame) видео. Плееры, которые поддерживает платформа:
                                                        YouTube, RuTube, «ВКонтакте» или «Одноклассники»" class="_icon-info"></button>
                                    </label>
                                    <textarea id="video" type="text" name="addCode" class="create-project__form-input form__input add-code" placeholder="Добавьте код встраивания плеера трансляции" data-placeholder="Не более 10000 символов"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="create-project__find-partners">
                        <div class="create-project__title personal__title">Кого ищем</div>
                        <div class="find-partners__content">
                            <div class="find-partners__partner-block">
                                <div class="create-project__form-select">
                                    <label class="create-project__form-label form__label">Кого ищем</label>
                                    <select data-scroll name="form[]" class="form__select">
                                        <option value="" selected>Выбрать</option>
                                        @foreach ($roles as $el)
                                            <option value="{{ $el->name }}">{{ $el->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="create-project__form-item form__item">
                                    <label for="FormProjectRoleUntil" class="create-project__form-label form__label">До какого числа принимаются заявки</label>
                                    <input id="FormProjectRoleUntil" autocomplete="off" data-datepicker data-datepicker_3 type="text" name="projectName" class="create-project__form-input form__input" placeholder="До 10.09.2023" data-placeholder="До 10.09.2023" readonly autocomplete="off">
                                </div>
                                <div class="create-project__role-description form__item">
                                    <label for="FormProjectPartnerDescription" class="create-project__form-label form__label">Описание</label>
                                    <textarea id="FormProjectPartnerDescription" type="text" name="roleDescription" class="create-project__form-input form__input project-description" placeholder="Не более 10000 символов" data-placeholder="Не более 10000 символов"></textarea>
                                </div>
                            </div>
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
                                <input id="name" type="text" name="projectName" class="create-project__form-input form__input" placeholder="Контакт" data-placeholder="Контакт" data-validate data-required data-error="Заполните данное поле">
                            </div>
                            <div class="create-project__form-item form__item">
                                <label for="tel" class="create-project__form-label form__label">
                                    Телефон*
                                    <button type="button" data-tippy-content="Укажите телефон контактного лица, которому можно позвонить,
                                                    если возникнут технические вопросы." class="_icon-info"></button>
                                </label>
                                <input id="tel" type="text" name="projectName" class="create-project__form-input form__input" placeholder="8 000 000 00 00" data-placeholder="8 000 000 00 00" data-inputmask="'mask': '8 999 999 99 99'" data-validate data-required="phone" data-error="Введен некорректный телефон">
                            </div>
                            <div class="create-project__form-item form__item">
                                <label for="Femail" class="create-project__form-label form__label">
                                    Почта*
                                </label>
                                <input id="email" type="text" name="projectName" class="create-project__form-input form__input" placeholder="Email" data-placeholder="Email" data-validate data-required="email" data-error="Введен некорректный Email">
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
