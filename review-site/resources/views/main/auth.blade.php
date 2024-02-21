<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width = device - width, initial-scale = 1">
    <title>Auth</title>

    <!--css-->
    @vite([
        'resources/css/style.css',
        'resources/css/header.css',
        'resources/css/footer.css',
        'resources/css/register.css',
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

<!--MAIN-->
<form class = "reg_container">
    <h2 class = "reg_header">Авторизация</h2>
    <label class = "reg_label">Ваш логин</label>
    <input class = "reg_input" type = "text" placeholder="Введите логин...">


    <label class = "reg_label">Пароль</label>
    <input class = "reg_input" type = "password" placeholder="Введите пароль...">

    <div class = "reg_btns_container">
        <button class = "reg_btn">Войти</button>
        <a class = "login_href" href="{{route('register')}}">Регистрация</a>
    </div>
</form>

<!--FOOTER-->
@include('components.footer')

</body>
</html>
