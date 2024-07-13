@extends('layouts.admin')

@section('title', 'Пользователи')

@section('content')
    <div class="page__container" style="min-height: 100vh;">
        <section class="my-projects personal-account">
            <div class="my-projects__container">
                <div class="my-projects__content">
                    <div class="my-projects__heading block-heading">
                        <div class="my-projects__title personal__title">
                            Пользователи
                        </div>
                    </div>
                    <form data-one-select class="dashboard-filters" method="GET" style="margin-bottom: 30px;">
                        <div class="dashboard-filters__row">
                            <div class="serch_news form__item">
                                <label class="dashboard-filters__form-label form__label">Сортировка</label>
                                <select id="sort_by" data-scroll name="sort_by" class="form__select">
                                    <option value="" selected>Выбрать</option>
                                    <option value="created_at">По дате регистрации</option>
                                    <option value="rating">По рейтингу</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="dashboard-filters__btn btn-search btn btn-white" style="margin-top: 30px">Применить фильтр</button>
                    </form>

                    <div style="display: flex;justify-content: space-between;margin-top: 20px;"></div>

                    <div style="margin-top: 20px; margin-bottom: 20px;">
                        @foreach ($user as $el)
                            <div class="my-projects__item" style="margin-bottom: 15px;">
                                <a href="{{ route('admin.user.edit', ['id' => $el->id]) }}">
                                    <div class="my-projects__project-name">
                                        {{ $el->email }}
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    {{ $user->withQueryString()->links('pagination::default') }}
                </div>
            </div>
        </section>
    </div>

    <script>
        (() => {
            let formElement = document.querySelector(".dashboard-filters");
            let selectElement = document.getElementById("sort_by");

            formElement.addEventListener("submit", function(event) {
                event.preventDefault(); // Предотвращаем отправку формы по умолчанию

                let selectedValue = selectElement.value;

                if (selectedValue === "created_at") {
                    formElement.action = "?created_at";
                } else if (selectedValue === "rating") {
                    formElement.action = "?rating";
                } else {
                    // Если выбрано значение по умолчанию или другое, можно установить свой action по умолчанию
                    formElement.action = "/default_action"; // Замените "/default_action" на свой путь по умолчанию
                }

                formElement.submit(); // Отправляем форму с обновленным action
            });
        })();
    </script>
@endsection
