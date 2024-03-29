@extends('layouts.admin')

@section('title', 'Панель управления')

@section('content')
    <div class="page__container" style="min-height: 100vh;">
        <section class="my-projects personal-account">
            <div class="my-projects__container">
                <div class="my-projects__content">
                    <div class="my-projects__heading block-heading">
                        <div class="my-projects__title personal__title">
                            Редактирование страницы "О Бирже"
                        </div>
                    </div>

                    <div class="my-projects__projects-items">
                    @foreach ($about as $el)
                        <div class="my-projects__item">
                            <a href="{{ route('admin.about.edit', ['id' => $el->id]) }}">
                                <div class="my-projects__project-name">
                                    {{ $el->title }}
                                </div>
                            </a>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
