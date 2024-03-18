@php(session_start())

<header class = "header">
    <div class = "navbar">
        <h1 class = "title">
            <a href = "{{route('shops.index')}}">Админ панель</a>
        </h1>

        <nav class = "navigation">
            <ul>
                <li><a class = "nav-btn" href = "{{route('main.index')}}">Выход</a></li>
            </ul>
        </nav>
    </div>
</header>
