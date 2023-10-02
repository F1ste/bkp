@extends('layouts.admin')

@section('title', 'Создать услугу')

@section('content')




    <div class="page__container">

        <section data-update="{{ route('admin.faq.update') }}" data-id="{{ $id }}" id='faq_page-edit'
            class="collection section-base create-project personal-account">

            <div class="create-project__container">
                <div data-one-select class="create-project__content">
                    <div class="create-project__title personal__title">Редактировать страницу "Вопрос-ответ</div>
                    <div class="create-project__general-info" style="align-items: flex-start;">
                        <div class="create-project__form-img">
                            <label class="create-project__form-label form__label">Фото на странице "Вопрос-ответ"</label>
                            <div class="create-project__main-photo form__input add-photo">
                                <div data-img="{{ route('admin.faq.img')}}" class="create-project__drag-and-drop drag-and-drop" id='img1'>
                                    @if($faq->img == '')
                                    <div class="create-project__drag-wrapper drag-wrapper" id='img1_box'>
                                        <form id='form_img_1'><input id='img1_input' type="file" name="file" class="file__input" accept=".jpeg, .jpg, .png" hidden></form>
                                        <div class="create-project__upload-logo"><img src="/image/iconsFont/add-img.svg" alt="Загрузите основное фото проекта"></div>
                                        <div class="create-project__upload-info">Загрузите фото</div>
                                    </div>

                                    <img id="img1_fin" class='form_img_cul' style='width: 100%;' src="">
                                    @else

                                     <div style="display: none;" class="create-project__drag-wrapper drag-wrapper" id='img1_box'>
                                        <form id='form_img_1'><input id='img1_input' type="file" name="file" class="file__input" accept=".jpeg, .jpg, .png" hidden></form>
                                        <div class="create-project__upload-logo"><img src="/image/iconsFont/add-img.svg" alt="Загрузите основное фото проекта"></div>
                                        <div class="create-project__upload-info">Загрузите фото</div>
                                    </div>

                                    <img id="img1_fin" class='form_img_cul' style="width: 100%;display: block;" src="{{ $faq->img }}">
                                    @endif
                                </div>
                            </div>
                            <div class="create-project__photo-propetries">550x545 px, до 100 мб</div>
                        </div>
                        <div class="create-project__main-info" style="align-items: flex-start;">
                            <div class="create-project__main-col">
                                <div class="create-project__form-item form__item">
                                    <label for="name" class="create-project__form-label form__label">Заголовок</label>
                                    <input style="width:40%" id="name" type="text" name="quest"
                                        class="create-project__form-input form__input" placeholder="Заголовок"
                                        data-placeholder="Название" value="{{ $faq->title }}">
                                </div>
                                <div class="create-project__project-description">
                                    <div class="create-project__form-item form__item">
                                        <label for="excerpt" class="create-project__form-label form__label">Описание проекта</label>
                                        <textarea id="excerpt" type="text" name="description" class="create-project__form-input form__input project-description" placeholder="Не более 10000 символов" data-placeholder="Не более 10000 символов">{{ $faq->description }}</textarea>
                                    </div>
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
    </section>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="/plugins/ckeditor/ckeditor.js"></script>
    <script src="/plugins/ckfinder/ckfinder.js"></script>
    <script>
      $(document).ready(function(){
        var editor = CKEDITOR.replaceAll();
        CKFinder.setupCKEditor( editor );
      })
    </script>
    <script src="{{ asset('front/js/app.js') }}"></script>
@endsection
