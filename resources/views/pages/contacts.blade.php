@extends('layouts.index')
@section('content')

<main class="page">
			<section class="contacts">
				<div class="contacts__container">
					<div class="contacts__col">
						<div class="contacts__title section__title">
							Контакты
						</div>
						@foreach ($contact as $item )
							<div class="contacts__info">
								{!! $item->description !!}
							</div>
						@endforeach
						
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
						@foreach ($contact as $item )
							<div class="contacts__info">
								{!! $item->map !!}
							</div>
						@endforeach
					</div>


				</div>
			</section>
		</main>

@endsection