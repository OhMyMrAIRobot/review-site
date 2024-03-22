<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width = device - width, initial-scale = 1">
    <title>admin shops</title>

    <!--css-->
    @vite([
        'resources/css/style.css',
        'resources/css/header.css',
        'resources/css/footer.css',
        'resources/css/admin.css',
        'resources/css/adminShop.css',
        'resources/css/pagination.css',
    ])

    <!--icons-->
    <script src="https://kit.fontawesome.com/0cca381f7a.js" crossorigin="anonymous"></script>

    <!--font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cardo&family=Comfortaa:wght@300..700&family=Lato:wght@300;900&display=swap" rel="stylesheet">

</head>
<body>

<!--HEADER-->
@include('components.adminHeader')

<main class = "admin-container">
    @include('components.sidebarAdmin')

    <div class = "admin-right_cont">
        <div class = "admin_btn_container">
            <a class = "admin_btn_add" href = {{route('shops.create')}}>Добавить</a>

            <form method="get" style="display: flex" action="{{route('shops.getShopsBySearch')}}">
                    <input type = "text" name = "search" class = "text-input" placeholder="Поиск...">
                    <button class="search_btn" type="submit">Поиск</button>
            </form>
        </div>

        <div class = "admin_container_header">
            @if(!$shops->isEmpty())
                <h2>Управление магазинами</h2>
                <div class = "admin_table_header">
                    <div class="admin_table_id">ID</div>
                    <div class = "admin_table_name bold">Название</div>
                    <div class = "admin_table_category bold">Категория</div>
                    <div class = "admin_table_control bold">Управление</div>
                </div>
            @else
                <h2>Магазины не найдены</h2>
            @endif
        </div>

        @foreach($shops as $key => $shop)
        <!--Магазин-->
        <div class = "admin_table_header">
            <div class="admin_table_id">@lang((request('page') ?? 1) * 8 + $key - 7)</div>
            <div class = "admin_table_name">@lang($shop->title)</div>
            <div class = "admin_table_category">
                @lang($shop->category_id ? $categories[$shop->category_id] : 'Нет категории')
            </div>
            <form action="{{route('shops.destroy', $shop->id)}}" method="POST" class = "admin_table_control">
                @csrf
                @method('DELETE')
                <a class = "admin_table_edit" href = "{{route('shops.edit', $shop->id)}}">edit</a>
                <button class = "admin_table_delete" type="SUBMIT">delete</button>
            </form>
        </div>
        <!--Магазин-->
        @endforeach

        <div class = "pagination_main" style="margin-top: 30px">
            {{ $shops->onEachSide(8)->links('components.pagination') }}
        </div>
    </div>
</main>


<!--FOOTER-->
@include("components.footer")

</body>
</html>
