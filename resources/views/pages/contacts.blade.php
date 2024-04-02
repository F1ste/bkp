@extends('layouts.index')

@section('content')
    <main class="page">
        <section class="contacts section__heading">
            <div class="contacts__container">

                <div class="contacts__col">
                    <div class="contacts__title section__title">
                        Контакты
                    </div>
                @foreach ($contact as $item)
                    <div class="contacts__info">
                        {!! $item->description !!}
                    </div>
                @endforeach
                </div>

                <div class="contacts__col">
                    <div class="contacts__media">
                        <picture>
                            <source srcset="{{ asset('image/contacts/contacts.webp') }}" type="image/webp">
                            <img src="{{ asset('image/contacts/contacts.jpg') }}" alt="" class="mw-100">
                        </picture>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
