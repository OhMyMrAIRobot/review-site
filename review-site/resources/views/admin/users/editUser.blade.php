<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width = device - width, initial-scale = 1">
    <title>admin categories</title>

    <!--css-->
    @vite([
    'resources/css/style.css',
    'resources/css/header.css',
    'resources/css/footer.css',
    'resources/css/admin.css',
    'resources/css/adminUsers.css',
    'resources/css/adminEditUser.css',
    ])

    <link rel = "stylesheet" href = "{{asset('cssTest/test.css')}}">

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
            <h2>Редактировать пользователя</h2>

            <div class = "admin_edit_user_container">
                <h5>Имя пользователя</h5>
                <input value = "username" class = "input_category">

                <h5>Email</h5>
                <input value = "email@mail.com" class = "input_category">

                <h5>Пароль</h5>
                <input class = "input_category">

                <div class = "admin_checkbox">
                    <input type="checkbox">
                    Админ
                </div>
            </div>



            <button class = "admin_btn_edit">Сохранить</button>
        </div>

    </div>
</main>


<!--FOOTER-->
@include('components.footer')

</body>
</html>

