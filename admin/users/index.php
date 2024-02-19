<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width = device - width, initial-scale = 1">
    <title>some title</title>

    <!--css-->
    <link rel = "stylesheet" href = "../../styles/style.css">
    <link rel = "stylesheet" href = "../../styles/header.css">
    <link rel = "stylesheet" href = "../../styles/footer.css">
    <link rel = "stylesheet" href = "../../styles/admin.css">
    <link rel = "stylesheet" href = "./adminUsers.css">

    <!--boostrap-->
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">-->

    <!--icons-->
    <script src="https://kit.fontawesome.com/0cca381f7a.js" crossorigin="anonymous"></script>

    <!--font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cardo&family=Comfortaa:wght@300..700&family=Lato:wght@300;900&display=swap" rel="stylesheet">

</head>
<body>

<!--HEADER-->
<?php require "../../components/header.php"?>

<main class = "admin-container">
    <?php require "../../components/sidebarAdmin.php" ?>

    <div class = "admin-right_cont">
        <div class = "admin_btn_container">
            <button class = "admin_btn_add">Добавить</button>
        </div>

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

        <!--USER 1-->
        <div class = "admin_table_header">
            <div class="admin_table_id">1</div>
            <div class = "admin_table_login">login</div>
            <div class = "admin_table_email">Email@gmail.com</div>
            <div class = "admin_table_role">User</div>
            <div class = "admin_table_control">
                <a class = "admin_table_edit" href = "#">edit</a>
                <a class = "admin_table_delete" href = "#">delete</a>
            </div>
        </div>
        <!--USER 1-->

        <!--USER 2-->
        <div class = "admin_table_header">
            <div class="admin_table_id">2</div>
            <div class = "admin_table_login">Admin</div>
            <div class = "admin_table_email">admin@gmail.com</div>
            <div class = "admin_table_role">Admin</div>
            <div class = "admin_table_control">
                <a class = "admin_table_edit" href = "#">edit</a>
                <a class = "admin_table_delete" href = "#">delete</a>
            </div>
        </div>
        <!--USER 2-->


    </div>
</main>

<!--FOOTER-->
<?php require "../../components/footer.php"?>

</body>
</html>
