@extends('layouts.index')
@section('content')

<main class="page">
    <section class="projects">
        <div class="projects__container">
            <div class="projects__heading section__heading">
                <div class="projects__heading-text section__heading-text">
                    <div class="projects__title section__title">
                        ПРОЕКТЫ
                        <sup class="sup-count help" title="Количество проектов">{{ $collections->total() }}</sup>
                    </div>
                </div>
            </div>
        </div>
        <div class="join-us">
                <div class="join-us__container">
                    <div class="join-us__wrapper">
                        <div class="join-us__heading section__heading">
                            <div class="join-us__heading-text section__heading-text">
                                <div class="join-us__title main-page__section-title">
                                    Присоединяйтесь к нам
                                </div>
                            </div>
                        </div>
                        <div class="join-us__content">
                            <div class="join-us__item">
                                <div class="join-us__media media-block">
                                    <a href="/profile/dashboard"><picture><source srcset="{{ asset('image/join-us1.webp') }}" type="image/webp"><img src="{{ asset('image/join-us1.png') }}" alt="Изображение"></picture></a>
                                </div>
                                <div class="join-us__info">
                                    <div class="join-us__text">
                                        <div class="join-us__text-title">
                                            Предложить проект
                                        </div>
                                        <div class="join-us__text-desrcription">
                                            Предложите свою идею и укажите
                                            какая помощь вам нужна
                                        </div>
                                    </div>
                                    <a href="/profile/dashboard" class="join-us__btn _fw btn btn-filled">Перейти</a>
                                </div>
                            </div>
                            <div class="join-us__item">
                                <div class="join-us__media media-block">
                                    <a href="/news"><picture><source srcset="{{ asset('image/join-us2.webp') }}" type="image/webp"><img src="{{ asset('image/join-us2.png') }}" alt="Изображение"></picture></a>
                                </div>
                                <div class="join-us__info">
                                    <div class="join-us__text">
                                        <div class="join-us__text-title">
                                            Узнайте о событиях
                                        </div>
                                        <div class="join-us__text-desrcription">
                                            Ознакомьтесь с новостями проектов и
                                            культурной биржи
                                        </div>
                                    </div>
                                    <a href="/news" class="join-us__btn _fw btn btn-filled">Перейти</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <div class="projects__wrapper">
                <div class="projects__container">
                    <div class="projects__filters">
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
                                        Тематика
                                    </button>
                                    <div class="filter__accordion-body accordion__body main-text">
                                    @foreach ($event_type as $rubric)
                                        @if (!is_null($rubric))
                                            <div class="filter__form-item form__item">
                                                <div class="filter__checkbox checkbox">
                                                    <input data-no-focus-classes id="{{ $rubric }}" value="{{ $rubric }}" type="checkbox" name="tip[]" class="filter__checkbox-input checkbox__input">
                                                    <label for="{{ $rubric }}" class="filter__form-label checkbox__label "><span>{{ Str::title($rubric) }}</span></label>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                    </div>
                                </div>
                                <div class="filter__item">
                                    <button type="button" data-spoller data-spoller-close class="filter__btn accordion__title _icon-accordionArrow">
                                        Тип
                                    </button>
                                    <div class="filter__accordion-body accordion__body main-text">
                                    @foreach ($tema as $rubric)
                                        @if (!is_null($rubric))
                                            <div class="filter__form-item form__item">
                                                <div class="filter__checkbox checkbox">
                                                    <input data-no-focus-classes id="{{ $rubric }}" value="{{ $rubric }}" type="checkbox" name="tema[]" class="filter__checkbox-input checkbox__input">
                                                    <label for="{{ $rubric }}" class="filter__form-label checkbox__label "><span>{{ Str::title($rubric) }}</span></label>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                    </div>
                                </div>
                                <div class="filter__item">
                                    <button type="button" data-spoller data-spoller-close class="filter__btn accordion__title _icon-accordionArrow">
                                        Теги
                                    </button>
                                    <div class="filter__accordion-body accordion__body main-text">
                                    @foreach ($teg as $rubric)
                                        @if (!is_null($rubric))
                                            <div class="filter__form-item form__item">
                                                <div class="filter__checkbox checkbox">
                                                    <input data-no-focus-classes id="{{ $rubric }}" value="{{ $rubric }}" type="checkbox" name="teg[]" class="filter__checkbox-input checkbox__input">
                                                    <label for="{{ $rubric }}" class="filter__form-label checkbox__label "><span>{{ Str::title($rubric) }}</span></label>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                    </div>
                                </div>
                                <div class="filter__item">
                                    <button type="button" data-spoller data-spoller-close class="filter__btn accordion__title _icon-accordionArrow">
                                        Роли
                                    </button>
                                    <div class="filter__accordion-body accordion__body main-text">
                                    @foreach ($roles as $rubric)
                                        @if (!is_null($rubric))
                                            <div class="filter__form-item form__item">
                                                <div class="filter__checkbox checkbox">
                                                    <input data-no-focus-classes id="{{ $rubric }}" value="{{ $rubric }}" type="checkbox" name="role[]" class="filter__checkbox-input checkbox__input">
                                                    <label for="{{ $rubric }}" class="filter__form-label checkbox__label "><span>{{ Str::title($rubric) }}</span></label>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="popular-projects__content">
                    @if ($collections->count() > 0)
                        @foreach($collections->sortBy('date_service_from') as $el)
                        <div class="popular-projects__item">
                            <div class="popular-projects__project-type">
                                {{ $el->tema }}
                            </div>
                            <div class="popular-projects__project-name">
                                {{ $el->name_proj }}
                            </div>
                            <div class="popular-projects__project-date">
                                От {{ Carbon\Carbon::parse($el->date_service_from)->format('d.m.Y') }}
                            </div>
                            <div class="popular-projects__project-image media-block">
                                <a href="{{ route('projects.project', ['id' => $el->id]) }}">
                                    <picture><source srcset="{{ $el->img1}}" type="image/webp"><img src="{{ $el->img1}}" alt="Изображение проекта"></picture>
                                </a>
                            </div>
                            <div class="popular-projects__info">
                                <div class="popular-projects__project-geo _icon-geo">
                                    {{ $el->region}}
                                </div>
                                <div class="popular-projects__organization-name">
                                    <a href="#">{{ $users->where('id', $el->user_id)->first()->org }}</a>
                                </div>
                            </div>
                            <div class="popular-projects__partners-tags partners-tags">
                                <div class="partners-tags__title">
                                    Ищем:
                                </div>
                                <div class="partners-tags__tags-wrapper tags">
                                @php
                                    $json = array_map(function ($item) { $item->last_date = \Illuminate\Support\Carbon::parse($item->inp); return $item; }, json_decode($el->serch));
                                    usort($json, function ($a, $b) { return $a->last_date->lt($b->last_date); });
                                @endphp
                                @foreach($json as $serchs)
                                    @if ($serchs->last_date->gte(now()))
                                    <a href="#" class="tags__item btn btn-white">
                                        {{$serchs->sel}}
                                    </a>
                                    @else
                                    <span class="tags__item tags__item--disabled btn btn-white">{{$serchs->sel}}</span>
                                    @endif
                                @endforeach
                                </div>
                            </div>
                            <div class="popular-projects__subscribe">
                                <a href="{{ route('projects.project', ['id' => $el->id]) }}" class="popular-projects__subscribe-btn _fw btn btn-filled">Подробнее</a>
                            </div>
                        </div>
                        @endforeach
                        @else
                            <div class="popular-projects__empty">
                                <div>
                                    <svg width="90" height="90" viewBox="0 0 90 90" xmlns="http://www.w3.org/2000/svg"><path d="M45 0C20.149 0 0 20.149 0 45s20.149 45 45 45 45-20.149 45-45S69.851 0 45 0" fill="#FB7772"/><path d="M47.415 36.393a1.887 1.887 0 0 1 .378-2.12l3.944-6.683c.717-.712 1.976-.712 2.695 0L58 24.031A6.91 6.91 0 0 0 53.085 22c-1.858 0-3.601.72-4.916 2.031l-4.37 6.657c-2.549 2.542-2.243 6.591 0 9.312l3.616-3.607zm4.786 6.051c.718.306 1.586.191 2.175-.368l7.388-4.277c.73-.696 1.27-1.308.298-2.366l3.756-2.933c1.182 1.396 1.873 2.196 1.873 4 0 1.803-.93 3.488-2.275 4.765l-7.388 4.277c-2.609 2.475-6.736 2.593-9.528.414l3.701-3.512zm-.961-1.019a2.589 2.589 0 0 0 0-3.666A2.586 2.586 0 0 0 49.407 37c-.664 0-1.327.254-1.833.76l-.244.243-3.665 3.665-3.523 3.523-3.666 3.665-.244.244a2.589 2.589 0 0 0 0 3.665c.506.506 1.17.76 1.833.76.664 0 1.327-.254 1.833-.76l.244-.243 3.665-3.666 3.523-3.522 3.666-3.666.244-.243zM40.96 53.537a1.95 1.95 0 0 1-.39 2.183l-4.524 4.523c-.736.733-2.03.733-2.768 0l-4.524-4.523a1.962 1.962 0 0 1 0-2.769l4.526-4.526a1.926 1.926 0 0 1 2.183-.389l3.71-3.709c-2.75-2.224-7.03-2.1-9.561.433l-4.524 4.523c-2.784 2.787-2.784 7.318 0 10.102l4.524 4.523A7.091 7.091 0 0 0 34.662 66c1.908 0 3.7-.741 5.05-2.092l4.524-4.523c2.618-2.618 2.743-6.76.438-9.562l-3.715 3.714z" fill="#FFF"/></svg>
                                </div>
                                <div class="info-title text-lg text-bold">В этой категории еще ничего нет</div>
                                <div class="text-md">Станьте первым, кто опубликует свой проект!</div>
                                <div class="popular-projects__btn-group">
                                    <a href="/profile/services/new" class="btn btn-filled">Создать проект</a>
                                    <button onclick="window.location.search = ''" class="btn">Сбросить фильтры</button>
                                </div>
                            </div>
                        @endif
                    </div>

                    {{$collections->withQueryString()->links('pagination::default')}}

                    </div>

                </div>
        </section>
    </main>
<script>
(()=>{

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
		checkbox.addEventListener('change', function () {

			pageFilter.submit();
		});
	});




})();
</script>
@endsection
