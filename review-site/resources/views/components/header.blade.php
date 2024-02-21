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
                    <a class = "nav-btn" href ={{'register'}}>
                        <i class = "fa fa-user"></i>
                        Кабинет
                    </a>
                    <ul class = "cabinet-btns">
                        <li><a class = "nav-btn" href = "{{route('adminCategoryMain')}}">Админ панель</a></li>
                        <li><a class = "nav-btn" href = "#">Выход</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</header>
