@extends('layouts.index')

@section('content')
<main class="page">

    <div class="search-query">
        <div class="search-query__container">
            <div class="search-query__title main-page__section-title section__heading">
                Результаты поиска по запросу "{{ $searchText }}"
            </div>
            <div class="search-query__search-bar">
                <form class="search-query__search-form form" action="/search">
                    <div class="search-query__form-item search-item form-item">
                        <input type="text" class="form__input _icon-search" name="searchText" placeholder="Найти...">
                        <button type="submit" class="search-query__submit-icon search-submit _icon-search"></button>
                    </div>

                    <button type="submit" class="search-query__submit-btn btn btn-filled">Поиск</button>
                </form>
                <form id="pageFilter" class="news-block__filter-form">
                    <div data-spollers data-one-spoller data-spollers-speed="200" class="news-block__filter filter">
                        <div class="filter__item">
                            <button type="button" data-spoller data-spoller-close
                                class="filter__btn accordion__title _icon-accordionArrow">
                                Год
                            </button>
                            <div class="filter__accordion-body accordion__body main-text">
                                @foreach ($years as $year)
                                <div class="filter__form-item form__item">
                                    <div class="filter__checkbox checkbox">
                                        <input data-no-focus-classes id="{{ $year }}" value="{{ $year }}"
                                            type="checkbox" name="year[]"
                                            class="filter__checkbox-input checkbox__input">
                                        <label for="{{ $year }}" class="filter__form-label checkbox__label ">
                                            <span>
                                                {{ $year }}
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="filter__item">
                            <button type="button" data-spoller data-spoller-close
                                class="filter__btn accordion__title _icon-accordionArrow">
                                Рубрики
                            </button>
                            <div class="filter__accordion-body accordion__body main-text">
                                @foreach ($categories as $rubric)
                                @if (!is_null($rubric))
                                <div class="filter__form-item form__item">
                                    <div class="filter__checkbox checkbox">
                                        <input data-no-focus-classes id="{{ $rubric }}" value="{{ $rubric }}"
                                            type="checkbox" name="rubrica[]"
                                            class="filter__checkbox-input checkbox__input">
                                        <label for="{{ $rubric }}" class="filter__form-label checkbox__label ">
                                            <span>
                                                {{ $rubric }}
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="filter__item">
                            <button type="button" data-spoller data-spoller-close
                                class="filter__btn accordion__title _icon-accordionArrow">
                                Тема
                            </button>
                            <div class="filter__accordion-body accordion__body main-text">
                                @foreach ($event_type as $rubric)
                                @if (!is_null($rubric))
                                <div class="filter__form-item form__item">
                                    <div class="filter__checkbox checkbox">
                                        <input data-no-focus-classes id="{{ $rubric }}" value="{{ $rubric }}"
                                            type="checkbox" name="tip[]" class="filter__checkbox-input checkbox__input">
                                        <label for="{{ $rubric }}" class="filter__form-label checkbox__label "><span>{{
                                                $rubric }}</span></label>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @if ($projects->isNotEmpty())
    <section class="popular-projects">
        <div class="popular-projects__container">
            <div class="popular-projects__heading section__heading">
                <div class="popular-projects__heading-text section__heading-text">
                    <div class="popular-projects__title main-page__section-title">
                        Проекты
                    </div>
                </div>
            </div>
            <div class="popular-projects__content">
                @foreach ($projects->sortBy('date_service_from') as $el)
                <div class="popular-projects__item">
                    <div class="popular-projects__project-type">
                        {{ $el->tema }}
                    </div>
                    <a href="{{ route('projects.project', $el->id) }}" class="popular-projects__project-name">
                        {{ $el->name_proj }}
                    </a>
                    <div class="popular-projects__project-date">
                        От {{ Carbon\Carbon::parse($el->date_service_from)->format('d.m.Y') }}
                    </div>
                    <div class="popular-projects__project-image media-block">
                        <a href="{{ route('projects.project', $el->id) }}">
                            <picture>
                                <source srcset="{{ $el->img1 }}" type="image/webp">
                                <img src="{{ $el->img1 }}" alt="Изображение проекта">
                            </picture>
                        </a>
                    </div>
                    <div class="popular-projects__info">
                        <div class="popular-projects__project-geo _icon-geo">
                            {{ $el->region }}
                        </div>
                        <div class="popular-projects__organization-name">
                            <a>{{ $el->user->org }}</a>
                        </div>
                    </div>
                    <div class="popular-projects__partners-tags partners-tags">
                        <div class="partners-tags__title">
                            Ищем:
                        </div>
                        <div class="partners-tags__tags-wrapper tags">
                            @php
                            $json = json_decode($el->serch);
                            @endphp

                            @foreach ($json as $serchs)
                            @if (\Illuminate\Support\Carbon::parse($serchs->inp)->gte(now()))
                            <a href="{{ route('projects.project', ['project' => $el->id, '#roles']) }}"
                                class="tags__item btn btn-white">
                                {{$serchs->sel}}
                            </a>
                            @else
                            <span class="tags__item tags__item--disabled btn btn-white">{{$serchs->sel}}</span>
                            @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="popular-projects__subscribe">
                        <a href="{{ route('projects.project', $el->id) }}"
                            class="popular-projects__subscribe-btn _fw btn btn-filled">Подробнее</a>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>
    @endif
    @if ($news->isNotEmpty())
    <section class="news-block">
        <div class="news-block__container">
            <div class="news-block__heading section__heading">
                <div class="news-block__heading-text section__heading-text">
                    <div class="news-block__title main-page__section-title">
                        Новости
                    </div>
                </div>
            </div>
            <div class="news-block__items-wrapper">
                <div class="news-block__items-content">
                    @foreach ($news->sortBy('date_service_from') as $el)
                    <div class="news-block__item">
                        <a href="{{ route('news.tidings', $el->id) }}">
                            <div class="news-block__item-media media-block">
                                <picture>
                                    <source srcset="{{ $el->img }}" type="image/webp"><img
                                        src="{{ $el->img }}" alt="Изображение новости">
                                </picture>
                            </div>
                            <div class="news-block__date">
                                {{ Carbon\Carbon::parse($el->date)->format('d.m.Y') }}
                            </div>
                            <div class="news-block__title title">
                                {{ $el->name }}
                            </div>
                            <div class="news-block__description article-description">
                                <object>
                                    {!! $el->pod_zag !!}
                                </object>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    @endif
    @if($projects->isEmpty() && $news->isEmpty())
    <div class="search-query__empty">
        <div>
            <img src="/image/search-engine.png" width="90" alt="">
        </div>
        <div class="info-title text-lg text-bold text-center">По Вашему запросу ничего не найдено</div>
    </div>
    @endif
</main>

@endsection
