@extends('layouts.admin')

@section('title', 'Новости')

@section('content')
    <style>
        @media (max-width: 768px) {
            .my-projects__content {
                padding: 15px;
            }
        }
    </style>

    <div class="page__container" style="min-height: 100vh; margin-bottom: 30px;">
        <section class="my-projects personal-account">
            <div class="my-projects__container">
                <div class="my-projects__content" style="">
                    <div class="my-projects__heading block-heading">
                        <div class="my-projects__title personal__title">
                            Новости
                        </div>
                    </div>
                    <form data-one-select class="dashboard-filters" method="GET" style="margin-bottom: 30px;">
                        <div class="dashboard-filters__row">
                            <div class="search-wrapper">
                                <label class="dashboard-filters__form-label form__label">Поиск</label>
                                <div class="search-item form-item">
                                    <input type="text" name="name" class="form__input _icon-search" placeholder="Найти...">
                                    <button type="submit" class="search-submit _icon-search"></button>
                                </div>
                            </div>
                            <div class="dashboard-filters__datepicker form__item">
                                <label class="dashboard-filters__form-label form__label">Сроки
                                    начала проекта</label>
                                <input id="dateFrom" autocomplete="off" data-datepicker data-datepicker_1 type="text" name="date" class="dashboard-filters__form-input form__input" placeholder="C" data-placeholder="C">
                            </div>
                            <div class="dashboard-filters__datepicker form__item">
                                <label class="dashboard-filters__form-label form__label">Сроки
                                    окончания проекта</label>
                                <input id="dateTo" autocomplete="off" data-datepicker data-datepicker_2 type="text" name="dateTo" class="dashboard-filters__form-input form__input" placeholder="До" data-placeholder="До">
                            </div>
                            <div data-da=".dashboard-filters, 1440" class="dashboard-filters__buttons">
                                <button type="submit" class="dashboard-filters__btn btn-search btn btn-white">Поиск</button>
                                <a href="{{ route('admin.news.new') }}" class="dashboard-filters__btn btn-create btn btn-filled">Создать новость</a>
                            </div>
                        </div>

                        <div class="dashboard-filters__row">
                            <div class="serch_news form__item">
                                <label class="dashboard-filters__form-label form__label">Проект</label>
                                <select id="project" data-scroll name="project" class="form__select">
                                    <option value="" selected>Выбрать</option>
                                    @foreach ($projects as $el)
                                        <option value="{{ $el }}">{{ $el }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="serch_news form__item">
                                <label class="dashboard-filters__form-label form__label">Рубрика</label>
                                <select id="category" data-scroll name="rubrica" class="form__select">
                                    <option value="" selected>Выбрать</option>
                                    @foreach ($newsr as $el)
                                        <option value="{{ $el->name }}">{{ $el->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="serch_news form__item">
                                <label class="dashboard-filters__form-label form__label">На
                                    главной</label>
                                <select id="onHome" data-scroll name="glav" class="form__select">
                                    <option value="" selected>Выбрать</option>
                                    <option value="1">Да</option>
                                </select>
                            </div>
                            <div class="serch_news form__item">
                                <label class="dashboard-filters__form-label form__label">Опубликован</label>
                                <select id="status" data-scroll name="status" class="form__select">
                                    <option value="" selected>Выбрать</option>
                                    <option value="1">Да</option>
                                    <option value="1">Нет</option>
                                </select>
                            </div>
                        </div>
                    </form>

                    <div style="margin-top: 20px; margin-bottom: 20px;">
                        @foreach ($collections as $el)
                            <div class="my-projects__item" style="margin-bottom: 15px;">
                                <a href="{{ route('admin.news.single', ['id' => $el->id]) }}">
                                    <div class="my-projects__project-name">
                                        {{ $el->name }}
                                    </div>

                                </a>
                            </div>
                        @endforeach
                    </div>

                    {{ $collections->withQueryString()->links('pagination::default') }}
                </div>
            </div>
        </section>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const form = document.querySelector(".dashboard-filters");
            form.addEventListener("submit", function(event) {
                event.preventDefault(); // Отменяем стандартное действие формы

                // Получаем значения из инпутов
                const name = document.querySelector("input[name='name']").value;
                const dateFrom = document.querySelector("input[name='date']").value;
                const dateTo = document.querySelector("input[name='dateTo']").value;
                const project = document.querySelector("#project").value;
                const category = document.querySelector("#category").value;
                const onHome = document.querySelector("#onHome").value;
                const status = document.querySelector("#status").value;

                // Создаем массив для хранения параметров
                let params = [];

                if (name) {
                    params.push(`name=${encodeURIComponent(name)}`);
                }
                if (name) {
                    params.push(`name=${encodeURIComponent(name)}`);
                }
                if (dateFrom || dateTo) {
                    params.push(`date=${encodeURIComponent(dateFrom)}-${encodeURIComponent(dateTo)}`);
                }

                if (project) {
                    params.push(`project=${encodeURIComponent(project)}`);
                }
                if (category) {
                    params.push(`rubrica=${encodeURIComponent(category)}`);
                }
                if (onHome) {
                    params.push(`glav=${encodeURIComponent(onHome)}`);
                }
                if (status) {
                    params.push(`status=${encodeURIComponent(status)}`);
                }

                // Создаем URL с параметрами
                let url = window.location.href.split('?')[0]; // Получаем текущий URL без параметров
                if (params.length > 0) {
                    url += '?' + params.join('&'); // Добавляем параметры к URL
                }

                // Выполняем переход по новому URL
                window.location.href = url;
            });
        });
    </script>
@endsection
