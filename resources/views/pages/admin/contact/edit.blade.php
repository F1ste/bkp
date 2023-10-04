@extends('layouts.admin')

@section('title', 'Создать услугу')

@section('content')




    <div class="page__container">

        <section data-update="{{ route('admin.contact.update') }}" data-id="{{ $id }}" id='contact-edit'
            class="collection section-base create-project personal-account">

            <div class="create-project__container">
                <div data-one-select class="create-project__content">
                    <div class="create-project__title personal__title">Редактировать страницу "Контакты"</div>
                    <div class="create-project__general-info" style="align-items: flex-start;">
                                <div class="create-project__project-description">
                                    <div class="create-project__form-item form__item">
                                        <label for="description" class="create-project__form-label form__label">Описание </label>
                                        <textarea id="description" type="text" name="description" class="create-project__form-input form__input project-description" placeholder="Не более 10000 символов" data-placeholder="Не более 10000 символов">{{ $contact->description }}</textarea>
                                    </div>
                                </div>
                                <div class="create-project__add-code">
                                    <div class="create-project__form-item form__item">
                                        <label for="video" class="create-project__form-label form__label">Код видео
                                            <button type="button" data-tippy-content="Вставьте код (frame) видео. Плееры, которые поддерживает платформа:
                                                 class="_icon-info"></button>
                                        </label>
                                        <textarea id="video" type="text" name="map" class="create-project__form-input form__input add-code" placeholder="Добавьте код встраивания плеера трансляции" data-placeholder="Не более 10000 символов">{{$contact->map}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                                    <div class="create-project__footer">
                    
                                        <div class="create-project__buttons">
                                            <!--<a href="#" class="create-project__btn btn btn-white btn-border_black">Сохранить черновик</a>-->
                                            <button  id='store-button' class="create-project__btn btn btn-filled">Редактировать</button>
                                        </div>
                                    </div>
                </div>




            </div>
    </div>
    </section>

@endsection
