<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width = device - width, initial-scale = 1">
    <title>some title</title>

    <!--css-->
    <link rel = "stylesheet" href = "../styles/style.css">
    <link rel = "stylesheet" href = "../styles/header.css">
    <link rel = "stylesheet" href = "../styles/footer.css">
    <link rel = "stylesheet" href = "../styles/admin.css">

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
<?php require "../components/header.php"?>

<main class = "admin-container">
    <div class = "admin-left_cont">
        <h3 class = "admin_left_header">Админ панель</h3>
        <ul>
            <li><a class = "admin_sidebar_item" href = "#">Магазины</a></li>
            <li><a class = "admin_sidebar_item" href = "#">Категории</a></li>
            <li><a class = "admin_sidebar_item" href = "#">Отзывы</a></li>
            <li><a class = "admin_sidebar_item" href = "#">Пользователи</a></li>
        </ul>
    </div>

    <div class = "admin-right_cont">

    </div>
</main>


<!--FOOTER-->
<?php require "../components/footer.php"?>

</body>
</html>