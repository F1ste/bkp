@extends('layouts.admin')

@section('title', 'Панель управления')

@section('content')
    <div class="page__container" style="min-height: 100vh;">
        <section class="my-projects personal-account">
            <div class="my-projects__container">
                <div class="my-projects__content">
                    <div class="my-projects__heading block-heading">
                        <div class="my-projects__title personal__title">
                            Редактирование ссылок на социальные сети
                        </div>
                    </div>
                    <div style="display: flex;justify-content: space-between;margin-top: 20px;">

                        <div>
                            <a href="{{ route('admin.ficon.create') }}" class="my-projects__btn btn btn-white">Создать ссылку
                                на социальные сети</a>
                        </div>
                    </div>

                    <div class="my-projects__projects-items">
                    @foreach ($footer_ar['icons'] as $el)
                        <div class="my-projects__item" style="margin-bottom: 15px;">
                            <a href="{{ route('admin.ficon.edit', ['id' => $el->id]) }}">
                                <div class="my-projects__project-name">
                                    {{ $el->style }}
                                </div>

                            </a>
                        </div>
                    @endforeach
                    </div>
                    <div class="my-projects__heading block-heading">
                        <div class="my-projects__title personal__title">
                            Редактирование ссылок на страницы
                        </div>
                    </div>
                    <div style="display: flex;justify-content: space-between;margin-top: 20px;">
                        <div>
                            <a href="{{ route('admin.fpage.create') }}" class="my-projects__btn btn btn-white">Создать
                                ссылку на страницу</a>
                        </div>
                    </div>

                    <div class="my-projects__projects-items">
                    @foreach ($footer_ar['pages'] as $el)
                        <div class="my-projects__item" style="margin-bottom: 15px;">
                            <a href="{{ route('admin.fpage.edit', ['id' => $el->id]) }}">
                                <div class="my-projects__project-name">
                                    {{ $el->page }}
                                </div>

                            </a>
                        </div>
                    @endforeach
                    </div>
                    <div class="my-projects__heading block-heading">
                        <div class="my-projects__title personal__title">
                            Редактирование информации в футере
                        </div>
                    </div>
                @if (count($footer_ar['descr']) == 0)
                    <a href="{{ route('admin.fdescr.create') }}" class="my-projects__btn btn btn-white" style="margin-top: 20px;">Создать описание в футере</a>
                @endif

                    <div class="my-projects__projects-items">
                    @foreach ($footer_ar['descr'] as $el)
                        <div class="my-projects__item" style="margin-bottom: 15px;">
                            <a href="{{ route('admin.fdescr.edit', ['id' => $el->id]) }}">
                                <div class="my-projects__project-name">
                                    Редактировать описание футера
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
