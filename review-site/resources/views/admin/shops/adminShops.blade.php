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
            <a class = "admin_btn_add" href = {{route('adminShopAdd')}}>Добавить</a>
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

        <!--Магазин 1-->
        <div class = "admin_table_header">
            <div class="admin_table_id">1</div>
            <div class = "admin_table_name">Магазин 1</div>
            <div class = "admin_table_category">Категория 1</div>
            <div class = "admin_table_control">
                <a class = "admin_table_edit" href = "#">edit</a>
                <a class = "admin_table_delete" href = "#">delete</a>
            </div>
        </div>
        <!--Магазин 1-->

        <!--Магазин 2-->
        <div class = "admin_table_header">
            <div class="admin_table_id">2</div>
            <div class = "admin_table_name">Магазин 2</div>
            <div class = "admin_table_category">Категория 2</div>
            <div class = "admin_table_control">
                <a class = "admin_table_edit" href = "#">edit</a>
                <a class = "admin_table_delete" href = "#">delete</a>
            </div>
        </div>
        <!--Магазин 2-->


    </div>
</main>


<!--FOOTER-->
@include('components.footer')

</body>
</html>
