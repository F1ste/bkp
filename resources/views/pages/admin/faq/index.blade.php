@extends('layouts.admin')

@section('title', 'Панель управления')

@section('content')


    <div class="page__container" style="height: 100vh;">
        <section class="my-projects personal-account">
            <div class="my-projects__container">
                <div class="my-projects__content">
                    <div class="my-projects__heading block-heading">
                        <div class="my-projects__title personal__title">
                            Редактирование страницы "Вопрос-ответ"
                        </div>
                    </div>
                    <div style="display: flex;justify-content: space-between;margin-top: 20px;">


                        <div>
                            <a href="{{ route('admin.faq.create') }}" class="my-projects__btn btn btn-white">Создать Вопрос-Ответ</a>
                        </div>
                    </div>

                    <div class="my-projects__projects-items">
                        @foreach($faq as $el)
                        <div class="my-projects__item" style="margin-bottom: 15px;">
                            <a href="{{ route('admin.faq.edit', ['id' => $el->id]) }}">
                                <div class="my-projects__project-name">
                                    {{ $el->quest }}
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
