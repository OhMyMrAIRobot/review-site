@php(session_start())

<header class = "header">
    <div class = "navbar">
        <h1 class = "title">
            <a href = "{{route('main.index')}}">My Title</a>
        </h1>

        <nav class = "navigation">
            <ul>
                <li><a class = "nav-btn" href = "{{route('main.index')}}">Главная</a></li>
                <li><a class = "nav-btn" href = "{{route('main.index')}}">Магазины</a></li>
                <li><a class = "nav-btn" href = "{{route('main.index')}}">О нас</a></li>
                <li>
                    @if(session()->has('user'))
                        <a class = "nav-btn" href = {{route('auth')}}>
                            <i class = "fa fa-user"></i>
                            Кабинет
                        </a>

                        <ul class = "cabinet-btns">
                            @if(session()->has('isAdmin'))
                                <li><a class = "nav-btn" href = "{{route('categories.index')}}">Админ панель</a></li>
                            @endif

                            <li>
                                <form action="{{route('out')}}" method='POST'>
                                    @csrf
                                    <button type='SUBMIT' class = "nav-btn btn">Выход</button>
                                </form>
                            </li>
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
