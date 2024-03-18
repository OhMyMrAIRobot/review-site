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
@include('components.adminHeader')

<main class = "admin-container">
    @include('components.sidebarAdmin')

    <div class = "admin-right_cont">

        <form method="POST" action="{{route('shops.update', $shop->id)}}" class = "admin_container_header" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <h2>Добавить магазин</h2>

            <input value="@lang($shop->title)" name = "title" class = "shopName_input" type = "text" placeholder="Название...">

            <div class = "shop_desc_container">
                <h5>Описание</h5>
                <textarea name="description" placeholder="Описание..." class = "desc_text">@lang($shop->description)</textarea>
            </div>

            <h5>Изображение</h5>
            <div class = "select_shop_img_container">
                <input type="hidden" name="img" value="{{$shop->img}}">
                <input name = "new_img" type="file" class="select_img_input">
            </div>

            <h5>Категория</h5>
            <select name = "category_id" class = "select_category" name="topic" aria-label="Default select example">
                @if ($shop->category_id)
                    <option value="{{$shop->category_id}}" selected>@lang($categories[$shop->category_id]):</option>
                @else
                    <option value="-1" selected>Выбрать категорию: </option>
                @endif
                @foreach($categories as $key => $category)
                    @if (!$shop->category_id)
                            <option value="{{$key}}">@lang($category)</option>
                    @elseif ($categories[$shop->category_id] !== $category)
                            <option value="{{$key}}">@lang($category)</option>
                    @endif
                @endforeach
            </select>

            <h5>Контактная информация</h5>
            <div class = "contact_container">
                <div class = "contact">
                    <i class="icon fab fa-facebook"></i>
                    <input value="@lang($shop->facebook)" name = "facebook" class = "contact_input" type = "text">
                </div>

                <div class = "contact">
                    <i class="icon fab fa-instagram"></i>
                    <input value="@lang($shop->instagram)" name = "instagram" class = "contact_input" type = "text">
                </div>

                <div class = "contact">
                    <i class="icon fab fa-telegram"></i>
                    <input value="@lang($shop->telegram)" name = "telegram" class = "contact_input" type = "text">
                </div>

                <div class = "contact">
                    <i class="icon fab fa-vk"></i>
                    <input value="@lang($shop->vk)" name = "vk" class = "contact_input" type = "text">
                </div>

                <div class = "contact">
                    <i class="icon fas fa-phone"></i>
                    <input value="@lang($shop->phone)" name = "phone" class = "contact_input" type = "text">
                </div>

                <div class = "contact">
                    <i class="icon fas fa-envelope"></i>
                    <input value="@lang($shop->email)" name = "email" class = "contact_input" type = "text">
                </div>
            </div>

            <button type="SUBMIT" class = "admin_btn_add">Сохранить</button>
        </form>

    </div>
</main>


<!--FOOTER-->
@include('components.footer')

</body>
</html>
