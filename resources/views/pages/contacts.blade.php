@extends('layouts.index')
@section('content')
    <main class="page">
        <section class="contacts">
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
                @foreach ($contact as $item)
                    <div class="contacts__media ">
                        {!! $item->map !!}
                    </div>
                @endforeach
                </div>

            </div>
        </section>
    </main>
@endsection
