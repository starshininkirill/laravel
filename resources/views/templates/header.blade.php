<header>
    <div class="container">
        <a href="{{ route('home') }}">
            <h1>Главная</h1>
        </a>
        <div class="links">
            @guest
            <a href="{{ route('login') }}">
                Вход
            </a>
            <a href="{{ route('register.index') }}">
                Регистрация
            </a>
            @endguest
            @auth
            {{ auth()->user()->name }}
            <a href="{{ route('logout') }}">
                Выйти
            </a>
            @endauth
        </div>
    </div>
</header>
