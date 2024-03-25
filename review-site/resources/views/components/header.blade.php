<header class = "header">
    <div class = "navbar">
        <h1 class = "title">
            <a href = "{{route('main.index')}}">My Title</a>
        </h1>

        <nav class = "navigation">
            <ul>
                <li><a class = "nav-btn" href = "{{route('main.index')}}">Главная</a></li>
{{--                <li><a class = "nav-btn" href = "{{route('main.index', 'shops=all')}}">Магазины</a></li>--}}
                <li><a class = "nav-btn" href = "{{route('main.index')}}">О нас</a></li>
                <li>
                    @if(\Illuminate\Support\Facades\Auth::check())
                        <a class = "nav-btn">
                            <i class = "fa fa-user"></i>
                            @lang(\Illuminate\Support\Facades\Auth::user()->getUsername())
                        </a>

                        <ul class = "cabinet-btns">
                            @if(\Illuminate\Support\Facades\Auth::user()->isAdmin())
                                <li><a class = "nav-btn" href = "{{route('shops.index')}}">Админ панель</a></li>
                            @endif

                            <li>
                                <form action="{{route('auth.logout')}}" method='POST'>
                                    @csrf
                                    <button type='SUBMIT' class = "nav-btn btn">Выход</button>
                                </form>
                            </li>
                        </ul>

                        @else
                        <a class = "nav-btn" href ={{route('auth.index')}}>
                            Войти
                        </a>

                        <ul class = "cabinet-btns">
                            <li><a class = "nav-btn" href = "{{route('register.index')}}">Регистрация</a></li>
                        </ul>
                    @endif

                </li>
            </ul>
        </nav>
    </div>
</header>
