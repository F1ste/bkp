@extends('layouts.authorisation')

@section('title', 'Панель управления')

@section('content')


			<div class="page__container">
				<section class="my-feedbacks personal-account">
					<div class="my-feedbacks__container">
						<div class="my-feedbacks__content">
							<div class="my-feedbacks__heading">
								<div class="my-feedbacks__title personal__title">
									Мои отклики
								</div>
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
						</div>
					</div>
				</section>

			</div>


@endsection
