@extends('layouts.admin')

@section('title', 'Создать услугу')

@section('content')




            <div class="page__container" style="min-height: 100vh;">

                <section data-update="{{ route('admin.banner.edit') }}" data-id="{{ $id }}" id='banner-edit' class="collection section-base create-project personal-account">

                    <div class="create-project__container">
                        <div data-one-select class="create-project__content">
                            <div class="create-project__title personal__title">Создать рекламный баннер</div>

                                <div class="create-project__general-info" style="align-items: flex-start;">
                                    <div class="create-project__form-img">


                                        <label class="create-project__form-label form__label">Фото баннера</label>
                                        <div  class="create-project__main-photo form__input add-photo">
                                            <div data-img="{{ route('admin.news.img1') }}" class="create-project__drag-and-drop drag-and-drop" id='img1'>
                                                 @if($collection->img == '')
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


                                        </div>

                                        </div>

                                    </div>
                                </div>




                                <div class="create-project__footer">

                                    <div class="create-project__buttons">
                                        <a data-del="{{ route('admin.banner.delete') }}" style="cursor: pointer;" id="del-button" class="create-project__btn btn btn-white btn-border_black">Удалить</a>
                                        <!--<a href="#" class="create-project__btn btn btn-white btn-border_black">Сохранить черновик</a>-->
                                        <button id='store-button' class="create-project__btn btn btn-filled">Сохранить</button>
                                    </div>
                                </div>

                        </div>
                    </div>
                </section>

@endsection















