@extends('layouts.admin')

@section('title', 'Создать услугу')

@section('content')




    <div class="page__container">

        <section data-store="{{ route('admin.faq.store') }}" id='faq-store'
            class="collection section-base create-project personal-account">

            <div class="create-project__container">
                <div data-one-select class="create-project__content">
                    <div class="create-project__title personal__title">Вопрос-ответ</div>

                    <div class="create-project__general-info" style="align-items: flex-start;">
                        <div class="create-project__form-img">



                        </div>


                        <div class="create-project__main-info" style="align-items: flex-start;">
                            <div class="create-project__main-col">
                                <div class="create-project__form-img">
                                    <label class="create-project__form-label form__label">Основное фото проекта</label>
                                    <div class="create-project__main-photo form__input add-photo">
                                        <div class="create-project__drag-and-drop drag-and-drop">
                                            <div class="create-project__drag-wrapper drag-wrapper">
                                                <input type="file" name="file" class="file__input" accept=".jpeg, .jpg, .png" hidden>
                                                <div class="create-project__upload-logo"><img src="/image/iconsFont/add-img.svg" alt="фото"></div>
                                                <div class="create-project__upload-info">Фото</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="create-project__photo-propetries">550x545 px, до 100 мб</div>
                                </div>
                                <div class="create-project__form-item form__item">
                                    <label for="name" class="create-project__form-label form__label">Вопрос</label>
                                    <input id="name" type="text" name="title"
                                        class="create-project__form-input form__input" placeholder="Название"
                                        data-placeholder="Название">
                                </div>
                                <div class="create-project__project-description">
                                    <div class="create-project__form-item form__item">
                                        <label for="excerpt" class="create-project__form-label form__label">Ответ</label>
                                        <textarea id="excerpt" type="text" name="description"
                                            class="create-project__form-input form__input project-description" placeholder="Не более 10000 символов"
                                            data-placeholder="Не более 10000 символов"></textarea>
                                    </div>
                                </div>


                            </div>

                        </div>

                    </div>
                </div>




                <div class="create-project__footer">

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

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="/plugins/ckeditor/ckeditor.js"></script>
<script src="/plugins/ckfinder/ckfinder.js"></script>
<script>
    $(document).ready(function() {
        var editor = CKEDITOR.replaceAll();
        CKFinder.setupCKEditor(editor);
    })
</script>
<script src="{{ asset('front/js/app.js') }}"></script>