@extends('layouts.index')

@section('title', 'Мероприятия')

@section('content')

    <main class="main__container">
        <section class="events">
            <div class="events__container">
                <h1 class="text__tittle">Мероприятия</h1>
                <div class="select-place">
                    <select id="city" class="selector">
                        <option>Город</option>
                        <option value="Москва">Москва</option>
                        <option value="Москва">Москва</option>
                    </select>
                    <select id="year" class="selector">
                        <option>Год</option>
                        <option value="2022">2022</option>
                        <option value="2021">2021</option>
                    </select>
                    <select id="month" class="selector">
                        <option>Месяц</option>
                        <option value="Январь">Январь</option>
                        <option value="Февраль">Февраль</option>
                    </select>
                    <button id="search" class="btn btn-events">Поиск</button>
                </div>
                <div class="events__items">
                    <div class="event-item">
                        <div>
                            <img src="/image/pexels-cottonbro-6110357.png" alt="">
                        </div>
                        <div class="event-item-info">
                            <p class="event-item-title"><strong>Представление коллекции весна/лето</strong></p>
                            <p>27-29 марта</p>
                            <p><strong>Симферополь</strong></p>
                        </div>
                    </div>
                    <div class="event-item">
                        <div>
                            <img src="/image/pexels-cottonbro-6110357.png" alt="">
                        </div>
                        <div class="event-item-info">
                            <p class="event-item-title"><strong>Представление коллекции весна/лето</strong></p>
                            <p>27-29 марта</p>
                            <p><strong>Симферополь</strong></p>
                        </div>
                    </div>
                    <div class="event-item">
                        <div>
                            <img src="/image/pexels-cottonbro-6110357.png" alt="">
                        </div>
                        <div class="event-item-info">
                            <p class="event-item-title"><strong>Представление коллекции весна/лето</strong></p>
                            <p>27-29 марта</p>
                            <p><strong>Симферополь</strong></p>
                        </div>
                    </div>
                    <div class="event-item">
                        <div>
                            <img src="/image/pexels-cottonbro-6110357.png" alt="">
                        </div>
                        <div class="event-item-info">
                            <p class="event-item-title"><strong>Представление коллекции весна/лето</strong></p>
                            <p>27-29 марта</p>
                            <p><strong>Симферополь</strong></p>
                        </div>
                    </div>
                    <div class="event-item">
                        <div>
                            <img src="/image/pexels-cottonbro-6110357.png" alt="">
                        </div>
                        <div class="event-item-info">
                            <p class="event-item-title"><strong>Представление коллекции весна/лето</strong></p>
                            <p>27-29 марта</p>
                            <p><strong>Симферополь</strong></p>
                        </div>
                    </div>
                    <div class="event-item">
                        <div>
                            <img src="/image/pexels-cottonbro-6110357.png" alt="">
                        </div>
                        <div class="event-item-info">
                            <p class="event-item-title"><strong>Представление коллекции весна/лето</strong></p>
                            <p>27-29 марта</p>
                            <p><strong>Симферополь</strong></p>
                        </div>
                    </div>
                    <div class="event-item">
                        <div>
                            <img src="/image/pexels-cottonbro-6110357.png" alt="">
                        </div>
                        <div class="event-item-info">
                            <p class="event-item-title"><strong>Представление коллекции весна/лето</strong></p>
                            <p>27-29 марта</p>
                            <p><strong>Симферополь</strong></p>
                        </div>
                    </div>
                    <div class="event-item">
                        <div>
                            <img src="/image/pexels-cottonbro-6110357.png" alt="">
                        </div>
                        <div class="event-item-info">
                            <p class="event-item-title"><strong>Представление коллекции весна/лето</strong></p>
                            <p>27-29 марта</p>
                            <p><strong>Симферополь</strong></p>
                        </div>
                    </div>
                </div>
            </div>

        </section>

    </main>

    <div class="slider__container">
        <div class="slider">
            <div class="slider-track">
                <div class="slider-item">
                    <img src="/image/7af33bb9bf8a0c19898795b2d642099d.jpg" alt="Первый слайд">
                    <div class="slideText"><p>Одежда</p></div>
                </div>
                <div class="slider-item">
                    <img src="/image/pexels-ray-piedra-1502352.png" alt="Второй слайд">
                    <div class="slideText"><p>Обувь</p></div>
                </div>
                <div class="slider-item">
                    <img src="/image/f7480deb63101bf92c01b1673adf5c77.jpg" alt="Третий слайд">
                    <div class="slideText"><p>Одежда</p></div>
                </div>
            </div>
            <div class="prev"><span>&#10094</span></div>
            <div class="next"><span>&#10095</span></div>
        </div>
        <div class="static">
            <p>Creative in clothes, pragmatism in business</p>
            <a href="">посмотреть все категории <img src="/image/forwardarrow.svg" alt="Стрелка вправо"></a>
        </div>
        <hr>
    </div>

    <div class="articles__container">
        <h2 class="text__tittle">Статьи</h2>
        <div class="article-items">
            <a href="#">
                <div class="article-item">
                    <div>
                        <img src="/image/pexels-rachel-claire-4857770.png" alt="">
                        <p class="article-date">12/3/2022</p>
                    </div>
                    <div class="article-item-info">
                        <p class="article-item-title"><strong>Заголовок статьи заголовок статьи заголовок статьи</strong></p>
                        <p>Текст описание текст описание</p>
                    </div>
                </div>
            </a>
            <a href="#">
                <div class="article-item">
                    <div>
                        <img src="/image/pexels-mikhail-nilov-8108555.png" alt="">
                        <p class="article-date">12/3/2022</p>
                    </div>
                    <div class="article-item-info">
                        <p class="article-item-title"><strong>Заголовок статьи заголовок статьи заголовок статьи</strong></p>
                        <p>Текст описание текст описание</p>
                    </div>
                </div>
            </a>
            <a href="#">
                <div class="article-item">
                    <div>
                        <img src="/image/pexels-екатерина-лебедь-11624012.png" alt="">
                        <p class="article-date">12/3/2022</p>
                    </div>
                    <div class="article-item-info">
                        <p class="article-item-title"><strong>Заголовок статьи заголовок статьи заголовок статьи</strong></p>
                        <p>Текст описание текст описание</p>
                    </div>
                </div>
            </a>
        </div>
        <button class="btn btn-article">Читать все статьи</button>
        <div class="static-article"><p>Креатив в дизайне, прагматичность в деле</p></div>

    </div>

@endsection
