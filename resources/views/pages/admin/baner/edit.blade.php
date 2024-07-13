@extends('layouts.admin')

@section('title', 'Редактировать рекламный баннер')

@section('content')
    <div class="page__container" style="min-height: 100vh;">
        <section data-update="{{ route('admin.banners.update', $collection) }}" data-id="{{ $id }}" id='banner-edit' class="collection section-base create-project personal-account">

            <div class="create-project__container">
                <div data-one-select class="create-project__content">
                    <div class="create-project__title personal__title">Редактировать рекламный баннер</div>

                    <div class="create-project__general-info" style="align-items: flex-start;">
                        <div class="create-project__form-img">
                            <label class="create-project__form-label form__label">Фото баннера</label>
                            <div class="create-project__main-photo form__input add-photo">
                                <div data-img="{{ route('admin.news.img1') }}" class="create-project__drag-and-drop drag-and-drop" id='img1'>
                                @if ($collection->img == '')
                                    <div class="create-project__drag-wrapper drag-wrapper" id='img1_box'>
                                        <form id='form_img_1'><input id='img1_input' type="file" name="file" class="file__input" accept=".jpeg, .jpg, .png" hidden></form>
                                        <div class="create-project__upload-logo"><img src="/image/iconsFont/add-img.svg" alt="Загрузите основное фото проекта"></div>
                                        <div class="create-project__upload-info">Загрузите основное фото</div>
                                    </div>

                                    <img id="img1_fin" class='form_img_cul' style="width: 100%;" src="">
                                @else
                                    <div style="display: none;" class="create-project__drag-wrapper drag-wrapper" id='img1_box'>
                                        <form id='form_img_1'><input id='img1_input' type="file" name="file" class="file__input" accept=".jpeg, .jpg, .png" hidden></form>
                                        <div class="create-project__upload-logo"><img src="/image/iconsFont/add-img.svg" alt="Загрузите основное фото проекта"></div>
                                        <div class="create-project__upload-info">Загрузите основное фото</div>
                                    </div>

                                    <img id="img1_fin" class='form_img_cul' style="display: block; width: 100%;" src="{{ $collection->img }}">
                                @endif
                                </div>
                            </div>
                        </div>

                        <div class="create-project__main-info" style="align-items: flex-start;">
                            <div class="create-project__main-col">
                                <div class="create-project__form-item form__item">
                                    <label for="name" class="create-project__form-label form__label">Ссылка баннера</label>
                                    <input id="name" type="text" name="projectName" class="create-project__form-input form__input" placeholder="Ссылка баннера" data-placeholder="Ссылка баннера" value="{{ $collection->name }}">
                                </div>
                                <div>
                                    <div class="create-project__form-item create-project__form-group form__item">
                                        <input id="advertisement" type="checkbox" class="checkbox__input" name="advertisement" {{ $collection->advertisement ? 'checked' : '' }}>
                                        <label for="advertisement" class="create-project__form-label checkbox__label">Реклама</label>
                                    </div>
                                    <div class="create-project__form-row">
                                        <div class="create-project__form-item form__item">
                                            <label for="orgName" class="create-project__form-label form__label">Название организации</label>
                                            <input id="orgName" type="text" name="org_name" class="create-project__form-input form__input" placeholder="Название организации" data-placeholder="Название организации" value="{{ $collection->org_name }}">
                                        </div>
                                        <div class="create-project__form-item form__item">
                                            <label for="orgINN" class="create-project__form-label form__label">ИНН организации</label>
                                            <input id="orgINN" type="number" name="orn_inn" class="create-project__form-input form__input remove-arrows" placeholder="ИНН организации" data-placeholder="ИНН организации" value="{{ $collection->org_inn }}">
                                        </div>
                                        <div class="create-project__form-item form__item">
                                            <label for="erid" class="create-project__form-label form__label">erid</label>
                                            <input id="erid" type="text" name="erid" class="create-project__form-input form__input" placeholder="erid" data-placeholder="erid" value="{{ $collection->erid }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="create-project__footer">
                    <div class="create-project__buttons">
                        <a data-del="{{ route('admin.banners.destroy', $collection) }}" style="cursor: pointer;" id="del-button" class="create-project__btn btn btn-white btn-border_black">Удалить</a>
                        <button id='store-button' class="create-project__btn btn btn-filled">Сохранить</button>
                    </div>
                </div>
            </div>
        </section>
    </div>

    {{-- Переключение активности элементов форм рекламы --}}
    <script>
        (function() {
            let adv = document.querySelector('#advertisement');
            adv.addEventListener('change', function(e) {
                let checked = e.target.checked;
                Array.from(document.querySelectorAll('#orgName, #orgINN, #erid')).forEach(input => {
                    input.disabled = !checked;
                    input.parentNode.style.display = checked ? null : 'none';
                })
            });
            adv.dispatchEvent(new Event("change"));
        })();
    </script>
@endsection
