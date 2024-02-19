@extends('layouts.admin')

@section('title', 'Создать услугу')

@section('content')
    <div class="page__container">
        <section data-store="{{ route('admin.news.categories.store') }}" id='rubric-store' class="collection section-base create-project personal-account">
            <div class="create-project__container">
                <div data-one-select class="create-project__content">
                    <div class="create-project__title personal__title">Создать Рубрику</div>

                    <div class="create-project__general-info" style="align-items: flex-start;">
                        <form id="store-form" action="{{ route('admin.news.categories.store') }}" method="POST">
                            @csrf
                            <div class="create-project__form-img"></div>
                            <div class="create-project__main-info" style="align-items: flex-start;">
                                <div class="create-project__main-col">
                                    <div class="create-project__form-item form__item">
                                        <label for="name" class="create-project__form-label form__label">Название</label>
                                        <input id="name" type="text" name="name" class="create-project__form-input form__input" placeholder="Название" data-placeholder="Название" value="{{ old('name') }}">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="create-project__footer">
                    <div class="create-project__buttons">
                        <button type="submit" form="store-form" class="create-project__btn btn btn-filled">Сохранить</button>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
