@extends('layouts.admin')

@section('title', 'Создать услугу')

@section('content')
    <div class="page__container">
        <section data-image="{{ route('admin.news.img1') }}" data-store="{{ route('admin.news.store') }}" id='news-store' class="collection section-base create-project personal-account">
            <div class="create-project__container">
                <div data-one-select class="create-project__content">
                    <div class="create-project__title personal__title">Создание новости</div>

                    <div class="create-project__general-info" style="align-items: flex-start;">
                        <div class="create-project__form-img">

                            <label class="create-project__form-label form__label">Основное фото новости</label>
                            <div class="create-project__main-photo form__input add-photo">
                                <div data-img="{{ route('admin.news.img1') }}" class="create-project__drag-and-drop drag-and-drop" id='img1'>
                                    <div class="create-project__drag-wrapper drag-wrapper" id='img1_box'>
                                        <form id='form_img_1'><input id='img1_input' type="file" name="file" class="file__input" accept=".jpeg, .jpg, .png" hidden></form>
                                        <div class="create-project__upload-logo"><img src="/image/iconsFont/add-img.svg" alt="Загрузите основное фото проекта"></div>
                                        <div class="create-project__upload-info">Загрузите основное фото новости</div>
                                    </div>

                                    <img id="img1_fin" class='form_img_cul' style="width: 100%;" src="">
                                    <button id="img1_delete" class="delete-img__button" style="display: none;"></button>
                                </div>
                            </div>
                            <div class="create-project__photo-propetries">950x310 px, до 1 Мб</div>

                            <label class="create-project__form-label form__label">Дополнительное фото</label>
                            <div class="create-project__main-photo form__input add-photo">
                                <div data-img="{{ route('admin.news.img1') }}" class="create-project__drag-and-drop drag-and-drop" id='img7'>
                                    <div class="create-project__drag-wrapper drag-wrapper" id='img7_box'>
                                        <form id='form_img_7'><input id='img7_input' type="file" name="file" class="file__input" accept=".jpeg, .jpg, .png" hidden></form>
                                        <div class="create-project__upload-logo"><img src="/image/iconsFont/add-img.svg" alt="Загрузите основное фото проекта"></div>
                                        <div class="create-project__upload-info">Загрузите дополнительное новости</div>
                                    </div>

                                    <img id="img7_fin" class='form_img_cul' style="width: 100%;" src="">
                                    <button id="img7_delete" class="delete-img__button" style="display: none;"></button>
                                </div>
                            </div>

                        </div>

                        <div class="create-project__main-info" style="align-items: flex-start;">
                            <div class="create-project__main-col">
                                <div class="create-project__form-item form__item">
                                    <label for="name" class="create-project__form-label form__label">Название новости</label>
                                    <input id="name" type="text" name="projectName" class="create-project__form-input form__input" placeholder="Название новости" data-placeholder="Название новости">
                                </div>

                                <div class="create-project__add-code">
                                    <div class="create-project__form-item form__item">
                                        <label for="pod_text" class="create-project__form-label form__label">Краткое описание новости</label>
                                        <textarea style="height: 155px;" id="pod_text" type="text" name="addCode" class="create-project__form-input form__input add-code" placeholder="ДКраткое описание новости" data-placeholder="Не более 10000 символов"></textarea>
                                    </div>
                                </div>

                            </div>
                            <div class="create-project__main-col">

                                <div class="create-project__form-select">
                                    <label class="create-project__form-label form__label">Проект</label>
                                    <select id="project" data-scroll name="form[]" class="form__select">
                                        <option value="" selected>Выбрать</option>
                                    @foreach ($collection as $el)
                                        <option value="{{ $el->name_proj }}">{{ $el->name_proj }}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="create-project__form-select">
                                    <label class="create-project__form-label form__label">Рубрика</label>
                                    <select id="rubrica" data-scroll name="form[]" class="form__select">
                                        <option value="" selected>Выбрать</option>
                                    @foreach ($newsr as $el)
                                        <option value="{{ $el->name }}">{{ $el->name }}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="create-project__form-select">
                                    <label class="create-project__form-label form__label">Рекламный баннер</label>
                                    <select id="banner" data-scroll name="form[]" class="form__select">
                                        <option value="" selected>Выбрать</option>
                                    @foreach ($banner as $el)
                                        <option value="{{ $el->name }}">{{ $el->name }}</option>
                                    @endforeach
                                    </select>
                                </div>

                                <div class="create-project__form-item form__item">
                                    <label for="date" class="create-project__form-label form__label">Дата публикации</label>
                                    <input data-datepicker data-datepicker_1 id="date" type="text" name="projectName" class="create-project__form-input form__input" placeholder="Дата" data-placeholder="Дата">
                                </div>

                                <div class="create-project__form-select">
                                    <label class="create-project__form-label form__label">Выводить на главную</label>
                                    <select id="glav" data-scroll name="form[]" class="form__select">
                                        <option value="0">Нет</option>
                                        <option value="1">Топ 1</option>
                                        <option value="2">Топ 2</option>
                                        <option value="3">Топ 3</option>
                                    </select>
                                </div>
                                <div class="create-project__form-select">
                                    <label class="create-project__form-label form__label">Позиция в Новостях</label>
                                    <select id="pozits" data-scroll name="form[]" class="form__select">
                                        <option value="0">Нет</option>
                                        <option value="1">Топ 1</option>
                                        <option value="2">Топ 2</option>
                                        <option value="3">Топ 3</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="create-project__description">
                        <div class="create-project__project-description">
                            <div class="create-project__form-item form__item">
                                <label for="text" class="create-project__form-label form__label">Текст новости</label>
                                <textarea id="text" type="text" name="projectDescription" class="create-project__form-input form__input project-description" placeholder="Текст новости" data-placeholder="Не более 10000 символов"></textarea>
                            </div>
                        </div>
                        <div class="create-project__project-gallery">
                            <div class="create-project__form-img">
                                <label class="create-project__form-label form__label">Галерея новости</label>
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
                                        <button type="button" data-tippy-content="Вставьте код (frame) видео. Плееры, которые поддерживает платформа: YouTube, RuTube, «ВКонтакте» или «Одноклассники»" class="_icon-info"></button>
                                    </label>
                                    <textarea id="video" type="text" name="addCode" class="create-project__form-input form__input add-code" placeholder="Добавьте код встраивания плеера трансляции" data-placeholder="Не более 10000 символов"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="create-project__footer">
                        <div class="create-project__buttons">
                            <button id='store-button' class="create-project__btn btn btn-filled">Сохранить</button>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>
@endsection
