@extends('layouts.authorisation')

@section('title', 'Проекты')

@section('content')

    <div class="page__container">
        <section class="my-projects personal-account">
            <div class="my-projects__container">
                <div class="my-projects__content">
                    <div class="my-projects__heading block-heading">
                        <div class="my-projects__title personal__title">
                            Мои проекты
                        </div>
                    </div>

                    <div class="my-projects__projects-items">
                        @foreach ($collections as $el)
                            <div class="my-projects__item">
                                <a href="{{ route('profile.services.single', ['id' => $el->id]) }}">
                                    <div class="my-projects__project-name">
                                        {{ $el->name_proj }}
                                    </div>
<!--                                     <div class="my-projects__notifications _icon-notification">
                                    @php
                                        $counter = 0;
                                    @endphp
                                    @foreach ($notifications as $elevent)
                                        @if ($elevent->id_project == $el->id)
                                            @php $counter++;  @endphp
                                        @endif
                                    @endforeach
                                    @php
                                        echo $counter;
                                    @endphp
                                    </div> -->
                                </a>
                            </div>
                        @endforeach
                    </div>

                    <a href="{{ route('profile.services.new') }}" class="my-projects__btn btn btn-white">Создать проект</a>
                </div>
            </div>
        </section>

    </div>

@endsection
