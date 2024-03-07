<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width = device - width, initial-scale = 1">
    <title>some title</title>

    <!--css-->
    @vite([
        'resources/css/style.css',
        'resources/css/header.css',
        'resources/css/footer.css',
        'resources/css/admin.css',
        'resources/css/adminUsers.css',
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
        <div class = "admin_container_header">
            <h2>Управление пользователями</h2>
            <div class = "admin_table_header">
                <div class="admin_table_id">ID</div>
                <div class = "admin_table_login bold">Логин</div>
                <div class = "admin_table_email bold">Email</div>
                <div class = "admin_table_role bold">Роль</div>
                <div class = "admin_table_control bold">Управление</div>
            </div>
        </div>

        @for ($i = 1; $i <= 5; $i++)
        <!--USER-->
        <div class = "admin_table_header">
            <div class="admin_table_id"><?=$i?></div>
            <div class = "admin_table_login">login</div>
            <div class = "admin_table_email">Email@gmail.com</div>
            <div class = "admin_table_role"><?=$i % 2 === 0 ? 'admin' : 'user'?></div>
            <div class = "admin_table_control">
                <a class = "admin_table_edit" href = "{{route('adminUserAdd')}}">edit</a>
                <a class = "admin_table_delete" href = "#">delete</a>
            </div>
        </div>
        <!--USER-->
        @endfor

    </div>
</main>

<!--FOOTER-->
@include('components.footer')

</body>
</html>
