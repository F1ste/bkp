@extends('layouts.admin')

@section('title', 'Редактировать услугу')

@section('content')
    <div class="page__container">
        <section data-image="{{ route('admin.news.img7') }}" data-id="{{ $id }}" data-update="{{ route('admin.news.update', $collection) }}" id='news-edit' class="collection section-base create-project personal-account">
            <div class="create-project__container">
                <div data-one-select class="create-project__content">
                    <div class="create-project__title personal__title">Создание новости</div>

                    <div class="create-project__general-info">
                        <div class="create-project__form-img">

                            <label class="create-project__form-label form__label">Изображение превью</label>
                            <div class="create-project__main-photo form__input add-photo">
                                <div data-img="{{ route('admin.news.img1') }}" class="create-project__drag-and-drop drag-and-drop" id='img1'>
                                @if ($collection->img == '')
                                    <div class="create-project__drag-wrapper drag-wrapper" id='img1_box'>
                                        <form id='form_img_1'><input id='img1_input' type="file" name="file" class="file__input" accept=".jpeg, .jpg, .png" hidden></form>
                                        <div class="create-project__upload-logo"><img src="/image/iconsFont/add-img.svg" alt="Загрузите превью новости"></div>
                                        <div class="create-project__upload-info">Загрузите превью новости</div>
                                    </div>

                                    <img id="img1_fin" class='form_img_cul' style="width: 100%;" src="">
                                    <button id="img1_delete" class="delete-img__button" style="display: none;"></button>
                                @else
                                    <div style="display: none;" class="create-project__drag-wrapper drag-wrapper" id='img1_box'>
                                        <form id='form_img_1'><input id='img1_input' type="file" name="file" class="file__input" accept=".jpeg, .jpg, .png" hidden></form>
                                        <div class="create-project__upload-logo"><img src="/image/iconsFont/add-img.svg" alt="Загрузите превью новости"></div>
                                        <div class="create-project__upload-info">Загрузите превью новости</div>
                                    </div>
                                    <img id="img1_fin" class='form_img_cul' style="display: block; width: 100%;" src="{{ $collection->img }}">
                                    <button id="img1_delete" class="delete-img__button"></button>
                                @endif
                                </div>
                            </div>

                            <label class="create-project__form-label form__label" style="display: block; margin-top: 10px;">Изображение на странице</label>
                            <div class="create-project__main-photo form__input add-photo">
                                <div data-img="{{ route('admin.news.img7') }}" class="create-project__drag-and-drop drag-and-drop" id='img7'>
                                @if ($collection->img7 == '')
                                    <div class="create-project__drag-wrapper drag-wrapper" id='img7_box'>
                                        <form id='form_img_7'><input id='img7_input' type="file" name="file" class="file__input" accept=".jpeg, .jpg, .png" hidden></form>
                                        <div class="create-project__upload-logo"><img src="/image/iconsFont/add-img.svg" alt="Загрузите изображение на странице"></div>
                                        <div class="create-project__upload-info">Загрузите изображение на странице</div>
                                    </div>

                                    <img id="img7_fin" class='form_img_cul' style="width: 100%;" src="">
                                    <button id="img7_delete" class="delete-img__button" style="display: none;"></button>
                                @else
                                    <div style="display: none;" class="create-project__drag-wrapper drag-wrapper" id='img7_box'>
                                        <form id='form_img_7'><input id='img7_input' type="file" name="file" class="file__input" accept=".jpeg, .jpg, .png" hidden></form>
                                        <div class="create-project__upload-logo"><img src="/image/iconsFont/add-img.svg" alt="Загрузите изображение на странице"></div>
                                        <div class="create-project__upload-info">Загрузите изображение на странице</div>
                                    </div>

                                    <img id="img7_fin" class='form_img_cul' style="display: block; width: 100%;" src="{{ $collection->img7 }}">
                                    <button id="img7_delete" class="delete-img__button"></button>
                                @endif
                                </div>
                            </div>
                        </div>
                        <div class="create-project__main-info" style="align-items: flex-start;">
                            <div class="create-project__main-col">
                                <div class="create-project__form-item form__item">
                                    <label for="name" class="create-project__form-label form__label">Название новости</label>
                                    <input id="name" type="text" name="projectName" class="create-project__form-input form__input" placeholder="Название новости" data-placeholder="Название новости" value="{{ $collection->name }}">
                                </div>

                                <div class="create-project__add-code">
                                    <div class="create-project__form-item form__item">
                                        <label for="pod_text" class="create-project__form-label form__label">
                                            Краткое описание новости
                                        </label>
                                        <textarea style="height: 155px;" id="pod_text" type="text" name="addCode" class="create-project__form-input form__input add-code" placeholder="ДКраткое описание новости" data-placeholder="Не более 10000 символов">{{ $collection->pod_text }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="create-project__main-col">
                                <div class="create-project__form-select">
                                    <label class="create-project__form-label form__label">Проект</label>
                                    <select id="project" data-scroll name="form[]" class="form__select">
                                        <option value="" selected>Выбрать</option>
                                    @foreach ($collections as $el)
                                        <option value="{{ $el->name_proj }}" @if ($collection->project == $el->name_proj) selected @endif>{{ $el->name_proj }}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="create-project__form-select">
                                    <label class="create-project__form-label form__label">Рубрика</label>
                                    <select id="rubrica" data-scroll name="form[]" class="form__select">
                                        <option value="" selected>Выбрать</option>
                                    @foreach ($newsr as $el)
                                        <option value="{{ $el->name }}" @if ($collection->rubrica == $el->name) selected @endif>{{ $el->name }}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="create-project__form-select">
                                    <label class="create-project__form-label form__label">Рекламный баннер</label>
                                    <select id="banner" data-scroll name="form[]" class="form__select">
                                        <option value="" selected>Выбрать</option>
                                    @foreach ($banner as $el)
                                        <option value="{{ $el->name }}" @if ($collection->banner == $el->name) selected @endif>{{ $el->name }}</option>
                                    @endforeach
                                    </select>
                                </div>

                                <div class="create-project__form-item form__item">
                                    <label for="date" class="create-project__form-label form__label">Дата публикации</label>
                                    <input data-datepicker data-datepicker_1 id="date" type="text" name="projectName" class="create-project__form-input form__input" placeholder="Дата" data-placeholder="Дата" value="{{ Carbon\Carbon::parse($collection->date)->format('d.m.Y') }}">
                                </div>

                                <div class="create-project__form-select">
                                    <label class="create-project__form-label form__label">Выводить на главную</label>
                                    <select id="glav" data-scroll name="form[]" class="form__select">
                                        <option value="0">Нет</option>
                                        <option value="1" @if ($collection->glav == 1) selected @endif>Топ 1</option>
                                        <option value="2"@if ($collection->glav == 2) selected @endif>Топ 2</option>
                                        <option value="3"@if ($collection->glav == 3) selected @endif>Топ 3</option>
                                    </select>
                                </div>
                                <div class="create-project__form-select">
                                    <label class="create-project__form-label form__label">Позиция в Новостях</label>
                                    <select id="pozits" data-scroll name="form[]" class="form__select">
                                        <option value="0">Нет</option>
                                        <option value="1" @if ($collection->pozits == 1) selected @endif>Топ 1</option>
                                        <option value="2" @if ($collection->pozits == 2) selected @endif>Топ 2</option>
                                        <option value="3" @if ($collection->pozits == 3) selected @endif>Топ 3</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="create-project__description">
                        <div class="create-project__project-description">
                            <div class="create-project__form-item form__item">
                                <label for="text" class="create-project__form-label form__label">Текст новости</label>
                                <textarea id="text" type="text" name="projectDescription" class="create-project__form-input form__input project-description" placeholder="Текст новости" data-placeholder="Не более 10000 символов">{{ $collection->text }}</textarea>
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
                                        <button id="img6_delete" class="delete-img__button" style="display: none;"></button>
                                    </div>
                                @endif
                                </div>
                            </div>
                            <div class="create-project__add-code">
                                <div class="create-project__form-item form__item">
                                    <label for="video" class="create-project__form-label form__label">Код видео
                                        <button type="button" data-tippy-content="Вставьте код (frame) видео. Плееры, которые поддерживает платформа: YouTube, RuTube, «ВКонтакте» или «Одноклассники»" class="_icon-info"></button>
                                    </label>
                                    <textarea id="video" type="text" name="addCode" class="create-project__form-input form__input add-code" placeholder="Добавьте код встраивания плеера трансляции" data-placeholder="Не более 10000 символов">{{ $collection->video }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="create-project__footer">
                        <div class="create-project__buttons">
                            <a data-del="{{ route('admin.news.destroy', $collection) }}" style="cursor: pointer;" id="del-button" class="create-project__btn btn btn-white btn-border_black">Удалить</a>
                            <button id='store-button' class="create-project__btn btn btn-filled">Сохранить</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
