@extends('layouts.admin')

@section('title', 'Создать тег')

@section('content')
    <div class="page__container">
        <section data-store="{{ route('admin.projects.tags.store') }}" id='teg-store' class="collection section-base create-project personal-account">
            <div class="create-project__container">
                <div data-one-select class="create-project__content">
                    <div class="create-project__title personal__title">Создать тег</div>

                    <div class="create-project__general-info" style="align-items: flex-start;">
                        <form action="{{ route('admin.projects.tags.store') }}" method="POST" id="store-form">
                            @csrf
                            <div class="create-project__main-info" style="align-items: flex-start;">
                                <div class="create-project__main-col">
                                    <div class="create-project__form-item form__item">
                                        <label for="name" class="create-project__form-label form__label">Название</label>
                                        <input id="name" type="text" name="name" class="create-project__form-input form__input" placeholder="Название" required>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="create-project__footer">
                    <div class="create-project__buttons">
                        <button form="store-form" type="submit" class="create-project__btn btn btn-filled">Сохранить</button>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
