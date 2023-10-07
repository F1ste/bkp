@extends('layouts.admin')

@section('title', 'Новости')

@section('content')


            <div class="page__container" style="min-height: 100vh;">
                <section class="my-projects personal-account">
                    <div class="my-projects__container">
                        <div class="my-projects__content">
                            <div class="my-projects__heading block-heading">
                                <div class="my-projects__title personal__title">
                                    Тег
                                </div>
                            </div>


                            <div style="display: flex;justify-content: space-between;margin-top: 20px;">
                            </div>


                            <div style="margin-top: 20px; margin-bottom: 20px;">
                                @foreach($user as $el)
                                <div class="my-projects__item" style="margin-bottom: 15px;">
                                    <a href="{{ route('admin.user.edit', ['id' => $el->id]) }}">
                                        <div class="my-projects__project-name">
                                            {{ $el->email }}
                                        </div>

                                    </a>
                                </div>
                                @endforeach
                            </div>
                            {{$user->withQueryString()->links('pagination::default')}}


                        </div>
                    </div>
                    
                </section>


            </div>


            <style>
                .serch_news .select__value{
                    padding: 5px;
                }

                .serch_news .select__title {
                        border-radius: 6px;
                    }
                .serch_news .select_form__select {
                    margin-top: 5px;
                }
            </style>

@endsection
