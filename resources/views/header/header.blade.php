<header class="header header--style-default">

    <div class="header__column">
        <svg width="15px" height="11px" class="header__icon">
            <use xlink:href="{{ asset('assets/icons/sprite.svg') }}#currency-outline"></use>
        </svg>

        <h1 class="header__heading">Currencies</h1>
    </div>

    <ul class="menu menu--style-default menu--type-default">

        <li class="menu__item {{ \Illuminate\Support\Facades\Route::currentRouteName() !== 'home' ?: 'active' }}">
            <a href="{{ route('home') }}" class="menu__link">Home Page</a>
        </li>

        <li class="menu__item {{ \Illuminate\Support\Facades\Route::currentRouteName() !== 'settings.system' ?: 'active' }}">
            <a href="{{ route('settings.system') }}" class="menu__link">System Settings</a>
        </li>

        <li class="menu__item {{ \Illuminate\Support\Facades\Route::currentRouteName() !== 'settings.currencies' ?: 'active' }}">
            <a href="{{ route('settings.currencies') }}" class="menu__link">System Currencies</a>
        </li>

    </ul>
</header>
