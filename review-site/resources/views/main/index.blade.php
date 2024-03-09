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
        'resources/css/main.css',
        'resources/css/shop.css',
        'resources/css/sidebar.css',
        'resources/css/footer.css',
        'resources/css/lastReviews.css',
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
<main>
{{--    <div class = "last_reviews_container">--}}
{{--        <h3>Последние отзывы</h3>--}}

{{--        @for ($i = 1; $i <= 3; $i++)--}}
{{--        <!--ОТЗЫВ-->--}}
{{--        <div class = "review_main">--}}
{{--            <img class = "img_review" alt="img_review" src="{{asset('/images/img.png')}}">--}}
{{--            <div class = "review_body">--}}
{{--                <div class = "review_main_header">--}}
{{--                    <a href="{{route('shop')}}">Магазин <?=$i?></a>--}}
{{--                    <div class = "review_main_rating">--}}
{{--                        <i class="fa-regular fa-star"></i>--}}
{{--                        <i class="fa-regular fa-star"></i>--}}
{{--                        <i class="fa-regular fa-star"></i>--}}
{{--                        <i class="fa-regular fa-star"></i>--}}
{{--                        <i class="fa-regular fa-star"></i>--}}
{{--                    </div>--}}
{{--                    <i class="review_icon fa-regular fa-user"></i>--}}
{{--                    <p class = "review_author">username</p>--}}
{{--                </div>--}}
{{--                <p class = "review_main_desc">Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam. ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam</p>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <!--ОТЗЫВ-->--}}
{{--        @endfor--}}

{{--        <h3>Магазины</h3>--}}
{{--    </div>--}}


    <div class = "main">
        <!--MAIN CONTENT-->
        <div class = "shop_container">

            @foreach($shops as $shop)
            <!--МАГАЗИН-->
            <div class = "shop">
                <img class = "shop_img" src="{{asset('images/'. $shop->img)}}" alt="shop_image">

                <div class = "shop_text">
                    <h3 class = "shop_title">
                        <a href="{{route('shop.index', $shop->id)}}">@lang($shop->title)</a>
                    </h3>

                    <p class="shop_description">Описание: @lang($shop->description)</p>
                    <p class="shop_tags">Категория: @lang($categories[$shop->category_id])</p>

                    <div class = "shop_rating">
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                    </div>

                    <button class="add_review_btn">Добавить отзыв</button>
                </div>
            </div>
            <!--МАГАЗИН-->
            @endforeach

        </div>

        <!--SIDEBAR-->
        <div class = "sidebar">
            <div class = "search_container">
                <h3 class = "search_title">Поиск</h3>
                <input type = "text" name = "search_name" class = "text-input" placeholder="Поиск...">
            </div>

            <div class = "categories_container">
                <h3 class = "categories_title">Категории</h3>
                <ul>
                    @foreach($categories as $category)
                    <li><a class = "category" href="#">@lang($category)</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

</main>

@include('components.footer')

</body>
</html>
