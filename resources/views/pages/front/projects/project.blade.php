@extends('layouts.index')

@section('content')
    <main class="page">
        <section class="project-main">
            <div class="project-main__container">
                <div class="project-main__back-btn">
                    <a href="/projects" class="back-btn">
                        Назад
                        <svg xmlns="http://www.w3.org/2000/svg" width="61" height="16" viewBox="0 0 61 16" fill="none">
                            <path d="M60 9C60.5523 9 61 8.55228 61 8C61 7.44772 60.5523 7 60 7V9ZM0.292892 7.29289C-0.0976295 7.68342 -0.0976295 8.31658 0.292892 8.70711L6.65686 15.0711C7.04738 15.4616 7.68055 15.4616 8.07107 15.0711C8.46159 14.6805 8.46159 14.0474 8.07107 13.6569L2.41422 8L8.07107 2.34315C8.46159 1.95262 8.46159 1.31946 8.07107 0.928932C7.68055 0.538408 7.04738 0.538408 6.65686 0.928932L0.292892 7.29289ZM60 7L1 7V9L60 9V7Z" fill="#1D1D1B" />
                        </svg>
                    </a>
                </div>
                <div class="project-main__content">
                    <div class="project-main__project-image media-block">
                        <picture>
                            <source srcset="{{ $project->img1 }}" type="image/webp"><img src="{{ $project->img1 }}" alt="Изображение проекта">
                        </picture>
                    </div>
                    <div class="project-main__project-info">
                        <div class="project-main__project-heading">
                            <div class="project-main__project-type">
                                {{ $project->tema }}
                            </div>
                            <div class="project-main__project-name">
                                @if ($project->is_project_name_hidden)
                                    {{ $project->tema }} <i style="opacity:.5;">(название не указано)</i>
                                @else
                                    {{ $project->name_proj }}
                                @endif
                            </div>
                        </div>
                        <div class="project-main__brief-info brief-info__col main-text">
                            <div class="project-main__project-duration">
                                {{ Carbon\Carbon::parse($project->date_service_from)->format('d.m.Y') }} —
                                {{ Carbon\Carbon::parse($project->date_service_to)->format('d.m.Y') }}
                            </div>
                            <div class="project-main__brief-item project-info__item">
                                <a href="{{ $project->user->sait }}">{{ $project->user->sait }}</a>
                            </div>
                            <div class="project-main__brief-item project-info__item">
                                @if (!$project->is_organization_hidden)
                                    {{ $project->user->org }}
                                @endif
                            </div>
                            <div class="project-main__project-geo _icon-geo">
                                {{ $project->region }}
                            </div>
                        </div>
                        <div class="project-main__short-description">
                            <div class="project-main__text main-text">
                                {!! $project->excerpt !!}
                            </div>
                            <button type="button" class="project-main__btn-description">Еще</button>
                        </div>
                        <div class="project-main__socials socials">
                            <a href="{{ $project->user->telegram }}" class="socials__social-item icon-telegram">
                                <i class="socials__icon _icon-telegram"></i>
                            </a>
                            <a href="{{ $project->user->vk }}" class="socials__social-item icon-vk">
                                <i class="socials__icon _icon-vk"></i>
                            </a>
                            {{-- <a href="{{ $project->user->youtube }}" class="socials__social-item icon-youtube">
                                <i class="socials__icon _icon-youtube"></i>
                            </a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="roles" class="partners-searching">
            <div class="partners-searching__container">
                <div class="partners-searching__content">
                    <div class="partners-searching__title">
                        Кого ищем:
                    </div>
                    <div data-tabs data-tabs-animate="200" class="partners-searching__tabs tabs">
                        <nav data-tabs-titles class="partners-searching__heading tabs__navigation">
                        @foreach ($serch as $key => $serchs)
                        @if (\Illuminate\Support\Carbon::parse($serchs->inp)->gte(now()))
                            <button type="button" class="partners-searching__heading-item {{ $key === 0 ? '_tab-active' : '' }}">
                        @else
                            <button type="button" class="partners-searching__heading-item _tab-inactive">
                        @endif
                                {{ $serchs->sel }}
                            </button>
                        @endforeach
                        </nav>
                        <div data-tabs-body class="tabs__content">
                        @foreach ($serch as $serchs)
                            <div class="tabs__body feedback-send">
                                <div class="partners-searching__finding-date">
                                    Ищем до {{ $serchs->inp }}
                                </div>
                                <div class="partners-searching__partner-description">
                                    <p>{!! $serchs->tex !!}</p>
                                </div>
                                <div class="partners-searching__statistic">
                                    <div class="partners-searching__replies">
                                        <b>Откликнулось:</b> {{ $project->feedbacks->count() }}
                                    </div>
                                @if ($project->status == $project::STATUS_PUBLISHED && \Illuminate\Support\Carbon::parse($serchs->inp)->gte(now()))
                                    <button type="button" data-popup="#feedbackPopup" data-role="{{ $serchs->sel }}" class="partners-searching__btn btn btn-filled _fw">
                                        Откликнуться
                                    </button>
                                @else
                                    <button type="button" class="partners-searching__btn btn btn-disabled _fw" disabled>
                                        В архиве
                                    </button>
                                @endif
                                </div>
                            </div>
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>

    @if (
        $project->video ||
        $project->img2 ||
        $project->img3 ||
        $project->img4 ||
        $project->img5 ||
        $project->img6
    )
        <div class="project-gallery">
            <div class="project-gallery__container">
                <div class="project-gallery__slider swiper">
                    <div class="swiper-wrapper">
                    <!-- Slides -->

                    @if ($project->video)
                        <div class="swiper-slide media-block">
                            {!! $project->video !!}
                        </div>
                    @endif

                    @foreach (['img2', 'img3', 'img4', 'img5', 'img6'] as $img)
                        @if ($project->$img)
                        <div class="swiper-slide media-block">
                            <picture>
                                <source srcset="{{ $project->$img }}" type="image/webp">
                                <img src="{{ $project->$img }}" alt="Изображение галереи">
                            </picture>
                        </div>
                        @endif
                    @endforeach

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

    </main>
    <x-feedback-popup/>
    <style>
        .swiper-slide-active {
            transform: none !important;
        }

        .media-block img {
            width: 100%;
            height: auto !important;
        }
    </style>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Clamp.js/0.5.1/clamp.min.js"></script>
        <script>
            const projectDescriptionBtn = document.querySelector(".project-main__btn-description");
            const truncate = document.querySelector(".project-main__text");

            projectDescriptionBtn?.addEventListener("click", (() => {
                truncate.classList.toggle("active-text");
                projectDescriptionBtn.textContent = "Закрыть";

                $clamp(truncate, {
                    clamp: !truncate.classList.contains("active-text") ? '2' : 'initial', 
                });
                if (!truncate.classList.contains("active-text")) projectDescriptionBtn.textContent = "Еще";
            }));
            

        </script>
@endsection
