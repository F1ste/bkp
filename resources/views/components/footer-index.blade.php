<footer class="footer">
			<div class="footer__container">
				<div class="footer__menu">
					<div class="footer__menu-col">
						<a href="index.html" class="footer__logo">
							<img src="{{ asset('image/logo-white.svg') }}" alt="Культурная Биржа">
							<div class="logo__text">Культурная <br> Биржа</div>
						</a>
						<div class="with-support">
							Проект реализуется <br>
							при поддержке JTI Россия
						</div>
					</div>
					<div class="footer__menu-col">
					@foreach ($footer_ar['pages'] as $page)
						<a href="{{$page->link}}" class="footer__menu-link">{{$page->page}}</a>
						@if (($loop->index % 3 == 2) && ($loop->index > 0))
						
						
						@endif
					@endforeach
				</div>
				<div data-da=".footer__company-info, 991.98, 1" class="footer__menu-col socials">
					@foreach ($footer_ar['icons'] as $icon )
						@if(strpos($icon,'t.me')!==false)
							<a href="{{$icon->style}}" class="socials__social-item icon-telegram">
								<i class="socials__icon _icon-telegram"></i>
							</a>
						@endif
						@if(strpos($icon,'vk.com')!==false)
							<a href="{{$icon->style}}" class="socials__social-item icon-vk">
								<i class="socials__icon _icon-vk"></i>
							</a>
						@endif
						@if(strpos($icon,'youtube.com')!==false)
							<a href="{{$icon->style}}" class="socials__social-item icon-youtube">
								<i class="socials__icon _icon-youtube"></i>
							</a>
						@endif
					@endforeach
				
					</div>
				</div>
				<div class="footer__company-info">
					<div class="company-info__col">
						<div class="company-info__item">
							АНО «Дирекция Санкт-Петербургского международного культурного форума»
						</div>
						<div class="company-info__item">
							Малая Морская ул., 8, Санкт-Петербург, 191186
						</div>
						<div class="footer__bank-details">
							<div class="bank-details__item">ОГРН 1147800004505</div>
							<div class="bank-details__item">ИНН 7840291213</div>
							<div class="bank-details__item">КПП 784001001</div>
						</div>
					</div>

					<div class="company-info__col">
						<div class="footer__developer">
							Разработано <a href="">Русский сокол</a>
						</div>
					</div>
				</div>
			</div>
		</footer>