<div id="feedbackPopup" aria-hidden="true" class="popup">

    <div class="popup__wrapper">
        <div class="popup__content" data-update="{{ route('profile.feedback.create') }}" data-id="{{ request()->route('project')->id }}">

            <button data-close type="button" class="popup__close"></button>
            <div class="popup__text">
                @auth
                <div class="profile__cover-letter">
                    <div class="profile__form-item form__item">
                        <label for="ProfileCV" class="profile__form-label form__label">Краткое сопроводительное письмо</label>
                        <textarea
                            id="cover_letter"
                            type="text"
                            class="profile__form-input form__input project-description"
                            name="cover_letter"
                            placeholder="Краткое сопроводительное письмо"
                            data-placeholder="Краткое сопроводительное письмо"
                        ></textarea>
                    </div>
                </div>
                <button type="submit" class="popup__submit btn btn-filled">Отправить</button>
                @endauth

                @guest
                <label class="profile__form-label form__label">
                    Отправить отклик
                </label>
                <div class="feedback-popup__guest-message">
                    <p>Отклики могут отправлять только зарегистрированные пользователи.</p>
                </div>
                <a href="{{ route('register') }}" class="popup__submit btn btn-filled" style="max-width: none;">Зарегистрироваться</a>
                @endguest
            </div>
        </div>
    </div>
</div>
