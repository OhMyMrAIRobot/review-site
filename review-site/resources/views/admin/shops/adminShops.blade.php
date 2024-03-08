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
@include('components.header')

<main class = "admin-container">
    @include('components.sidebarAdmin')

    <div class = "admin-right_cont">
        <div class = "admin_btn_container">
            <a class = "admin_btn_add" href = {{route('shops.create')}}>Добавить</a>
        </div>

        <div class = "admin_container_header">
            <h2>Управление магазинами</h2>
            <div class = "admin_table_header">
                <div class="admin_table_id">ID</div>
                <div class = "admin_table_name bold">Название</div>
                <div class = "admin_table_category bold">Категория</div>
                <div class = "admin_table_control bold">Управление</div>
            </div>
        </div>

        @foreach($shops as $key => $shop)
        <!--Магазин-->
        <div class = "admin_table_header">
            <div class="admin_table_id">@lang($key)</div>
            <div class = "admin_table_name">@lang($shop->title)</div>
            <div class = "admin_table_category">@lang($categories[$shop->category_id])</div>
            <form action="{{route('shops.destroy', $shop->id)}}" method="POST" class = "admin_table_control">
                @csrf
                @method('DELETE')
                <a class = "admin_table_edit" href = "{{route('shops.edit', $shop->id)}}">edit</a>
                <button class = "admin_table_delete" type="SUBMIT">delete</button>
            </form>
        </div>
        <!--Магазин-->
        @endforeach
    </div>
</main>


<!--FOOTER-->
@include("components.footer")

</body>
</html>
