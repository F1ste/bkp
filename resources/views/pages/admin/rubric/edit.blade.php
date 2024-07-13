@extends('layouts.admin')

@section('title', 'Создать рубрику')

@section('content')
    <div class="page__container">
        <section class="collection section-base create-project personal-account">
            <div class="create-project__container">
                <div data-one-select class="create-project__content">
                    <div class="create-project__title personal__title">Создать рубрику</div>
                    <div class="create-project__general-info" style="align-items: flex-start;">
                        <form id="store-form" action="{{ route('admin.news.categories.update', $collection) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="create-project__form-img"></div>
                            <div class="create-project__main-info" style="align-items: flex-start;">
                                <div class="create-project__main-col">
                                    <div class="create-project__form-item form__item">
                                        <label for="name" class="create-project__form-label form__label">Название</label>
                                        <input id="name" type="text" name="name" class="create-project__form-input form__input" placeholder="Название" data-placeholder="Название" value="{{ old('name', $collection->name ?? '') }}">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="create-project__footer">
                    <div class="create-project__buttons">
                        <form action="{{ route('admin.news.categories.destroy', $collection) }}" method="POST" onsubmit="return confirm('Вы уверены, что хотите удалить элемент?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="cursor: pointer;" class="create-project__btn btn btn-white btn-border_black">Удалить</button>
                        </form>
                        <button type="submit" form="store-form" class="create-project__btn btn btn-filled">Сохранить</button>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
