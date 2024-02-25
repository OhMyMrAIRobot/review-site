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
    'resources/css/adminCategory.css',
    'resources/css/adminAddShop.css',
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
            <h2>Редактировать магазин</h2>

            <input value = "Название" class = "shopName_input" type = "text" placeholder="Название...">

            <div class = "shop_desc_container">
                <h5>Описание</h5>
                <textarea placeholder="Описание..." class = "desc_text">Описание</textarea>
            </div>

            <h5>Изображение</h5>
            <div class = "select_shop_img_container">
                <input type="file" class="select_img_input" id="selectImg">
                <label class = "select_img_label"for="selectImg">Upload</label>
            </div>

            <h5>Категория</h5>
            <select class = "select_category" name="topic" aria-label="Default select example">
                <option selected>Категория:</option>
                <option>category 1</option>
                <option>category 2</option>
                <option>category 3</option>
                <option>category 4</option>
            </select>

            <h5>Контактная информация</h5>
            <div class = "contact_container">
                <div class = "contact">
                    <i class="icon fab fa-facebook"></i>
                    <input value = "facebook" class = "contact_input" type = "text">
                </div>

                <div class = "contact">
                    <i class="icon fab fa-instagram"></i>
                    <input value = "instagram" class = "contact_input" type = "text">
                </div>

                <div class = "contact">
                    <i class="icon fab fa-telegram"></i>
                    <input value = "telegram" class = "contact_input" type = "text">
                </div>

                <div class = "contact">
                    <i class="icon fab fa-vk"></i>
                    <input value = "vk" class = "contact_input" type = "text">
                </div>

                <div class = "contact">
                    <i class="icon fas fa-phone"></i>
                    <input value="+123 456 789" class = "contact_input" type = "text">
                </div>

                <div class = "contact">
                    <i class="icon fas fa-envelope"></i>
                    <input value = "mail@mail.com" class = "contact_input" type = "text">
                </div>
            </div>

            <button class = "admin_btn_add">Сохранить</button>
        </div>

    </div>
</main>


<!--FOOTER-->
@include('components.footer')

</body>
</html>
