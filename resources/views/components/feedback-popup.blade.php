<div id="feedbackPopup" aria-hidden="true" class="popup">
	
	<div class="popup__wrapper">
		<form class="popup__content" enctype="multipart/form-data" method="POST" action="{{route("profile.feedback.create")}}">
			@csrf
			<button data-close type="button" class="popup__close"></button>
			<div class="popup__text">
				<div class="profile__cover-letter">
					<div class="profile__form-item form__item">
						<label for="ProfileCV" class="profile__form-label form__label">Краткое сопроводительное письмо</label>
						<textarea id="FormProjectDescription" type="text" 
						class="profile__form-input form__input project-description" name="cover_letter" placeholder="Краткое сопроводительное письмо" data-placeholder="Краткое сопроводительное письмо"></textarea>
					</div>
					<div style="visibility:hidden" class="profile__form-item form__item">
						<input type="text" name="service_id" value="{{request()->route('id')}}">
					</div>
				</div>
				<button type="submit" class="popup__submit btn btn-filled">Отправить</button>
			</div>
		</form>
	</div>
</div>
 
