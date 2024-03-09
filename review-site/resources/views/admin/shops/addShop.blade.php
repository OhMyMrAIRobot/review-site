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

        <form method="POST" action="{{route('shops.store')}}" class = "admin_container_header" enctype="multipart/form-data">
            @csrf
            <h2>Добавить магазин</h2>

            <input name = "title" class = "shopName_input" type = "text" placeholder="Название...">

            <div class = "shop_desc_container">
                <h5>Описание</h5>
                <textarea name="description" placeholder="Описание..." class = "desc_text"></textarea>
            </div>

            <h5>Изображение</h5>
            <div class = "select_shop_img_container">
                <input type="file" name = "img" class="select_img_input" >
            </div>

            <h5>Категория</h5>
            <select name = "category" class = "select_category">
                <option value="-1" selected>Категория:</option>
                @foreach($categories as $key => $category)
                    <option value="@lang($category->id)">@lang($category->category)</option>
                @endforeach
            </select>

            <h5>Контактная информация</h5>
            <div class = "contact_container">
                <div class = "contact">
                    <i class="icon fab fa-facebook"></i>
                    <input name = "facebook" class = "contact_input" type = "text">
                </div>

                <div class = "contact">
                    <i class="icon fab fa-instagram"></i>
                    <input name = "instagram" class = "contact_input" type = "text">
                </div>

                <div class = "contact">
                    <i class="icon fab fa-telegram"></i>
                    <input name = "telegram" class = "contact_input" type = "text">
                </div>

                <div class = "contact">
                    <i class="icon fab fa-vk"></i>
                    <input name = "vk" class = "contact_input" type = "text">
                </div>

                <div class = "contact">
                    <i class="icon fas fa-phone"></i>
                    <input name = "phone" class = "contact_input" type = "text">
                </div>

                <div class = "contact">
                    <i class="icon fas fa-envelope"></i>
                    <input name = "email" class = "contact_input" type = "text">
                </div>
            </div>

            <button type="SUBMIT" class = "admin_btn_add">Добавить</button>
        </form>
    </div>

</main>


<!--FOOTER-->
@include('components.footer')

</body>
</html>
