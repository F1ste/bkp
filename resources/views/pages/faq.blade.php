@extends('layouts.index')
@section('content')
    <main class="page">
        <section class="faq">
            <div class="faq__container">
                <div class="faq__heading section__heading">
                    <div class="faq__heading-text section__heading-text">
                        <div class="faq__title section__title">
                            Вопрос-ответ
                        </div>
                    </div>
                </div>
                <div class="faq__content">
                    @foreach ($faq as $item)
                        <div class="faq__col">
                            <div class="faq__question-title">
                                {{ $item->quest }}
                            </div>
                            <div class="faq__question-text">
                                {{ $item->description }}
                            </div>
                        </div>
                        <div class="faq__col">
                            <div class="faq__media media-block">
                                <picture>
                                    <source srcset="{{ $item->img }}" type="image/webp"><img src="{{ $item->img }}"
                                        alt="">
                                </picture>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </main>
@endsection
