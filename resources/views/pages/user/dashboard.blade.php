@extends('layouts.authorisation')

@section('title', 'Панель управления')

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
								@foreach($collections as $el)
								<div class="my-projects__item">
									<a href="{{ route('profile.services.single', ['id' => $el->id]) }}">
										<div class="my-projects__project-name">
											{{ $el->name_proj }}
										</div>
										<!-- <div class="my-projects__notifications _icon-notification">
											@php
											    $counter = 0;
											@endphp
											@foreach($notifications as $elevent)
												@if($elevent->id_project == $el->id) @php $counter++;  @endphp @endif
											@endforeach
											@php
											    echo($counter);
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
				<section class="my-feedbacks personal-account">
					<div class="my-feedbacks__container">
						<div class="my-feedbacks__content">
							<div class="my-feedbacks__heading">
								<div class="my-feedbacks__title personal__title">
									Мои отклики
								</div>
								<a href="{{route('profile.feedback')}}" class="my-feedbacks__all-feedbacks all-btn">
									Все отклики
								</a>
							</div>
							<div class="my-projects__projects-items">
								<div class="my-projects__item">
									<a href="{{ route('profile.feedback.candidat.all') }}">
										Мои отклики
									</a>
								</div>
							</div>
							<div class="my-projects__projects-items">
								<div class="my-projects__item">
									<a href="{{ route('profile.feedback.owner.all') }}">
										Отклики на мои проекты
									</a>
								</div>
							</div>
							<!-- <table class="my-feedbacks__table">
								<thead>
									<tr class="my-feedbacks__table-heading">
										<th>№</th>
										<th>Проект</th>
										<th>Роль</th>
										<th>Срок поиска</th>
										<th>Статус</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									<tr class="my-feedbacks__table-row">
										<td class="my-feedbacks__table-item">
											<div class="table-number">1</div>
										</td>
										<td class="my-feedbacks__table-item">Название проекта</td>
										<td class="my-feedbacks__table-item">Инвестор</td>
										<td class="my-feedbacks__table-item">До 29.08.2023</td>
										<td class="my-feedbacks__table-item">Просмотрено</td>
										<td class="my-feedbacks__table-item"><a href="" class="my-feedbacks__btn btn btn-white _fw">Подробнее</a></td>
									</tr>
									<tr class="my-feedbacks__table-row">
										<td class="my-feedbacks__table-item">
											<div class="table-number">2</div>
										</td>
										<td class="my-feedbacks__table-item">Название проекта 453</td>
										<td class="my-feedbacks__table-item">Исполнитель</td>
										<td class="my-feedbacks__table-item">До 30.08.2023</td>
										<td class="my-feedbacks__table-item">Отказано</td>
										<td class="my-feedbacks__table-item"><a href="" class="my-feedbacks__btn btn btn-white _fw">Подробнее</a></td>
									</tr>
									<tr class="my-feedbacks__table-row">
										<td class="my-feedbacks__table-item">
											<div class="table-number">3</div>
										</td>
										<td class="my-feedbacks__table-item">Название проекта 2342</td>
										<td class="my-feedbacks__table-item">Спикер</td>
										<td class="my-feedbacks__table-item">До 29.08.2023</td>
										<td class="my-feedbacks__table-item">Одобрено</td>
										<td class="my-feedbacks__table-item"><a href="" class="my-feedbacks__btn btn btn-white _fw">Подробнее</a></td>
									</tr>
								</tbody>
							</table> -->
						</div>
					</div>
				</section>
				<section class="notifications personal-account">
					<div class="notifications__container">
						<div class="notifications__content">
							<div class="notifications__heading">
								<div class="notifications__title personal__title">
									Системные уведомления
								</div>
								<a href="/profile/notifications" class="notifications__all-notifications all-btn">
									Все уведомления
								</a>
							</div>

							@foreach($notifications as $el)
								<div class="notifications__item">
								<div class="notifications__name">
									{{$el->name}}
								</div>

								</div>
								@endforeach


						</div>
					</div>
				</section>
			</div>


@endsection
