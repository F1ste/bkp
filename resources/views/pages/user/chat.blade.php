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
                                @php
                                    $chatId = $chat_id->id;
                                    $isActive = request()->query('id') == $chatId;
                                @endphp
                                    <button data-chat="{{$chat_id->id}}" type="button" class="chat__contact-item @if($isActive) _contact-active @endif">
                                        <div class="chat__contact-photo">
                                            <div class="chat__contact-media media-block">
                                                <picture><source srcset="{{asset('image/chat/default.jpg')}}" type="image/webp"><img src="{{asset('image/chat/default.jpg')}}" alt="Изображение пользователя"></picture>
                                            </div>
                                            <div class="chat__user-status user-status_online"></div>
                                        </div>

                                        <div class="chat__contact-name">                                       
                                            @if ($chat_id->first_user->id == auth()->user()->id)
                                                {{ $chat_id->second_user->name }}
                                            @else
                                                {{ $chat_id->first_user->name }}
                                            @endif
                                        </div>
                                        @if ($chat_id->messages->isNotEmpty())
                                            <div class="chat__contact-date chat-date">{{ Carbon\Carbon::parse($chat_id->messages->last()->created_at)->timezone('Europe/Moscow')->format('H:i')}}</div>
                                        @endif
                                    </button>
                                @endforeach

                                @foreach ($chat_second_user as $chat_id)
                                @php
                                    $chatId = $chat_id->id;
                                    $isActive = request()->query('id') == $chatId;
                                @endphp
                                <button data-chat="{{$chat_id->id}}" type="button" class="chat__contact-item @if($isActive) _contact-active @endif">
                                    <div class="chat__contact-photo">
                                        <div class="chat__contact-media media-block">
                                            <picture><source srcset="{{asset('image/chat/default.jpg')}}" type="image/webp"><img src="{{asset('image/chat/default.jpg')}}" alt="Изображение пользователя"></picture>
                                        </div>
                                        <div class="chat__user-status user-status_online"></div>
                                    </div>

                                    <div class="chat__contact-name">                                       
                                        @if ($chat_id->first_user->id == auth()->user()->id)
                                            {{ $chat_id->second_user->name }}
                                        @else
                                            {{ $chat_id->first_user->name }}
                                        @endif
                                    </div>
                                    @if ($chat_id->messages->isNotEmpty())
                                        <div class="chat__contact-date chat-date">{{ Carbon\Carbon::parse($chat_id->messages->last()->created_at)->timezone('Europe/Moscow')->format('H:i')}}</div>
                                    @endif
                                </button>
                            @endforeach
                            </form>
						</div>
                        @if($current_chat == null && $chat_second_user->isNotEmpty() || $current_chat == null && $chat->isNotEmpty())
                            <div class="chat__dialogue chat__empty main-text">
                                Выберите контакт, чтобы начать переписку
                            </div>
                        @elseif($chat->isEmpty() && $chat_second_user->isEmpty())
                            <div class="chat__dialogue chat__empty main-text">
                                На Ваш проект еще нет откликов <br>
                                Опубликуйте проект, чтобы получить первый отклик
                            </div>
                        @endif
                        @if(!$current_chat == null)
						<div class="chat__dialogue" data-first_user="{{$current_chat->first_user_id}}" data-second_user="{{$current_chat->second_user_id}}">
							<div class="chat__chat-heading">
								<div class="chat__stack-photo">
									<div class="chat__stack-media media-block">
										<picture><source srcset="{{asset('image/chat/default.jpg')}}" type="image/webp"><img src="{{asset('image/chat/default.jpg')}}" alt="Изображение пользователя"></picture>
									</div>
								</div>
								<div class="chat__dialogue-status user-status_online"></div>
								<div class="chat__chat-name">                                        
                                        @if ($current_chat->first_user->id == auth()->user()->id)
                                            {{ $current_chat->second_user->name }}
                                        @else
                                            {{ $current_chat->first_user->name }}
                                        @endif
                                    </div>
							    </div>
							<div class="chat__chat-body">
                            
                            @foreach ($current_chat->messages as $msg)
                                @if($msg->user_id == auth()->user()->id)
                                    <div class="chat__msg-stack _msg-to">
                                        <div class="chat__stack-photo">
                                        </div>
                                        <div class="chat__stack-content">
                                            <div class="chat__stack-info">
                                                <div class="chat__stack-date chat-date">
                                                    {{ Carbon\Carbon::parse($msg->created_at)->timezone('Europe/Moscow')->format('H:i')}}
                                                </div>
                                            </div>
                                            <div class="chat__stack-message">
                                                <div class="chat__message-text">
                                                    {{$msg->message}}
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                @else
                                    <div class="chat__msg-stack _msg-from">
                                        <div class="chat__stack-photo">
                                            <div class="chat__stack-media media-block">
                                                <picture><source srcset="{{asset('image/chat/default.jpg')}}" type="image/webp"><img src="{{asset('image/chat/default.jpg')}}" alt="Изображение пользователя"></picture>
                                            </div>
                                        </div>
                                        <div class="chat__stack-content">
                                            <div class="chat__stack-info">
                                                <div class="chat__stack-date chat-date">
                                                    {{ Carbon\Carbon::parse($msg->created_at)->timezone('Europe/Moscow')->format('H:i')}}
                                                </div>
                                            </div>
                                            <div class="chat__stack-message">
                                                <div class="chat__message-text">
                                                    {{$msg->message}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @endforeach

							</div>
							<form id="chat-form" class="chat__chat-footer">
								<div class="chat__chat-input">

									<div class="chat__form-item form__item">
										<button class="chat__emoji-input _icon-emoji"></button>
										<input id="chatInput" data-user="{{auth()->user()->id}}" type="text" name="message" class="chat__form-input form__input">
									</div>
								</div>

								<div class="chat__footer-buttons">
									<button class="chat__attach-input _icon-attach"></button>
									<button type="submit" id="message-input" class="chat__send-input _icon-send"></button>
								</div>
							</form>
                            @endif
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
