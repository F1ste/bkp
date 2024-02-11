@extends('layouts.index')

@section('title', 'Создать коллекцию')

@section('content')

    <section class="collection section-base" id="collection-store" data-image="{{ route('profile.collection.upload') }}" data-store="{{ route('profile.collection.store') }}">
        <div class="container">
            <div class="section-header">
                <h1>Создать коллекцию</h1>
            </div>
            <div class="section-body">
                <div class="collection-group">
                    <div class="collection-item collection-item__new">
                        <a href="#" class="collection-item__upload">
                            <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72" viewBox="0 0 72 72" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M40.8828 5C40.8828 2.23858 38.6442 0 35.8828 0C33.1214 0 30.8828 2.23858 30.8828 5V29.8184H5C2.23857 29.8184 0 32.0569 0 34.8184C0 37.5798 2.23857 39.8184 5 39.8184H30.8828V66.5C30.8828 69.2614 33.1214 71.5 35.8828 71.5C38.6442 71.5 40.8828 69.2614 40.8828 66.5V39.8184H66.5C69.2614 39.8184 71.5 37.5798 71.5 34.8184C71.5 32.0569 69.2614 29.8184 66.5 29.8184H40.8828V5Z" fill="#242527" fill-opacity="0.5" />
                            </svg>
                        </a>
                    </div>
                    <div class="collection-item collection-item__new">
                        <a href="#" class="collection-item__upload">
                            <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72" viewBox="0 0 72 72" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M40.8828 5C40.8828 2.23858 38.6442 0 35.8828 0C33.1214 0 30.8828 2.23858 30.8828 5V29.8184H5C2.23857 29.8184 0 32.0569 0 34.8184C0 37.5798 2.23857 39.8184 5 39.8184H30.8828V66.5C30.8828 69.2614 33.1214 71.5 35.8828 71.5C38.6442 71.5 40.8828 69.2614 40.8828 66.5V39.8184H66.5C69.2614 39.8184 71.5 37.5798 71.5 34.8184C71.5 32.0569 69.2614 29.8184 66.5 29.8184H40.8828V5Z" fill="#242527" fill-opacity="0.5" />
                            </svg>
                        </a>
                    </div>
                    <div class="collection-item collection-item__new">
                        <a href="#" class="collection-item__upload">
                            <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72" viewBox="0 0 72 72" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M40.8828 5C40.8828 2.23858 38.6442 0 35.8828 0C33.1214 0 30.8828 2.23858 30.8828 5V29.8184H5C2.23857 29.8184 0 32.0569 0 34.8184C0 37.5798 2.23857 39.8184 5 39.8184H30.8828V66.5C30.8828 69.2614 33.1214 71.5 35.8828 71.5C38.6442 71.5 40.8828 69.2614 40.8828 66.5V39.8184H66.5C69.2614 39.8184 71.5 37.5798 71.5 34.8184C71.5 32.0569 69.2614 29.8184 66.5 29.8184H40.8828V5Z" fill="#242527" fill-opacity="0.5" />
                            </svg>
                        </a>
                    </div>
                    <div class="collection-item collection-item__new">
                        <a href="#" class="collection-item__upload">
                            <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72" viewBox="0 0 72 72" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M40.8828 5C40.8828 2.23858 38.6442 0 35.8828 0C33.1214 0 30.8828 2.23858 30.8828 5V29.8184H5C2.23857 29.8184 0 32.0569 0 34.8184C0 37.5798 2.23857 39.8184 5 39.8184H30.8828V66.5C30.8828 69.2614 33.1214 71.5 35.8828 71.5C38.6442 71.5 40.8828 69.2614 40.8828 66.5V39.8184H66.5C69.2614 39.8184 71.5 37.5798 71.5 34.8184C71.5 32.0569 69.2614 29.8184 66.5 29.8184H40.8828V5Z" fill="#242527" fill-opacity="0.5" />
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="collection-info">
                    <div class="collection-info__group">
                        <div class="collection-info__item">
                            <label for="">Название:</label>
                            <input type="text" id="name" placeholder="Название коллекции">
                        </div>
                        <div class="collection-info__item">
                            <label for="">Краткое описание:</label>
                            <textarea id="excerpt" placeholder="Краткое описание коллекции"></textarea>
                        </div>
                        <div class="collection-info__item">
                            <label for="">Стиль:</label>
                            <input type="text" id="style" placeholder="Стиль коллекции">
                        </div>
                        <div class="collection-info__item">
                            <label for="">О цветовой гамме:</label>
                            <textarea id="gamma" placeholder="Напишите подробное описание продукта"></textarea>
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
