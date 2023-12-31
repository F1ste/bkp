@extends('layouts.index')

@section('content')

<main class="page">
				<section class="projects-category">
				<div class="projects-category__container">
					<div class="projects-category__heading-text section__heading-text">
						<div class="projects-category__title main-page__section-title">
							КУЛЬТУРНАЯ БИРЖА
						</div>
						<div class="projects-category__subtitle main-page__section-subtitle">
							Платформа, где культурные проекты находят партнеров
						</div>
						<div class="projects-category__masonry">
							<div class="projects-category__masonry-col">
								<div class="projects-category__item">
									<a href="/projects">
										<div class="projects-category__media media-block">
											<picture><source srcset="{{ asset('image/projects-category/design.webp') }}" type="image/webp"><img src="{{ asset('image/projects-category/design.png') }}" alt="Дизайн"></picture>
										</div>
										<div class="projects-category__category-name">
											Дизайн
										</div>
									</a>
								</div>
								<div class="projects-category__item">
									<a href="/projects">
										<div class="projects-category__media media-block">
											<picture><source srcset="{{ asset('image/projects-category/literature.webp') }}" type="image/webp"><img src="{{ asset('image/projects-category/literature.webp') }}" alt="Литература"></picture>
										</div>
										<div class="projects-category__category-name">
											Литература
										</div>
									</a>
								</div>
								<div class="projects-category__item">
									<a href="/projects">
										<div class="projects-category__media media-block">
											<picture><source srcset="{{ asset('image/projects-category/interdisciplinary.webp') }}" type="image/webp"><img src="{{ asset('image/projects-category/interdisciplinary.webp') }}" alt="Междисциплинарные проекты"></picture>
										</div>
										<div class="projects-category__category-name">
											Междисциплинарные проекты
										</div>
									</a>
								</div>
							</div>
							<div class="projects-category__masonry-col">
								<div class="projects-category__item">
									<a href="/projects">
										<div class="projects-category__media media-block">
											<picture><source srcset="{{ asset('image/projects-category/dramtheatr.webp') }}" type="image/webp"><img src="{{ asset('image/projects-category/dramtheatr.webp') }}" alt="Драмтеатр"></picture>
										</div>
										<div class="projects-category__category-name">
											Драмтеатр
										</div>
									</a>
								</div>
								<div class="projects-category__item">
									<a href="/projects">
										<div class="projects-category__media media-block">
											<picture><source srcset="{{ asset('image/projects-category/visual.webp') }}" type="image/webp"><img src="{{ asset('image/projects-category/visual.webp') }}" alt="Визуальные искусства"></picture>
										</div>
										<div class="projects-category__category-name">
											Визуальные искусства
										</div>
									</a>
								</div>
							</div>
							<div class="projects-category__masonry-col">
								<div class="projects-category__item">
									<a href="/projects">
										<div class="projects-category__media media-block">
											<picture><source srcset="{{ asset('image/projects-category/music.webp') }}" type="image/webp"><img src="{{ asset('image/projects-category/music.webp') }}" alt="Music"></picture>
										</div>
										<div class="projects-category__category-name">
											Музыка
										</div>
									</a>
								</div>
								<div class="projects-category__item">
									<a href="/projects">
										<div class="projects-category__media media-block">
											<picture><source srcset="{{ asset('image/projects-category/dance.webp') }}" type="image/webp"><img src="{{ asset('image/projects-category/dance.webp') }}" alt="Балет и танец"></picture>
										</div>
										<div class="projects-category__category-name">
											Балет и танец
										</div>
									</a>
								</div>
								<div class="projects-category__item">
									<a href="/projects">
										<div class="projects-category__media media-block">
											<picture><source srcset="{{ asset('image/projects-category/opera.webp') }}" type="image/webp"><img src="{{ asset('image/projects-category/opera.webp') }}" alt="Опера"></picture>
										</div>
										<div class="projects-category__category-name">
											Опера
										</div>
									</a>
								</div>
							</div>
							<div class="projects-category__masonry-row">
								<div class="projects-category__item">
									<a href="/projects">
										<div class="projects-category__media media-block">
										<picture><source srcset="{{ asset('image/projects-category/architecture.webp') }}" type="image/webp"><img src="{{ asset('image/projects-category/architecture.png') }}" alt="Архитектура"></picture>
											
										</div>
										<div class="projects-category__category-name">
											Архитектура
										</div>
									</a>
								</div>
								<div class="projects-category__item">
									<a href="/projects">
										<div class="projects-category__media media-block">
											<picture><source srcset="{{ asset('image/projects-category/film.webp') }}" type="image/webp"><img src="{{ asset('image/projects-category/film.webp') }}" alt="Кино"></picture>
										</div>
										<div class="projects-category__category-name">
											Кино
										</div>
									</a>
								</div>
								<div class="projects-category__item">
									<a href="/projects">
										<div class="projects-category__media media-block">
											<picture><source srcset="{{ asset('image/projects-category/circus.webp') }}" type="image/webp"><img src="{{ asset('image/projects-category/circus.webp') }}" alt="Цирк"></picture>
										</div>
										<div class="projects-category__category-name">
											Цирк
										</div>
									</a>
								</div>
								<div class="projects-category__item">
									<a href="/projects">
										<div class="projects-category__media media-block">
											<picture><source srcset="{{ asset('image/projects-category/other.webp') }}" type="image/webp"><img src="{{ asset('image/projects-category/other.webp') }}" alt="Другое"></picture>
										</div>
										<div class="projects-category__category-name">
											Другое
										</div>
									</a>
								</div>
							</div>
						</div>

					</div>
				</div>
			</section>
			<section class="popular-projects">
				<div class="popular-projects__container">
					<div class="popular-projects__heading section__heading">
						<div class="popular-projects__heading-text section__heading-text">
							<div class="popular-projects__title main-page__section-title">
								Проекты
							</div>
						</div>
						<a data-da=".popular-projects__container,768" href="/projects" class="news-block__all-news _fw btn btn-white">
							Все проекты
						</a>
					</div>
					<div class="popular-projects__content">
						@php $count = 0; @endphp
						@foreach($collections->reverse() as $el)
							@if ($count < 3)
								<div class="popular-projects__item">
										<div class="popular-projects__project-type">
											{{ $el->tema }}
										</div>
										<div class="popular-projects__project-name">
											{{ $el->name_proj }}
										</div>
										<div class="popular-projects__project-date">
											От {{ $el->date_service_from }}
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
								@php $count++; @endphp
								@else
									@break
								@endif
							
							@endforeach

					</div>
				</div>
			</section>
			<section class="news-block">
				<div class="news-block__container">
					<div class="news-block__heading section__heading">
						<div class="news-block__heading-text section__heading-text">
							<div class="news-block__title main-page__section-title">
								Новости
							</div>
						</div>
						<a data-da=".news-block__container,768" href="/news" class="news-block__all-news _fw btn btn-white">
							Все новости
						</a>
					</div>
					<div class="news-block__items-wrapper">
						<div class="news-block__big-block big-news">
							@if (isset($news[0]) and $news[0]->name != '')
							<a href="{{ route('news.tidings', ['id' => $news[0]->id]) }}" class="big-news__item with-banner">
								<div class="big-news__media media-block">
									<picture><source srcset="{{$news[0]->img}}" type="image/webp"><img src="{{$news[0]->img}}" alt="Изображение новости"></picture>
								</div>
								<div class="big-news__content">
									<div class="big-news__title article-title">
										{{$news[0]->name}}
									</div>

									<div class="big-news__description article-description">
										{!! $news[0]->pod_text !!}
									</div>
								</div>
							</a>
							@endif



							<div class="big-news__banner ">
								<a href="#" class="media-block">
									<picture>
										<source srcset="{{ asset('image/banner1.webp') }}" type="image/webp">
										<img src="{{ asset('image/banner1.jpg') }}" alt="Баннер">
									</picture>
								</a>
							</div>

						</div>
						<div class="news-block__big-items">
						@for ($i = 1; $i < 3; $i++)
							@if (isset($news[$i]) && $news[$i]->name != '')
							<div class="news-block__item">
								<a href="{{ route('news.tidings', ['id' => $news[$i]->id]) }}">
									<div class="news-block__item-media media-block">
										<picture><source srcset="{{ $news[$i]->img }}" type="image/webp"><img src="{{ $news[$i]->img }}" alt="Изображение новости"></picture>
									</div>
									<div class="news-block__date">
										{{ $news[$i]->date }}
									</div>
									<div class="news-block__title title">
										{{ $news[$i]->name }}
									</div>
									<div class="news-block__author-name title">
										{{ $news[$i]->author }}
									</div>
									<div class="news-block__description article-description">
										{!! $news[$i]->pod_text !!}
									</div>
								</a>
							</div>
							@endif
						@endfor
						</div>
						@if (isset($news[3]) && $news[3]->name != '')
						<div class="news-block__items-content">

							@for ($i = 3; $i < 7; $i++)
								@if (isset($news[$i]) && $news[$i]->name != '')
								<div class="news-block__item">
									<a href="{{ route('news.tidings', ['id' => $news[$i]->id]) }}">
										<div class="news-block__item-media media-block">
											<picture><source srcset="{{ $news[$i]->img }}" type="image/webp"><img src="{{ $news[$i]->img }}" alt="Изображение новости"></picture>
										</div>
										<div class="news-block__date">
										{{ Carbon\Carbon::parse($news[$i]->date)->format('d.m.Y')}}
										</div>
										<div class="news-block__title title">
											{{ $news[$i]->name }}
										</div>
										<div class="news-block__author-name title">
											{{ $news[$i]->author }}
										</div>
										<div class="news-block__description article-description">
											{!! $news[$i]->pod_text !!}
										</div>
									</a>
								</div>
								@endif
							@endfor

						</div>
						@endif
					</div>
				</div>
			</section>
			<section class="join-us">
				<div class="join-us__container">
					<div class="join-us__wrapper">
						<div class="join-us__heading section__heading">
							<div class="join-us__heading-text section__heading-text">
								<div class="join-us__title main-page__section-title">
									Присоединяйтесь к нам
								</div>
								<div class="join-us__subtitle main-page__section-subtitle">
									Разместите свой проект или предложите помощь уже существующим
								</div>
							</div>
						</div>
						<div class="join-us__content">
							<div class="join-us__item">
								<div class="join-us__media media-block">
									<a href="#"><picture><source srcset="image/join-us1.webp" type="image/webp"><img src="image/join-us1.png" alt="Изображение"></picture></a>
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
			</section>
			<section class="banner">
				<div class="banner__container">
					<div class="banner__wrapper">
						<a href="#" class="media-block">
							<picture><source srcset="{{ asset('image/bigbanner.webp') }}" type="image/webp"><img class="" src="{{ asset('image/bigbanner.png') }}" alt="Изображение баннера"></picture>
						</a>
					</div>
				</div>
			</section>
		</main>

@endsection