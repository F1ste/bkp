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
                                <a href="/projects?tip%5B%5D=Дизайн">
                                    <div class="projects-category__media media-block">
                                        <picture>
                                            <source srcset="{{ asset('image/projects-category/design.webp') }}" type="image/webp">
                                            <img src="{{ asset('image/projects-category/design.jpg') }}" alt="Дизайн">
                                        </picture>
                                    </div>
                                    <div class="projects-category__category-name">
                                        Дизайн
                                    </div>
                                </a>
                            </div>
                            <div class="projects-category__item">
                                <a href="/projects?tip%5B%5D=Литература">
                                    <div class="projects-category__media media-block">
                                        <picture>
                                            <source srcset="{{ asset('image/projects-category/literature.webp') }}" type="image/webp">
                                            <img src="{{ asset('image/projects-category/literature.jpg') }}" alt="Литература">
                                        </picture>
                                    </div>
                                    <div class="projects-category__category-name">
                                        Литература
                                    </div>
                                </a>
                            </div>
                            <div class="projects-category__item">
                                <a href="/projects?tip%5B%5D=Междисциплинарные+проекты">
                                    <div class="projects-category__media media-block">
                                        <picture>
                                            <source srcset="{{ asset('image/projects-category/interdisciplinary.webp') }}" type="image/webp">
                                            <img src="{{ asset('image/projects-category/interdisciplinary.jpg') }}" alt="Междисциплинарные проекты">
                                        </picture>
                                    </div>
                                    <div class="projects-category__category-name">
                                        Междисциплинарные проекты
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="projects-category__masonry-col">
                            <div class="projects-category__item">
                                <a href="/projects?tip%5B%5D=Драмтеатр">
                                    <div class="projects-category__media media-block">
                                        <picture>
                                            <source srcset="{{ asset('image/projects-category/dramtheatr.webp') }}" type="image/webp">
                                            <img src="{{ asset('image/projects-category/dramtheatr.jpg') }}" alt="Драмтеатр">
                                        </picture>
                                    </div>
                                    <div class="projects-category__category-name">
                                        Драмтеатр
                                    </div>
                                </a>
                            </div>
                            <div class="projects-category__item">
                                <a href="/projects?tip%5B%5D=Визуальные+искусства">
                                    <div class="projects-category__media media-block">
                                        <picture>
                                            <source srcset="{{ asset('image/projects-category/visual.webp') }}" type="image/webp">
                                            <img src="{{ asset('image/projects-category/visual.jpg') }}" alt="Визуальные искусства">
                                        </picture>
                                    </div>
                                    <div class="projects-category__category-name">
                                        Визуальные искусства
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="projects-category__masonry-col">
                            <div class="projects-category__item">
                                <a href="/projects?tip%5B%5D=Музыка">
                                    <div class="projects-category__media media-block">
                                        <picture>
                                            <source srcset="{{ asset('image/projects-category/music.webp') }}" type="image/webp">
                                            <img src="{{ asset('image/projects-category/music.jpg') }}" alt="Music">
                                        </picture>
                                    </div>
                                    <div class="projects-category__category-name">
                                        Музыка
                                    </div>
                                </a>
                            </div>
                            <div class="projects-category__item">
                                <a href="/projects?tip%5B%5D=Балет+и+танец">
                                    <div class="projects-category__media media-block">
                                        <picture>
                                            <source srcset="{{ asset('image/projects-category/dance.webp') }}" type="image/webp">
                                            <img src="{{ asset('image/projects-category/dance.jpg') }}" alt="Балет и танец">
                                        </picture>
                                    </div>
                                    <div class="projects-category__category-name">
                                        Балет и танец
                                    </div>
                                </a>
                            </div>
                            <div class="projects-category__item">
                                <a href="/projects?tip%5B%5D=Опера">
                                    <div class="projects-category__media media-block">
                                        <picture>
                                            <source srcset="{{ asset('image/projects-category/opera.webp') }}" type="image/webp">
                                            <img src="{{ asset('image/projects-category/opera.jpg') }}" alt="Опера">
                                        </picture>
                                    </div>
                                    <div class="projects-category__category-name">
                                        Опера
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="projects-category__masonry-row">
                            <div class="projects-category__item">
                                <a href="/projects?tip%5B%5D=Архитектура">
                                    <div class="projects-category__media media-block">
                                        <picture>
                                            <source srcset="{{ asset('image/projects-category/architecture.webp') }}" type="image/webp">
                                            <img src="{{ asset('image/projects-category/architecture.jpg') }}" alt="Архитектура">
                                        </picture>

                                    </div>
                                    <div class="projects-category__category-name">
                                        Архитектура
                                    </div>
                                </a>
                            </div>
                            <div class="projects-category__item">
                                <a href="/projects?tip%5B%5D=Кино">
                                    <div class="projects-category__media media-block">
                                        <picture>
                                            <source srcset="{{ asset('image/projects-category/film.webp') }}" type="image/webp">
                                            <img src="{{ asset('image/projects-category/film.jpg') }}" alt="Кино">
                                        </picture>
                                    </div>
                                    <div class="projects-category__category-name">
                                        Кино
                                    </div>
                                </a>
                            </div>
                            <div class="projects-category__item">
                                <a href="/projects?tip%5B%5D=Цирк">
                                    <div class="projects-category__media media-block">
                                        <picture>
                                            <source srcset="{{ asset('image/projects-category/circus.webp') }}" type="image/webp">
                                            <img src="{{ asset('image/projects-category/circus.jpg') }}" alt="Цирк">
                                        </picture>
                                    </div>
                                    <div class="projects-category__category-name">
                                        Цирк
                                    </div>
                                </a>
                            </div>
                            <div class="projects-category__item">
                                <a href="/projects?tip%5B%5D=Цирк">
                                    <div class="projects-category__media media-block">
                                        <picture>
                                            <source srcset="{{ asset('image/projects-category/museum.webp') }}" type="image/webp">
                                            <img src="{{ asset('image/projects-category/musuem.jpg') }}" alt="Цирк">
                                        </picture>
                                    </div>
                                    <div class="projects-category__category-name">
                                        Музей
                                    </div>
                                </a>
                            </div>
                            <div class="projects-category__item">
                                <a href="/projects?tip%5B%5D=Другое">
                                    <div class="projects-category__media media-block">
                                        <picture>
                                            <source srcset="{{ asset('image/projects-category/other.webp') }}" type="image/webp">
                                            <img src="{{ asset('image/projects-category/other.jpg') }}" alt="Другое">
                                        </picture>
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
                            <sup class="sup-count help" title="Количество проектов">{{ $projects_total }}</sup>
                        </div>
                    </div>
                    <a href="/projects" class="news-block__all-news _fw btn btn-white">
                        Все проекты
                    </a>
                </div>
                <div class="popular-projects__content">
                @foreach ($projects as $project)
                    <div class="popular-projects__item">
                        <div class="popular-projects__project-type">
                            {{ $project->tema }}
                        </div>
                        <a href="{{ route('projects.project', $project) }}" class="popular-projects__project-name">
                            {{ $project->name_proj }}
                        </a>
                        <div class="popular-projects__project-date">
                            От {{ $project->date_service_from->format('d.m.Y') }}
                        </div>
                        <div class="popular-projects__project-image media-block">
                            <a href="{{ route('projects.project', $project) }}">
                                <picture>
                                    <source srcset="{{ $project->img1 }}" type="image/webp">
                                    <img src="{{ $project->img1 }}" alt="Изображение проекта">
                                </picture>
                            </a>
                        </div>
                        <div class="popular-projects__info">
                            <div class="popular-projects__project-geo _icon-geo">
                                {{ $project->region }}
                            </div>
                            <div class="popular-projects__organization-name">
                                <a href="#">{{ $project->user->org }}</a>
                            </div>
                        </div>
                        <div class="popular-projects__partners-tags partners-tags">
                            <div class="partners-tags__title">
                                Ищем:
                            </div>
                            <div class="partners-tags__tags-wrapper tags">
                            @php
                                $json = json_decode($project->serch);
                            @endphp

                            @foreach ($json as $serchs)
                                @if (\Illuminate\Support\Carbon::parse($serchs->inp)->gte(now()))
                                <a href="{{ route('projects.project', ['project' => $project, '#roles']) }}" class="tags__item btn btn-white">
                                    {{$serchs->sel}}
                                </a>
                                @else
                                <span class="tags__item tags__item--disabled btn btn-white">{{$serchs->sel}}</span>
                                @endif
                            @endforeach
                            </div>
                        </div>
                        <div class="popular-projects__subscribe">
                            <a href="{{ route('projects.project', $project) }}" class="popular-projects__subscribe-btn _fw btn btn-filled">Подробнее</a>
                        </div>
                    </div>
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
                    <a href="/news" class="news-block__all-news _fw btn btn-white">
                        Все новости
                    </a>
                </div>
                <div class="news-block__items-wrapper">
                    <div class="news-block__big-block big-news">
                        @if (isset($news[0]) and $news[0]->name != '')
                        <!-- with-banner модификатор для  big-news__item, если банер активен -->
                            <a href="{{ route('news.tidings', $news[0]) }}" class="big-news__item">
                                <div class="big-news__media media-block">
                                    <picture>
                                        <source srcset="{{ $news[0]->img }}" type="image/webp">
                                        <img src="{{ $news[0]->img }}" alt="Изображение новости">
                                    </picture>
                                </div>
                                <div class="big-news__content">
                                    <div class="big-news__title article-title">
                                        {{ $news[0]->name }}
                                    </div>

                                    <div class="big-news__description article-description">
                                        <object>
                                            {!! strip_tags($news[0]->pod_text) !!}
                                        </object>
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
                            @if (isset($news[$i]) && $news[$i]->name != '')
                                <div class="news-block__item">
                                    <a href="{{ route('news.tidings', $news[$i]) }}">
                                        <div class="news-block__item-media media-block">
                                            <picture>
                                                <source srcset="{{ $news[$i]->img }}" type="image/webp">
                                                <img src="{{ $news[$i]->img }}" alt="Изображение новости">
                                            </picture>
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
                                        <a href="{{ route('news.tidings', $news[$i]) }}">
                                            <div class="news-block__item-media media-block">
                                                <picture>
                                                    <source srcset="{{ $news[$i]->img }}" type="image/webp">
                                                    <img src="{{ $news[$i]->img }}" alt="Изображение новости">
                                                </picture>
                                            </div>
                                            <div class="news-block__date">
                                                {{ Carbon\Carbon::parse($news[$i]->date)->format('d.m.Y') }}
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
                                <a href="/profile/dashboard">
                                    <picture>
                                        <source srcset="image/join-us1.webp" type="image/webp">
                                        <img src="image/join-us1.png" alt="Изображение">
                                    </picture>
                                </a>
                            </div>
                            <div class="join-us__info">
                                <div class="join-us__text">
                                    <div class="join-us__text-title">
                                        Предложить проект
                                    </div>
                                    <div class="join-us__text-desrcription">
                                        Предложите свою идею и укажите,
                                        какая помощь вам нужна
                                    </div>
                                </div>
                                <a href="/profile/dashboard" class="join-us__btn _fw btn btn-filled">Перейти</a>
                            </div>
                        </div>
                        <div class="join-us__item">
                            <div class="join-us__media media-block">
                                <a href="/projects">
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
                                        Ознакомьтесь с перечнем проектов и
                                        предложите свою помощь
                                    </div>
                                </div>
                                <a href="/projects" class="join-us__btn _fw btn btn-filled">Перейти</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- <section class="banner">
            <div class="banner__container">
                <div class="banner__wrapper">
                    <a href="#" class="media-block">
                        <picture>
                            <source srcset="{{ asset('image/bigbanner.webp') }}" type="image/webp">
                            <img class="" src="{{ asset('image/bigbanner.png') }}" alt="Изображение баннера">
                        </picture>
                    </a>
                </div>
            </div>
        </section> --}}
    </main>
@endsection
