@extends('layouts.authorisation')

@section('title', 'Панель управления')

@section('content')

<div class="page__container" style="min-height: 100vh;">
				<section class="notifications personal-account">
					<div class="notifications__container">
						<div class="notifications__content">
							<div class="notifications__heading">
								<div class="notifications__title personal__title">
									Уведомления
								</div>
							</div>


							@foreach($notifications as $el)
							<div class="notifications__item">
								<a href="#" class="notifications__name">
									{{$el->name}}
								</a>
								<div class="notifications__description">

								</div>
							</div>
							@endforeach



						</div>
					</div>
				</section>
			</div>

@endsection