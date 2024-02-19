@extends('layouts.admin')

@section('title', 'Панель управления')

@section('content')
    <div class="page__container" style="height: 100vh;">
        <section class="my-projects personal-account">
            <div class="my-projects__container">
                <div class="my-projects__content">
                    <div class="my-projects__heading block-heading">
                        <div class="my-projects__title personal__title">
                            Проекты на модерацию
                        </div>
                    </div>

                    <div class="my-projects__projects-items">
                        @foreach ($collections as $el)
                            <div class="my-projects__item">
                                <a href="{{ route('admin.projects.edit', $el) }}">
                                    <div class="my-projects__project-name">
                                        {{ $el->name_proj }}
                                    </div>

                                </a>
                            </div>
                        @endforeach
                    </div>

                    <a href="{{ route('admin.projects.create') }}" class="my-projects__btn btn btn-white">Создать проект</a>
                </div>
            </div>
        </section>
    </div>
@endsection
