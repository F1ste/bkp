@extends('layouts.admin')

@section('title', 'Создать описание футера')

@section('content')
    <div class="page__container" style="min-height: 100vh;">
        <section data-update="{{ route('admin.fdescr.update') }}" data-id="{{ $id }}" id='fdescr-edit' class="collection section-base create-project personal-account">
            <div class="create-project__container">
                <div data-one-select class="create-project__content">
                    <div class="create-project__title personal__title">Создать описание футера</div>
                    <div class="create-project__general-info" style="align-items: flex-start;">
                        <div class="create-project__main-info" style="align-items: flex-start;">
                            <div class="create-project__project-description" style="width: 100%;">
                                <div class="create-project__form-item form__item">
                                    <label for="descr" class="create-project__form-label form__label">Описание</label>
                                    <textarea id="descr" type="text" name="descr" class="create-project__form-input form__input project-description" placeholder="Не более 10000 символов" data-placeholder="Не более 10000 символов" value="{{ $fdescr->descr }}">{{ $fdescr->descr }}</textarea>
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
