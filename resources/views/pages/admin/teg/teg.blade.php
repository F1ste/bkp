@extends('layouts.admin')

@section('title', 'Новости')

@section('content')
    <div class="page__container" style="min-height: 100vh;">
        <section class="my-projects personal-account">
            <div class="my-projects__container">
                <div class="my-projects__content">
                    <div class="my-projects__heading block-heading">
                        <div class="my-projects__title personal__title">
                            Тег
                        </div>
                    </div>

                    <div style="display: flex;justify-content: space-between;margin-top: 20px;">
                        <div>
                            <a href="{{ route('admin.project-tags.new') }}" class="my-projects__btn btn btn-white">Создать Тег</a>
                        </div>
                    </div>

                    <div style="margin-top: 20px; margin-bottom: 20px;">
                    @foreach ($collections as $el)
                        <div class="my-projects__item" style="margin-bottom: 15px;">
                            <a href="{{ route('admin.project-tags.single', ['id' => $el->id]) }}">
                                <div class="my-projects__project-name">
                                    {{ $el->name }}
                                </div>
                            </a>
                        </div>
                    @endforeach
                    </div>

                </div>
            </div>
        </section>
    </div>

    <style>
        .serch_news .select__value {
            padding: 5px;
        }

        .serch_news .select__title {
            border-radius: 6px;
        }

        .serch_news .select_form__select {
            margin-top: 5px;
        }
    </style>
@endsection
