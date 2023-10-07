@extends('layouts.authorisation')

@section('title', 'Панель управления')

@section('content')

<main class="page chat-page">
			<div class="sidebar">
				<div class="sidebar__items">
					<div data-spollers data-one-spoller class="spollers">
						<div class="spollers__item">
							<button type="button" data-spoller class="sidebar__item _icon-dashboard" dataText="Страницы">
							</button>
							<div class="spollers__body">
								<div class="spollers__wrapper">
									<a href="#" class="sidebar__item _icon-dashboard sidebar__item_active" dataText="Главная"></a>
									<a href="#" class="sidebar__item _icon-dashboard" dataText="О Бирже"></a>
									<a href="#" class="sidebar__item _icon-dashboard" dataText="Вопрос-ответ"></a>
									<a href="#" class="sidebar__item _icon-dashboard" dataText="Контакты"></a>
								</div>
							</div>
						</div>
						<div class="spollers__item">
							<button type="button" data-spoller class="sidebar__item _icon-bookmark" dataText="Проекты">
							</button>
							<div class="spollers__body">
								<div class="spollers__wrapper">
									<a href="#" class="sidebar__item _icon-bookmark" dataText="Модерация"></a>
									<a href="#" class="sidebar__item _icon-bookmark" dataText="Опубликованные"></a>
									<a href="#" class="sidebar__item _icon-bookmark" dataText="Архив"></a>
									<a href="#" class="sidebar__item _icon-bookmark" dataText="Отклоненные"></a>
								</div>
							</div>
						</div>
					</div>
					<a href="#" class="sidebar__item _icon-person" dataText="Новости"></a>
					<a href="#" class="sidebar__item _icon-edit" dataText="Отклики"></a>
					<a href="#" class="sidebar__item _icon-chat" dataText="Диалоги"></a>
					<a href="#" class="sidebar__item _icon-notification" dataText="Уведомления"></a>
					<a href="#" class="sidebar__item _icon-settings" dataText="Статистика"></a>
				</div>
				<div data-da=".sidebar, 991" class="sidebar__expand"><button type="button" class="sidebar__item _icon-chevron" dataText="Назад"></button></div>
				<div class="sidebar__info">
					<div class="sidebar__info-item">
						8 800 555 35 35
					</div>
					<div class="sidebar__info-item">
						<a href="mailto:mss.soboleva@gmail.com">mss.soboleva@gmail.com</a>
					</div>
					<div class="sidebar__info-item">
						Копирайт
					</div>
					<div class="sidebar__info-socials socials">
						<a href="" class="socials__social-item icon-telegram">
							<i class="socials__icon _icon-telegram"></i>
						</a>
						<a href="" class="socials__social-item icon-vk">
							<i class="socials__icon _icon-vk"></i>
						</a>
						<a href="" class="socials__social-item icon-youtube">
							<i class="socials__icon _icon-youtube"></i>
						</a>
					</div>
				</div>
				<a href="#" class="sidebar__item _icon-logout" dataText="Выход"></a>
			</div>
			<div class="page__container">
				<section class="chat personal-account">
					<div class="chat__container">
						<div class="chat__menu">
							<form class="chat__search-form form">
								<div class="chat__form-item search-item form-item">
									<input type="text" class="form__input _icon-search" placeholder="Найти...">
									<button type="submit" class="chat__search-submit search-submit _icon-search"></button>
								</div>
							</form>
							<div class="chat__contact-wrapper">
								<a href="#" class="chat__contact-item _contact-active">
									<div class="chat__contact-photo">
										<div class="chat__contact-media media-block">
											<picture><source srcset="img/chat/avatar1.webp" type="image/webp"><img src="img/chat/avatar1.jpg" alt="Изображение пользователя"></picture>
										</div>
										<div class="chat__user-status user-status_online"></div>
									</div>
									<div class="chat__contact-name">Иван Иванов</div>
									<div class="chat__contact-date chat-date">13:04</div>
								</a>
								<a href="#" class="chat__contact-item">
									<div class="chat__contact-photo">
										<div class="chat__contact-media media-block">
											<picture><source srcset="img/chat/avatar2.webp" type="image/webp"><img src="img/chat/avatar2.jpg" alt="Изображение пользователя"></picture>
										</div>
										<div class="chat__user-status"></div>
									</div>
									<div class="chat__contact-name">Дарья Александровна</div>
									<div class="chat__contact-date chat-date">11:04</div>
								</a>
								<a href="#" class="chat__contact-item">
									<div class="chat__contact-photo">
										<div class="chat__contact-media media-block">
											<picture><source srcset="img/chat/avatar3.webp" type="image/webp"><img src="img/chat/avatar3.jpg" alt="Изображение пользователя"></picture>
										</div>
										<div class="chat__user-status"></div>
									</div>
									<div class="chat__contact-name">Руслан Батькович</div>
									<div class="chat__contact-date chat-date">11:04</div>
								</a>
							</div>
						</div>
						<div class="chat__dialogue">
							<div class="chat__chat-heading">
								<div class="chat__stack-photo">
									<div class="chat__stack-media media-block">
										<picture><source srcset="img/chat/avatar1.webp" type="image/webp"><img src="img/chat/avatar1.jpg" alt="Изображение пользователя"></picture>
									</div>
								</div>
								<div class="chat__dialogue-status user-status_online"></div>
								<div class="chat__chat-name">Иван Иванов</div>
							</div>
							<div class="chat__chat-body">
								<div class="chat__msg-stack _msg-from">
									<div class="chat__stack-photo">
										<div class="chat__stack-media media-block">
											<picture><source srcset="img/chat/avatar1.webp" type="image/webp"><img src="img/chat/avatar1.jpg" alt="Изображение пользователя"></picture>
										</div>
									</div>
									<div class="chat__stack-content">
										<div class="chat__stack-info">
											<div class="chat__stack-date chat-date">
												10:16
											</div>
										</div>
										<div class="chat__stack-message">
											<div class="chat__message-text">
												Доброго дня, информация информация
											</div>
											<div class="chat__message-text">
												Очень понравился ваш проект!
											</div>
											<div class="chat__message-text">
												Хочу в нем поучаствовать!С кем я могу связаться?
											</div>

										</div>
									</div>
								</div>
								<div class="chat__msg-stack _msg-to">
									<div class="chat__stack-content">
										<div class="chat__stack-info">
											<div class="chat__stack-date chat-date">
												10:16
											</div>
										</div>
										<div class="chat__stack-message">
											<div class="chat__message-text">
												Здравствуйте! Рада, что вам понравилось, наша команда очень старалась.

											</div>
											<div class="chat__message-text">
												Писать можете мне или созвонимся в 18:00, вам будет удобно?
											</div>
										</div>
									</div>
								</div>
								<div class="chat__msg-stack _msg-from">
									<div class="chat__stack-photo">
										<div class="chat__stack-media media-block">
											<picture><source srcset="img/chat/avatar1.webp" type="image/webp"><img src="img/chat/avatar1.jpg" alt="Изображение пользователя"></picture>
										</div>
									</div>
									<div class="chat__stack-content">
										<div class="chat__stack-info">
											<div class="chat__stack-date chat-date">
												11:04
											</div>
										</div>
										<div class="chat__stack-message">
											<div class="chat__message-text">
												Да, мне удобно в 18:00
											</div>
											<div class="chat__message-text">
												Я отправлю вам инвайт в зум.
											</div>
										</div>
									</div>
								</div>
								<div class="chat__msg-stack _msg-to">
									<div class="chat__stack-content">
										<div class="chat__stack-info">
											<div class="chat__stack-date chat-date">
												12:37
											</div>
										</div>
										<div class="chat__stack-message">
											<div class="chat__message-text">
												Отлично, жду ссылку!
											</div>
										</div>
									</div>
								</div>
								<div class="chat__msg-stack _msg-from">
									<div class="chat__stack-photo">
										<div class="chat__stack-media media-block">
											<picture><source srcset="img/chat/avatar1.webp" type="image/webp"><img src="img/chat/avatar1.jpg" alt="Изображение пользователя"></picture>
										</div>
									</div>
									<div class="chat__stack-content">
										<div class="chat__stack-info">
											<div class="chat__stack-date chat-date">
												13:04
											</div>
										</div>
										<div class="chat__stack-message">
											<div class="chat__message-text">
												Хорошо, договорились
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="chat__chat-footer">
								<div class="chat__chat-input">

									<div class="chat__form-item form__item">
										<button class="chat__emoji-input _icon-emoji"></button>
										<input id="chatInput" type="text" name="chat" class="chat__form-input form__input">
									</div>
								</div>
								<div class="chat__footer-buttons">
									<button class="chat__attach-input _icon-attach"></button>
									<button class="chat__send-input _icon-send"></button>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
		</main>
        
@endsection
