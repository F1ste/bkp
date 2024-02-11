@extends('layouts.admin')

@section('title', 'Создать услугу')

@section('content')
    <div class="page__container" style="min-height: 100vh">

        <form enctype="multipart/form-data" method="POST" action="/admin/user/{{ request()->route('id') }}/update" class="collection section-base create-project personal-account">
            @csrf
            <div class="create-project__container">
                <div data-one-select class="create-project__content">
                    <div class="create-project__title personal__title">Создать тег</div>
                    <div class="create-project__general-info" style="align-items: flex-start;">
                        <div class="create-project__form-img"></div>
                        <div class="create-project__main-info" style="align-items: flex-start;">
                            <div class="create-project__main-col">
                                <div class="create-project__form-item form__item">
                                    <label for="rating" class="create-project__form-label form__label">Рейтинг пользователя</label>
                                    <select class="form-control" value="{{ $user->rating }}" id="rating" name="rating">
                                    @foreach ($user_rating as $item)
                                        <option value="{{ $item }}" {{ $user->rating == $item ? 'selected' : '' }}> {{ $item }}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="create-project__footer">
                    <div class="create-project__buttons">
                        <button type="submit" class="create-project__btn btn btn-filled">Сохранить</button>
                    </div>
                </div>

            </div>
        </form>
    </div>
@endsection
