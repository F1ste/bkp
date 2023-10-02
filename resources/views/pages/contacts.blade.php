@extends('layouts.index')
@section('content')

<main class="page">
			<section class="contacts">
				<div class="contacts__container">
					<div class="contacts__col">
						<div class="contacts__title section__title">
							Контакты
						</div>
						<div class="contacts__info">
							<div class="contacts__name">АНО «Дирекция Санкт-Петербургского международного культурного форума»</div>
							<div class="contacts__adress">Малая Морская ул., 8, Санкт-Петербург, 191186</div>
							<div class="contacts__items">
								<div class="contacts__item-phone">
									<a href="mailto:office@culturalforum.ru">office@culturalforum.ru</a>
								</div>
								<div class="contacts__item-email">
									+7 (812) 779-10-30
								</div>
							</div>
						</div>
						<div class="contacts__info-general">
							<div class="contacts__info-title">
								Общие вопросы
							</div>
							<div class="contacts__general-item">
								<div class="contacts__departament-name">
									Общие вопросы
								</div>
								<div class="contacts__departament-email">
									<a href="mailto:info@culturalforum.ru">info@culturalforum.ru</a>
								</div>
							</div>
							<div class="contacts__general-item">
								<div class="contacts__departament-name">
									Для представителей СМИ
								</div>
								<div class="contacts__departament-email">
									<a href="mailto:media@culturalforum.ru">media@culturalforum.ru</a>
								</div>
							</div>
							<div class="contacts__general-item">
								<div class="contacts__departament-name">
									Вопросы по программе
								</div>
								<div class="contacts__departament-email">
									<a href="mailto:programme@culturalforum.ru">programme@culturalforum.ru</a>
								</div>
							</div>
						</div>
					</div>
					<div class="contacts__col">
						<div class="contacts__media media-block">
							<picture><source srcset="{{ asset('image/banner1.webp') }}" type="image/webp"><img src="{{ asset('image/banner1.jpg') }}" alt=""></picture>
						</div>
					</div>


				</div>
			</section>
		</main>

@endsection