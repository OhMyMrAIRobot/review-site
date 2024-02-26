@php(session_start())

<header class = "header">
    <div class = "navbar">
        <h1 class = "title">
            <a href = "{{route('main')}}">My Title</a>
        </h1>

        <nav class = "navigation">
            <ul>
                <li><a class = "nav-btn" href = "{{route('main')}}">Главная</a></li>
                <li><a class = "nav-btn" href = "{{route('main')}}">Магазины</a></li>
                <li><a class = "nav-btn" href = "{{route('main')}}">О нас</a></li>
                <li>
                    @if(isset($_SESSION['id']))
                        <a class = "nav-btn" href = {{route('auth')}}>
                            <i class = "fa fa-user"></i>
                            Кабинет
                        </a>

                        <ul class = "cabinet-btns">
                            @if($_SESSION['admin'] == '1')
                                <li><a class = "nav-btn" href = "{{route('adminCategoryMain')}}">Админ панель</a></li>
                            @endif

                            <li><a class = "nav-btn" href = {{route('main')}}>Выход</a></li>
                        </ul>

                        @else
                        <a class = "nav-btn" href ={{route('auth')}}>
                            Войти
                        </a>

                        <ul class = "cabinet-btns">
                            <li><a class = "nav-btn" href = "{{route('register')}}">Регистрация</a></li>
                        </ul>
                    @endif

                </li>
            </ul>
        </nav>
    </div>
</header>
