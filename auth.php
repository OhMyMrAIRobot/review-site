<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width = device - width, initial-scale = 1">
    <title>some title</title>

    <!--css-->
    <link rel = "stylesheet" href = "./styles/style.css">
    <link rel = "stylesheet" href = "styles/header.css">
    <link rel = "stylesheet" href = "./styles/footer.css">
    <link rel = "stylesheet" href = "./styles/register.css">


    <!--boostrap-->
    <!--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">-->

    <!--icons-->
    <script src="https://kit.fontawesome.com/0cca381f7a.js" crossorigin="anonymous"></script>

    <!--font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cardo&family=Comfortaa:wght@300..700&family=Lato:wght@300;900&display=swap" rel="stylesheet">

</head>
<body>

<!--HEADER-->
<?php require "./components/header.php"?>

<!--MAIN-->
<form class = "reg_container">
    <h2 class = "reg_header">Авторизация</h2>
    <label class = "reg_label">Ваш логин</label>
    <input class = "reg_input" type = "text" placeholder="Введите логин...">


    <label class = "reg_label">Пароль</label>
    <input class = "reg_input" type = "password" placeholder="Введите пароль...">

    <div class = "reg_btns_container">
        <button class = "reg_btn">Войти</button>
        <a class = "login_href" href = "./register.php">Регистрация</a>
    </div>
</form>

<!--FOOTER-->
<?php require "./components/footer.php"?>

</body>
</html>