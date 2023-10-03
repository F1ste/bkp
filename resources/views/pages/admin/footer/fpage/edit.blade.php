@extends('layouts.admin')

@section('title', 'Создать услугу')

@section('content')




    <div class="page__container">

        <section data-update="{{ route('admin.fpage.edit') }}" data-id="{{ $id }}" id='fpage-edit'
            class="collection section-base create-project personal-account">

            <div class="create-project__container">
                <div data-one-select class="create-project__content">
                    <div class="create-project__title personal__title">Создать страницу для футера </div>

                    <div class="create-project__general-info" style="align-items: flex-start;">
                        <div class="create-project__form-img">
                        </div>
                        <div class="create-project__main-info" style="align-items: flex-start;">
                            <div class="create-project__main-col">
                                <div class="create-project__form-item form__item">
                                    <label for="link" class="create-project__form-label form__label">Ссылка на
                                        страницу</label>
                                    <input id="link" type="text" name="link"
                                        class="create-project__form-input form__input" placeholder="Ссылка"
                                        data-placeholder="Ссылка" value="{{$fpage->link}}"> 
                                </div>
                            </div>
                            <div class="create-project__main-col">
                                <div class="create-project__form-item form__item">
                                    <label for="page" class="create-project__form-label form__label">Название
                                        страницы</label>
                                    <input id="page" type="text" name="page"
                                        class="create-project__form-input form__input" placeholder="Название"
                                        data-placeholder="Название" value="{{$fpage->page}}">
                                </div>
                            </div>

                        </div>

                    </div>




                    <div class="create-project__footer">

                        <div class="create-project__buttons">
                            <a data-del="{{ route('admin.tema.delete') }}" style="cursor: pointer;" id="del-button"
                                class="create-project__btn btn btn-white btn-border_black">Удалить</a>
                            <!--<a href="#" class="create-project__btn btn btn-white btn-border_black">Сохранить черновик</a>-->
                            <button id='store-button' class="create-project__btn btn btn-filled">Сохранить</button>
                        </div>
                    </div>

                </div>
            </div>
        </section>

    @endsection
