@extends('layouts.authorisation')

@section('title', 'Отклики')

@section('content')
    <div class="page__container">
        <section class="feedback personal-account">
            <div class="feedback__container">
                <div class="feedback__content">
                    <div class="feedback__back-btn">
                        <a href="{{ url()->previous() }}" class="back-btn">
                            Назад
                            <svg xmlns="http://www.w3.org/2000/svg" width="61" height="16" viewBox="0 0 61 16" fill="none">
                                <path d="M60 9C60.5523 9 61 8.55228 61 8C61 7.44772 60.5523 7 60 7V9ZM0.292892 7.29289C-0.0976295 7.68342 -0.0976295 8.31658 0.292892 8.70711L6.65686 15.0711C7.04738 15.4616 7.68055 15.4616 8.07107 15.0711C8.46159 14.6805 8.46159 14.0474 8.07107 13.6569L2.41422 8L8.07107 2.34315C8.46159 1.95262 8.46159 1.31946 8.07107 0.928932C7.68055 0.538408 7.04738 0.538408 6.65686 0.928932L0.292892 7.29289ZM60 7L1 7V9L60 9V7Z" fill="#1D1D1B" />
                            </svg>
                        </a>
                    </div>
                    <div class="feedback__heading">
                        <div class="feedback__heading-info">
                            <div class="feedback__title">
                                {{ $feedback->service->name_proj }}
                            </div>
                            <div class="feedback__info">
                                <div class="feedback__info-item">
                                    {{ $mysubarr['sel'] ?? '' }}
                                </div>
                                <div class="feedback__info-item">
                                    @if ($feedback->status == 1)
                                        Статус отклика: Одобрено
                                    @elseif ($feedback->status == 2)
                                        Статус отклика: Отказано
                                    @else
                                        Статус отклика: На рассмотрении
                                    @endif
                                </div>
                                <div class="feedback__info-item">
                                    {{ $mysubarr['inp'] }}
                                </div>
                            </div>
                        </div>

                        <div class="feedback__buttons feedback-status">
                            <button data-update="{{ route('profile.chat.create') }}" data-user1="{{ $feedback->service->user_id }}" data-user2="{{ $feedback->user_id }}" id="getChat" class="feedback__btn btn btn-white">
                                Перейти в диалог
                            </button>
                            <button data-update="{{ route('profile.feedback.decline', ['id' => $feedback->id]) }}" data-status="decline" class="feedback__btn btn btn-white">
                                Отклонить
                            </button>
                            <button data-update="{{ route('profile.feedback.accept', ['id' => $feedback->id]) }}" data-status="aprove" class="feedback__btn btn btn-filled">
                                Принять
                            </button>
                        </div>
                    </div>
                    <div class="feedback__project-request">
                        <div class="feedback__title">
                            Запрос размещенный в карточке проекта
                        </div>
                        <div class="feedback__text main-text">
                            {!! $mysubarr['tex'] !!}
                            <br><br>
                            Зарегистрируйтесь сегодня!
                        </div>
                    </div>
                    <div class="feedback__letter">
                        <div class="feedback__title">
                            Сопроводительное письмо
                        </div>
                        <div class="feedback__text main-text">
                            {{ $feedback->cover_letter }}
                            <br><br>
                            {{ $feedback->name }}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
