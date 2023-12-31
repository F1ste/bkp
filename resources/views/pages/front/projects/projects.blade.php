@extends('layouts.index')
@section('content')

<main class="page">
			<section class="projects">
				<div class="projects__container">
					<div class="projects__heading section__heading">
						<div class="projects__heading-text section__heading-text">
							<div class="projects__title section__title">
								ПРОЕКТЫ
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
											<a href="#"><picture><source srcset="{{ asset('image/join-us1.webp') }}" type="image/webp"><img src="{{ asset('image/join-us1.png') }}" alt="Изображение"></picture></a>
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
											<a href="#" class="join-us__btn _fw btn btn-filled">Перейти</a>
										</div>
									</div>
									<div class="join-us__item">
										<div class="join-us__media media-block">
											<a href="#"><picture><source srcset="{{ asset('image/join-us2.webp') }}" type="image/webp"><img src="{{ asset('image/join-us2.png') }}" alt="Изображение"></picture></a>
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
											<a href="#" class="join-us__btn _fw btn btn-filled">Перейти</a>
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
<!-- 										<div class="filter__item">
											<button type="button" data-spoller data-spoller-close class="filter__btn accordion__title all-filters">
												Все фильтры
											</button>
											<div class="filter__accordion-body accordion__body main-text">
												<div class="filter__form-item form__item">
													<div class="filter__checkbox checkbox">
														<input data-no-focus-classes id="filterItem1" type="checkbox" name="all-filters" class="filter__checkbox-input checkbox__input">
														<label for="filterItem1" class="filter__form-label checkbox__label "><span>Фильтр 1</span></label>
													</div>
												</div>
												<div class="filter__form-item form__item">
													<div class="filter__checkbox checkbox">
														<input data-no-focus-classes id="filterItem2" type="checkbox" name="all-filters" class="filter__checkbox-input checkbox__input">
														<label for="filterItem2" class="filter__form-label checkbox__label "><span>Фильтр 2</span></label>
													</div>
												</div>
												<div class="filter__form-item form__item">
													<div class="filter__checkbox checkbox">
														<input data-no-focus-classes id="filterItem3" type="checkbox" name="all-filters" class="filter__checkbox-input checkbox__input">
														<label for="filterItem3" class="filter__form-label checkbox__label "><span>Фильтр 3</span></label>
													</div>
												</div>
											</div>
										</div> -->
									</div>
								</form>
							</div>
							<div class="popular-projects__content">
								@foreach($collections as $el)
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
											<a href="#">{{ $el->region}}</a>
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
											@foreach($json as $serchs)
											<a href="#" class="tags__item btn btn-white">
												{{$serchs->sel}}
											</a>
											@endforeach
										</div>
									</div>
									<div class="popular-projects__subscribe">
										<a href="{{ route('projects.project', ['id' => $el->id]) }}" class="popular-projects__subscribe-btn _fw btn btn-filled">Подробнее</a>
									</div>
								</div>
								@endforeach
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