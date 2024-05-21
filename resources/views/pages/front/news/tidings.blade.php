@extends('layouts.index')

@section('content')
    <main class="page">
        <section class="news-single">
            <div class="news-single__container">
                <div class="news-single__back-btn">
                    <a href="/news" class="back-btn">
                        Назад
                        <svg xmlns="http://www.w3.org/2000/svg" width="61" height="16" viewBox="0 0 61 16" fill="none">
                            <path d="M60 9C60.5523 9 61 8.55228 61 8C61 7.44772 60.5523 7 60 7V9ZM0.292892 7.29289C-0.0976295 7.68342 -0.0976295 8.31658 0.292892 8.70711L6.65686 15.0711C7.04738 15.4616 7.68055 15.4616 8.07107 15.0711C8.46159 14.6805 8.46159 14.0474 8.07107 13.6569L2.41422 8L8.07107 2.34315C8.46159 1.95262 8.46159 1.31946 8.07107 0.928932C7.68055 0.538408 7.04738 0.538408 6.65686 0.928932L0.292892 7.29289ZM60 7L1 7V9L60 9V7Z" fill="#1D1D1B" />
                        </svg>
                    </a>
                </div>
                <div class="news-single__content">
                    <div class="news-single__heading">
                        <div class="news-single__title article-title" style="max-width: 1155px;">
                            {{ $collection->name }}
                        </div>
                        <div class="news-single__info">
                            <div class="news-single__date">
                                {{ Carbon\Carbon::parse($collection->date)->format('d.m.Y') }}
                            </div>
                        </div>
                    </div>
                    <div class="news-single__main-image">
                        <div class="news-single__media-block media-block">
                            <picture>
                                <source srcset="{{ $collection->img7 }}" type="image/webp">
                                <img src="{{ $collection->img7 }}" alt="Изображение проекта" style="object-position: top;">
                            </picture>
                        </div>
                    </div>
                    <div class="news-single__article">
                        <div class="lg:flex-row justify-between">
                            <div class="news-single__article-text">
                                <div class="news-single__short-description">
                                    {!! $collection->pod_text !!}
                                </div>
                                <div class="news-single__main-text">
                                    {!! $collection->text !!}
                                </div>
                            </div>
                            <div class="article-single__banner">
                                <x-banners />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        @if ($collection->img6 != '' or $collection->img2 != '' or $collection->img3 != '' or $collection->img4 != '' or $collection->img5 != '' or $collection->img6 != '')
            <div class="project-gallery">
                <div class="project-gallery__container">
                    <div class="project-gallery__slider swiper">
                        <div class="swiper-wrapper">
                            <!-- Slides -->

                        @if ($collection->img2 != '')
                            <div class="swiper-slide media-block">
                                <picture>
                                    <source srcset="{{ $collection->img2 }}" type="image/webp"><img src="{{ $collection->img2 }}" alt="Изображение галереи">
                                </picture>
                            </div>
                        @endif

                        @if ($collection->img3 != '')
                            <div class="swiper-slide media-block">
                                <picture>
                                    <source srcset="{{ $collection->img3 }}" type="image/webp"><img src="{{ $collection->img3 }}" alt="Изображение галереи">
                                </picture>
                            </div>
                        @endif

                        @if ($collection->img4 != '')
                            <div class="swiper-slide media-block">
                                <picture>
                                    <source srcset="{{ $collection->img4 }}" type="image/webp"><img src="{{ $collection->img4 }}" alt="Изображение галереи">
                                </picture>
                            </div>
                        @endif

                        @if ($collection->img5 != '')
                            <div class="swiper-slide media-block">
                                <picture>
                                    <source srcset="{{ $collection->img5 }}" type="image/webp"><img src="{{ $collection->img5 }}" alt="Изображение галереи">
                                </picture>
                            </div>
                        @endif

                        @if ($collection->img6 != '')
                            <div class="swiper-slide media-block">
                                <picture>
                                    <source srcset="{{ $collection->img6 }}" type="image/webp"><img src="{{ $collection->img6 }}" alt="Изображение галереи">
                                </picture>
                            </div>
                        @endif

                        </div>
                        <!-- If we need pagination -->
                        <div class="project-gallery__pagination"></div>
                        <div class="slider-nav">
                            <div class="slider__button-prev _icon-chevron"></div>
                            <div class="slider__button-next _icon-chevron"></div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        </section>
    </main>

    <style>
        .swiper-slide-active {
            transform: none !important;
        }

        .media-block img {
            width: 100%;
            height: auto !important;
        }
    </style>
@endsection
