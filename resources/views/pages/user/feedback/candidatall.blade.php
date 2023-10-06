@extends('layouts.index')

@section('title', 'Отклики на проекты')

@section('content')

<div class="page__container">
				<section class="feedback personal-account">
					<div class="feedback__container">
						<div class="feedback__content">
							<div class="feedback__back-btn">
								<a href="#" class="back-btn">
									Назад
									<svg xmlns="http://www.w3.org/2000/svg" width="61" height="16" viewBox="0 0 61 16" fill="none">
										<path d="M60 9C60.5523 9 61 8.55228 61 8C61 7.44772 60.5523 7 60 7V9ZM0.292892 7.29289C-0.0976295 7.68342 -0.0976295 8.31658 0.292892 8.70711L6.65686 15.0711C7.04738 15.4616 7.68055 15.4616 8.07107 15.0711C8.46159 14.6805 8.46159 14.0474 8.07107 13.6569L2.41422 8L8.07107 2.34315C8.46159 1.95262 8.46159 1.31946 8.07107 0.928932C7.68055 0.538408 7.04738 0.538408 6.65686 0.928932L0.292892 7.29289ZM60 7L1 7V9L60 9V7Z" fill="#1D1D1B" />
									</svg>
								</a>
							</div>
							<div class="feedback__heading">
                                <table class="my-feedbacks__table">
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
                                </table>
						</div>
					</div>
				</section>
			</div>

@endsection















