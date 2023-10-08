@extends('layouts.authorisation')

@section('title', 'Панель управления')

@section('content')

<div class="page__container">
				<section class="chat personal-account" id="personal-chat">
					<div class="chat__container">
						<div class="chat__menu">
							<form class="chat__search-form form">
								<div class="chat__form-item search-item form-item">
									<input type="text" class="form__input _icon-search" placeholder="Найти...">
									<button type="submit" class="chat__search-submit search-submit _icon-search"></button>
								</div>
							</form>
							<form class="chat__contact-wrapper">
                                <input id="chatValue" type="text" name="id" value="" hidden>
                                @foreach ($chat as $chat_id)
                                    <button data-chat="{{$chat_id->id}}" type="submit" class="chat__contact-item _contact-active">
                                        <div class="chat__contact-photo">
                                            <div class="chat__contact-media media-block">
                                                <picture><source srcset="{{asset('image/chat/default.jpg')}}" type="image/webp"><img src="{{asset('image/chat/default.jpg')}}" alt="Изображение пользователя"></picture>
                                            </div>
                                            <div class="chat__user-status user-status_online"></div>
                                        </div>
                                        <div class="chat__contact-name">{{ $chat_id->user->name }}</div>
                                        <div class="chat__contact-date chat-date">13:04</div>
                                    </button>
                                @endforeach
                            </form>
						</div>
						<div class="chat__dialogue">
							<div class="chat__chat-heading">
								<div class="chat__stack-photo">
									<div class="chat__stack-media media-block">
										<picture><source srcset="{{asset('image/chat/default.jpg')}}" type="image/webp"><img src="{{asset('image/chat/default.jpg')}}" alt="Изображение пользователя"></picture>
									</div>
								</div>
								<div class="chat__dialogue-status user-status_online"></div>
								<div class="chat__chat-name">{{$current_chat->user->name}}</div>
							</div>
							<div class="chat__chat-body">
                            
                            @foreach ($current_chat->messages as $msg)
                                    <div class="chat__msg-stack _msg-from">
                                        <div class="chat__stack-photo">
                                            <div class="chat__stack-media media-block">
                                                <picture><source srcset="{{asset('image/chat/default.jpg')}}" type="image/webp"><img src="{{asset('image/chat/default.jpg')}}" alt="Изображение пользователя"></picture>
                                            </div>
                                        </div>
                                        <div class="chat__stack-content">
                                            <div class="chat__stack-info">
                                                <div class="chat__stack-date chat-date">
                                                    {{ Carbon\Carbon::parse($msg->created_at)->format('H:i')}}
                                                </div>
                                            </div>
                                            <div class="chat__stack-message">
                                                <div class="chat__message-text">
                                                    {{$msg->message}}
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    
                                @endforeach
<!-- 								<div class="chat__msg-stack _msg-to">
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
-->
							</div>
							<form id="chat-form" class="chat__chat-footer">
								<div class="chat__chat-input">

									<div class="chat__form-item form__item">
										<button class="chat__emoji-input _icon-emoji"></button>
										<input id="chatInput" type="text" name="message" class="chat__form-input form__input">
									</div>
								</div>

								<div class="chat__footer-buttons">
									<button class="chat__attach-input _icon-attach"></button>
									<button type="submit" id="message-input" class="chat__send-input _icon-send"></button>
								</div>
							</form>
						</div>
					</div>
				</section>
			</div>
			

            <script src="https://js.pusher.com/7.0/pusher.min.js"></script>

            <script>
                (()=>{
                    let currentUrl = window.location.href;
                    if (currentUrl.includes('/profile/chat')) {
                        let page = document.querySelector('.page');
                        page.classList.add('chat-page');
                    }
                })()
            </script>
@endsection
