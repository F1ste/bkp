@extends('layouts.index')

@section('title', 'Редактировать коллекцию')

@section('content')

    <section class="collection section-base" id="collection-edit" data-id="{{ $id }}" data-image="{{ route('profile.collection.upload') }}" data-update="{{ route('profile.collection.edit') }}">
        <div class="container">
            <div class="section-header">
                <h1>Редактировать коллекцию</h1>
            </div>
            <div class="section-body">
                <div class="collection-group">
                @foreach ($images as $image)
                    <div class="collection-item collection-item__new">
                        <div class="collection-item__delete">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="26" viewBox="0 0 25 26" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M24.2606 4.79497C25.163 3.89258 25.163 2.42952 24.2606 1.52713C23.3582 0.624745 21.8951 0.624745 20.9928 1.52713L12.3938 10.1261L4.22544 1.9578C3.32305 1.05541 1.85999 1.05541 0.957603 1.9578C0.0552143 2.86019 0.0552143 4.32325 0.957603 5.22564L9.12593 13.394L0.895542 21.6244C-0.00684679 22.5267 -0.00684771 23.9898 0.895541 24.8922C1.79793 25.7946 3.26099 25.7946 4.16338 24.8922L12.3938 16.6618L21.0548 25.3229C21.9572 26.2252 23.4203 26.2252 24.3227 25.3229C25.2251 24.4205 25.225 22.9574 24.3227 22.055L15.6616 13.394L24.2606 4.79497Z" fill="#242527" />
                            </svg>
                        </div>
                        <img src="{{ $image }}" alt="">
                    </div>
                @endforeach
                @for ($i = 0; 4 - count($images) > $i; $i++)
                    <div class="collection-item collection-item__new">
                        <a href="#" class="collection-item__upload">
                            <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72" viewBox="0 0 72 72" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M40.8828 5C40.8828 2.23858 38.6442 0 35.8828 0C33.1214 0 30.8828 2.23858 30.8828 5V29.8184H5C2.23857 29.8184 0 32.0569 0 34.8184C0 37.5798 2.23857 39.8184 5 39.8184H30.8828V66.5C30.8828 69.2614 33.1214 71.5 35.8828 71.5C38.6442 71.5 40.8828 69.2614 40.8828 66.5V39.8184H66.5C69.2614 39.8184 71.5 37.5798 71.5 34.8184C71.5 32.0569 69.2614 29.8184 66.5 29.8184H40.8828V5Z" fill="#242527" fill-opacity="0.5" />
                            </svg>
                        </a>
                    </div>
                @endfor
                </div>
                <div class="collection-info">
                    <div class="collection-info__group">
                        <div class="collection-info__item">
                            <label for="">Название:</label>
                            <input type="text" id="name" placeholder="Название коллекции" value="{{ $collection->name }}">
                        </div>
                        <div class="collection-info__item">
                            <label for="">Краткое описание:</label>
                            <textarea id="excerpt" placeholder="Краткое описание коллекции">{{ $collection->excerpt }}</textarea>
                        </div>
                        <div class="collection-info__item">
                            <label for="">Стиль:</label>
                            <input type="text" id="style" placeholder="Стиль коллекции" value="{{ $collection->style }}">
                        </div>
                        <div class="collection-info__item">
                            <label for="">О цветовой гамме:</label>
                            <textarea id="gamma" placeholder="Напишите подробное описание продукта">{{ $collection->gamma }}</textarea>
                        </div>
                        <div class="collection-info__item">
                            <button id="store-button">Опубликовать</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
