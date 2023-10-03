@extends('layouts.index')
@section('content')
    <main class="page">
        <section class="about">
            <div class="about__container">
                <div class="about__heading section__heading">
                    <div class="about__heading-text section__heading-text">
                        
                        <div class="about__title section__title">
						@foreach ($about as $item)
                            {{ $item->title }}
						@endforeach
                        </div>
                    </div>
                </div>
                <div class="about__content">
                    <div class="about__main-info">
                        <div class="about__media media-block">
						@foreach ($about as $item)
                            <picture>
                                <source srcset="{{ asset('image/about/about1.webp') }}" type="image/webp"><img
                                    src="{{ asset('image/about/about1.png') }}" alt="">
                            </picture>
						@endforeach
                        </div>
                        <div class="about__main-text">
                            @foreach ($about as $item)
                                <div class="about__text-paragraph">
									{!! $item->description !!}
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="about__how-it-works how-it-works">
                        <div class="how-it-works__title">
                            Как это работает?
                        </div>
                        <div class="how-it-works__content">
                            <div class="how-it-works__item">
                                <div class="how-it-works__media media-block">
                                    <img src="{{ asset('image/about/how-it-works1.svg') }}" alt="">
                                </div>
                                <div class="how-it-works__item-title">
                                    Организатор заполняет<br>
                                    карточку проекта
                                </div>
                                <div class="how-it-works__question">
                                    <a href="#">Как создать проект?</a>
                                </div>

                            </div>
                            <div class="how-it-works__item">
                                <div class="how-it-works__media media-block">
                                    <img src="{{ asset('image/about/how-it-works2.svg') }}" alt="">
                                </div>
                                <div class="how-it-works__item-title">
                                    Партнер находит проект <br>
                                    и откликается
                                </div>
                                <div class="how-it-works__question">
                                    <a href="#">Как откликнуться на проект?</a>
                                </div>

                            </div>
                            <div class="how-it-works__item">
                                <div class="how-it-works__media media-block">
                                    <img src="{{ asset('image/about/how-it-works3.svg') }}" alt="">
                                </div>
                                <div class="how-it-works__item-title">
                                    Организатор выбирает <br>
                                    партнера и связывается с ним
                                </div>
                                <div class="how-it-works__question">
                                    <a href="#">Как работает наш чат?</a>
                                </div>

                            </div>
                            <div class="how-it-works__item">
                                <div class="how-it-works__media media-block">
                                    <img src="{{ asset('image/about/how-it-works4.svg') }}" alt="">
                                </div>
                                <div class="how-it-works__item-title">
                                    Организатор получает помощь <br>
                                    по проекту, а партнер пополняет <br>
                                    свое портфолио
                                </div>
                                <div class="how-it-works__question">
                                    <a href="#">Посмотреть выполненные проекты</a>
                                </div>

                            </div>
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
									<a href="#">
										<picture>
											<source srcset="{{ asset('image/join-us1.webp') }}" type="image/webp">
											<img src="{{ asset('image/join-us1.png') }}" alt="Изображение">
										</picture>
									</a>
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
									<a href="#">
										<picture>
											<source srcset="{{ asset('image/join-us2.webp') }}" type="image/webp">
											<img src="{{ asset('image/join-us2.png') }}" alt="Изображение">
										</picture>
									</a>
								</div>
								<div class="join-us__info">
									<div class="join-us__text">
										<div class="join-us__text-title">
											Ответить на проект
										</div>
										<div class="join-us__text-desrcription">
											Ознакосьтесь с перечнем проектов
											и предложите свою помощь
										</div>
									</div>
									<a href="#" class="join-us__btn _fw btn btn-filled">Перейти</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
        </section>
    </main>
@endsection
