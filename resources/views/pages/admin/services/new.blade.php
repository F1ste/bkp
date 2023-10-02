@extends('layouts.authorisation')

@section('title', 'Создать услугу')

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
                        <div class="create-project__content">
                            <div class="create-project__title personal__title">Создание проекта</div>

                                <div class="create-project__general-info">
                                    <div class="create-project__form-img">
                                        <label class="create-project__form-label form__label">Основное фото проекта</label>
                                        <div class="create-project__main-photo form__input add-photo">
                                            <div class="create-project__drag-and-drop drag-and-drop">
                                                <div class="create-project__drag-wrapper drag-wrapper">
                                                    <input type="file" name="file" class="file__input" accept=".jpeg, .jpg, .png" hidden>
                                                    <div class="create-project__upload-logo"><img src="/image/iconsFont/add-img.svg" alt="Загрузите основное фото проекта"></div>
                                                    <div class="create-project__upload-info">Загрузите основное фото проекта</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="create-project__photo-propetries">550x545 px, до 100 мб</div>
                                    </div>
                                    <div class="create-project__main-info">
                                        <div class="create-project__main-col">
                                            <div class="create-project__form-item form__item">
                                                <label for="name_proj" class="create-project__form-label form__label">Название проекта</label>
                                                <input id="name_proj" type="text" name="projectName" class="create-project__form-input form__input" placeholder="Название проекта" data-placeholder="Название проекта">
                                            </div>
                                            <div class="create-project__form-item form__item">
                                                <label for="date_service_from" class="create-project__form-label form__label">Сроки начала проекта</label>
                                                <input ata-datepicker data-datepicker_1 id="date_service_from" type="text" name="projectName" class="create-project__form-input form__input" placeholder="C" data-placeholder="C">
                                            </div>
                                            <div class="create-project__form-item form__item">
                                                <label for="date_service_to" class="create-project__form-label form__label">Сроки окончания проекта</label>
                                                <input ata-datepicker data-datepicker_2 id="date_service_to" type="text" name="projectName" class="create-project__form-input form__input" placeholder="До" data-placeholder="До">
                                            </div>
                                        </div>
                                        <div class="create-project__main-col">
                                            <div class="create-project__form-select">
                                                <label class="create-project__form-label form__label">Регион</label>
                                                <select id="region" data-scroll name="form[]" class="form__select">
                                                    <option value="" selected>Выбрать</option>
                                                    <option value="2">Пункт 1</option>
                                                    <option value="3">Пункт 2</option>
                                                    <option value="4">Пункт 3</option>
                                                </select>
                                            </div>
                                            <div class="create-project__form-select">
                                                <label class="create-project__form-label form__label">Тип события</label>
                                                <select id="tip" data-scroll name="form[]" class="form__select">
                                                    <option value="" selected>Выбрать</option>
                                                    <option value="2">Пункт 1</option>
                                                    <option value="3">Пункт 2</option>
                                                </select>
                                            </div>
                                            <div class="create-project__form-select">
                                                <label class="create-project__form-label form__label">Тематика проекта</label>
                                                <select id="tema" data-scroll name="form[]" class="form__select">
                                                    <option value="" selected>Выбрать</option>
                                                    <option value="2">Пункт 1</option>
                                                    <option value="3">Пункт 2</option>
                                                </select>
                                            </div>
                                            <div class="create-project__form-select">
                                                <label class="create-project__form-label form__label">Теги проекта</label>
                                                <select id="teg" data-scroll multiple name="form[]" class="form__select">
                                                    <option value="" selected>Выбрать</option>
                                                    <option value="2">Пункт 1</option>
                                                    <option value="3">Пункт 2</option>
                                                    <option value="4">Пункт 3</option>
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

                                                <div class="create-project__drag-and-drop drag-and-drop">
                                                    <div class="create-project__drag-wrapper drag-wrapper">
                                                        <input type="file" name="file" class="file__input" accept=".jpeg, .jpg, .png" hidden>
                                                        <div class="create-project__upload-logo"><img src="/image/iconsFont/add-img_thin.svg" alt="Загрузите фото "></div>
                                                        <div class="create-project__upload-info">Загрузите фото </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="create-project__form-img">
                                            <div class="create-project__gallery form__input add-photo">

                                                <div class="create-project__drag-and-drop drag-and-drop">
                                                    <div class="create-project__drag-wrapper drag-wrapper">
                                                        <input type="file" name="file" class="file__input" accept=".jpeg, .jpg, .png" hidden>
                                                        <div class="create-project__upload-logo"><img src="/image/iconsFont/add-img_thin.svg" alt="Загрузите фото "></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="create-project__form-img">
                                            <div class="create-project__gallery form__input add-photo">

                                                <div class="create-project__drag-and-drop drag-and-drop">
                                                    <div class="create-project__drag-wrapper drag-wrapper">
                                                        <input type="file" name="file" class="file__input" accept=".jpeg, .jpg, .png" hidden>
                                                        <div class="create-project__upload-logo"><img src="/image/iconsFont/add-img_thin.svg" alt="Загрузите фото "></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="create-project__form-img">
                                            <div class="create-project__gallery form__input add-photo">

                                                <div class="create-project__drag-and-drop drag-and-drop">
                                                    <div class="create-project__drag-wrapper drag-wrapper">
                                                        <input type="file" name="file" class="file__input" accept=".jpeg, .jpg, .png" hidden>
                                                        <div class="create-project__upload-logo"><img src="/image/iconsFont/add-img_thin.svg" alt="Загрузите фото "></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="create-project__form-img">
                                            <div class="create-project__gallery form__input add-photo">

                                                <div class="create-project__drag-and-drop drag-and-drop">
                                                    <div class="create-project__drag-wrapper drag-wrapper">
                                                        <input type="file" name="file" class="file__input" accept=".jpeg, .jpg, .png" hidden>
                                                        <div class="create-project__upload-logo"><img src="/image/iconsFont/add-img_thin.svg" alt="Загрузите фото "></div>
                                                    </div>
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
                                                    <option value="2">Пункт 1</option>
                                                    <option value="3">Пункт 2</option>
                                                </select>
                                            </div>
                                            <div class="create-project__form-item form__item">
                                                <label for="FormProjectRoleUntil" class="create-project__form-label form__label">До какого числа принимаются заявки</label>
                                                <input id="FormProjectRoleUntil" autocomplete="off" data-datepicker data-datepicker_3 type="text" name="projectName" class="create-project__form-input form__input" placeholder="До 10.09.2023" data-placeholder="До 10.09.2023">
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
                                            <input id="name" type="text" name="projectName" class="create-project__form-input form__input" placeholder="Контакт" data-placeholder="Контакт">
                                        </div>
                                        <div class="create-project__form-item form__item">
                                            <label for="tel" class="create-project__form-label form__label">
                                                Телефон*
                                                <button type="button" data-tippy-content="Укажите телефон контактного лица, которому можно позвонить,
                                                    если возникнут технические вопросы." class="_icon-info"></button>
                                            </label>
                                            <input id="tel" type="text" name="projectName" class="create-project__form-input form__input" placeholder="8 000 000 00 00" data-placeholder="8 000 000 00 00" data-inputmask="'mask': '8 999 999 99 99'">
                                        </div>
                                        <div class="create-project__form-item form__item">
                                            <label for="Femail" class="create-project__form-label form__label">
                                                Почта*
                                            </label>
                                            <input id="email" type="text" name="projectName" class="create-project__form-input form__input" placeholder="Email" data-placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="create-project__buttons">
                                        <!--<a href="#" class="create-project__btn btn btn-white btn-border_black">Удалить</a>-->
                                        <!--<a href="#" class="create-project__btn btn btn-white btn-border_black">Сохранить черновик</a>-->
                                        <button id='store-button' class="create-project__btn btn btn-filled">Сохранить</button>
                                    </div>
                                </div>

                        </div>
                    </div>
                </section>

@endsection















