@extends('layouts.index')
@section('content')
    <main class="page">
        <section class="news-block news-page">
            <div class="news-block__container">
                <div class="news-block__heading section__heading">
                    <div class="news-block__heading-text section__heading-text">
                        <div class="news-block__title section__title">
                            Новости
                        </div>
                    </div>
                    <form id="pageFilter" class="news-block__filter-form">
                        <div data-spollers data-one-spoller data-spollers-speed="200" class="news-block__filter filter">
                            <div class="filter__item">
                                <button type="button" data-spoller data-spoller-close class="filter__btn accordion__title _icon-accordionArrow">
                                    Год
                                </button>
                                <div class="filter__accordion-body accordion__body main-text">
                                @foreach ($years as $year)
                                    <div class="filter__form-item form__item">
                                        <div class="filter__checkbox checkbox">
                                            <input data-no-focus-classes id="{{ $year }}" value="{{ $year }}" type="checkbox" name="year[]" class="filter__checkbox-input checkbox__input">
                                            <label for="{{ $year }}" class="filter__form-label checkbox__label "><span>{{ $year }}</span></label>
                                        </div>
                                    </div>
                                @endforeach
                                </div>
                            </div>
                            <div class="filter__item">
                                <button type="button" data-spoller data-spoller-close class="filter__btn accordion__title _icon-accordionArrow">
                                    Месяц
                                </button>
                                <div class="filter__accordion-body accordion__body main-text">
                                    @foreach ($months as $month)
                                        <div class="filter__form-item form__item">
                                            <div class="filter__checkbox checkbox">
                                                <input data-no-focus-classes id="{{ $month }}" value="{{ $month }}" type="checkbox" name="month[]" class="filter__checkbox-input checkbox__input">
                                                <label for="{{ $month }}" class="filter__form-label checkbox__label "><span>{{ Str::title($month) }}</span></label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="filter__item">
                                <button type="button" data-spoller data-spoller-close class="filter__btn accordion__title _icon-accordionArrow">
                                    Рубрики
                                </button>
                                <div class="filter__accordion-body accordion__body main-text">
                                    @foreach ($categories as $rubric)
                                        @if (!is_null($rubric))
                                            <div class="filter__form-item form__item">
                                                <div class="filter__checkbox checkbox">
                                                    <input data-no-focus-classes id="{{ $rubric }}" value="{{ $rubric }}" type="checkbox" name="rubrica[]" class="filter__checkbox-input checkbox__input">
                                                    <label for="{{ $rubric }}" class="filter__form-label checkbox__label "><span>{{ $rubric }}</span></label>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <div class="filter__item">
                                <button type="button" data-spoller data-spoller-close class="filter__btn accordion__title _icon-accordionArrow">
                                    Проект
                                </button>
                                <div class="filter__accordion-body accordion__body main-text" style="left:auto;right:0;">
                                    @foreach ($projects as $project)
                                        @if (!is_null($project))
                                            <div class="filter__form-item form__item">
                                                <div class="filter__checkbox checkbox">
                                                    <input data-no-focus-classes id="{{ $project }}" value="{{ $project }}" type="checkbox" name="project[]" class="filter__checkbox-input checkbox__input">
                                                    <label for="{{ $project }}" class="filter__form-label checkbox__label "><span>{{ $project }}</span></label>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="news-block__items-wrapper">
                    <div class="news-block__big-block big-news">

                    @if (isset($collections[0]) && $collections[0]->name != '')
                        <a href="{{ route('news.tidings', $collections[0]) }}" class="big-news__item with-banner">
                            <div class="big-news__media media-block">
                                <picture>
                                    <source srcset="{{ $collections[0]->img }}" type="image/webp"><img src="{{ $collections[0]->img }}" alt="Изображение новости">
                                </picture>
                            </div>
                            <div class="big-news__content">
                                <div class="big-news__title article-title">
                                    {{ $collections[0]->name }}
                                </div>
                                <div class="big-news__description article-description">
                                    {!! $collections[0]->pod_text !!}
                                </div>
                            </div>
                        </a>
                    @endif

                        {{-- <div class="big-news__banner ">
                            <a href="#" class="media-block">
                                <picture>
                                    <source srcset="{{ asset('image/banner1.webp') }}" type="image/webp">
                                    <img src="{{ asset('image/banner1.jpg') }}" alt="Баннер">
                                </picture>
                            </a>
                        </div> --}}

                    </div>
                    <div class="news-block__big-items">
                    @for ($i = 1; $i < 3; $i++)
                    @if (isset($collections[$i]) && $collections[$i]->name != '')
                        <div class="news-block__item">
                            <a href="{{ route('news.tidings', $collections[$i]) }}">
                                <div class="news-block__item-media media-block">
                                    <picture>
                                        <source srcset="{{ $collections[$i]->img }}" type="image/webp"><img src="{{ $collections[$i]->img }}" alt="Изображение новости">
                                    </picture>
                                </div>
                                <div class="news-block__date">
                                    {{ Carbon\Carbon::parse($collections[$i]->date)->format('d.m.Y') }}
                                </div>
                                <div class="news-block__title title">
                                    {{ $collections[$i]->name }}
                                </div>
                                <div class="news-block__description article-description">
                                    {!! $collections[$i]->pod_text !!}
                                </div>
                            </a>
                        </div>
                    @endif
                    @endfor
                    </div>

                    <div class="news-block__items-content">
                    @for ($i = 3; $i < count($collections); $i++)
                    @if (isset($collections[$i]) && $collections[$i]->name != '')
                        <div class="news-block__item">
                            <a href="{{ route('news.tidings', $collections[$i]) }}">
                                <div class="news-block__item-media media-block">
                                    <picture>
                                        <source srcset="{{ $collections[$i]->img }}" type="image/webp"><img src="{{ $collections[$i]->img }}" alt="Изображение новости">
                                    </picture>
                                </div>
                                <div class="news-block__date">
                                    {{ Carbon\Carbon::parse($collections[$i]->date)->format('d.m.Y') }}
                                </div>
                                <div class="news-block__title title">
                                    {{ $collections[$i]->name }}
                                </div>
                                <div class="news-block__description article-description">
                                    {!! $collections[$i]->pod_zag !!}
                                </div>
                            </a>
                        </div>
                    @endif
                    @endfor
                    </div>

                    {{ $collections->withQueryString()->links('pagination::default') }}
                </div>
        </section>
        {{-- <section class="banner">
            <div class="banner__container">
                <div class="banner__wrapper">
                    <a href="#" class="media-block">
                        <picture>
                            <source srcset="{{ asset('image/bigbanner.webp') }}" type="image/webp"><img class="" src="{{ asset('image/bigbanner.png') }}" alt="Изображение баннера">
                        </picture>
                    </a>
                </div>
            </div>
        </section> --}}
    </main>
    <script>
        (() => {
            const currentURL = window.location.href;

            function getQueryParams(url) {
                const queryParams = {};
                const params = url.split('?')[1];
                if (params) {
                    const paramPairs = params.split('&');
                    for (const paramPair of paramPairs) {
                        const [key, value] = paramPair.split('=');
                        const decodedKey = decodeURIComponent(key);
                        const decodedValue = decodeURIComponent(value.replace(/\+/g, ' '));
                        if (!queryParams[decodedKey]) {
                            queryParams[decodedKey] = [];
                        }
                        queryParams[decodedKey].push(decodedValue);
                    }
                }
                return queryParams;
            }

            const queryParams = getQueryParams(currentURL);

            const checkboxes = document.querySelectorAll('input[name]');

            checkboxes.forEach((checkbox) => {
                const checkboxName = checkbox.name;
                if (queryParams.hasOwnProperty(checkboxName)) {
                    const checkboxValue = checkbox.value;
                    if (queryParams[checkboxName].includes(checkboxValue)) {
                        checkbox.checked = true;
                    }
                }
            });

            const pageFilter = document.getElementById('pageFilter');

            const PageCheckboxes = pageFilter.querySelectorAll('input[type="checkbox"]');

            PageCheckboxes.forEach((checkbox) => {
                checkbox.addEventListener('change', function() {

                    pageFilter.submit();
                });
            });
        })();
    </script>
@endsection
