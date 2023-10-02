@if(auth()->user())
    <hr class="menu-role">
    
    <li class="menu__item"><a href="{{ route('logout') }}" id="logout" class="menu__link">Выйти</a></li>
@endif
