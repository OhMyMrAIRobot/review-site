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

    <link rel="stylesheet" href = "{{asset('/cssTest/test.css')}}">

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
    @if ($reviews)
    <div class = "last_reviews_container">
        <h3>Последние отзывы</h3>
        @foreach($reviews as $review)
        <!--ОТЗЫВ-->
        <div class = "review_main">
            <a href="{{route('shop.index', $review->shop_id)}}" class = "img_review">
                <img style="background: inherit; width: 100%; height: 100%" alt="img_review" src="{{asset('/images/' . $shopsArr[$review->shop_id]['img'])}}">
            </a>
            <div class = "review_body">
                <div class = "review_main_header">
                    <a href="{{route('shop.index', $review->shop_id)}}">
                        @lang($shopsArr[$review->shop_id]['title'] . ' — ' . $review->title)
                    </a>
                    <div class = "review_main_rating">
                        @for($i = 1; $i <= 5; $i++)
                            @if ($i <= $review->rating)
                                <i class="active fa-solid fa-star"></i>
                            @else
                                <i class="fa-regular fa-star"></i>
                            @endif
                        @endfor
                    </div>
                    <i class="review_icon fa-regular fa-user"></i>
                    <p class = "review_author">@lang($review->author)</p>
                </div>
                <p class = "review_main_desc">@lang($review->description)</p>
            </div>
        </div>
        <!--ОТЗЫВ-->
        @endforeach
        <h3>Магазины</h3>
    </div>
    @elseif ($method === 'category')
        <div class = "last_reviews_container">
            @if (!$shops->isEmpty())
                <h3>Магазины с категорией {{$categories[$id]}}:</h3>
            @else
                <h3>Магазины с категорией {{$categories[$id]}} не найдены!</h3>
            @endif
        </div>
    @elseif ($method === 'search')
        <div class = "last_reviews_container">
            @if (!$shops->isEmpty())
                <h3>Результаты поиска:</h3>
            @else
                <h3>Магазины не найдены!</h3>
            @endif
        </div>
    @endif


    <div class = "main">
        <!--MAIN CONTENT-->
        <div class = "shop_container">

            @foreach($shops as $shop)
            <!--МАГАЗИН-->
            <div class = "shop">
                <a class = "shop_img" href = "{{route('shop.index', $shop->id)}}">
                    <img style="background: #ffffff; width: 100%; height: 100%" src="{{asset('images/'. $shop->img)}}" alt="shop_image">
                </a>

                <div class = "shop_text">
                    <h3 class = "shop_title">
                        <a href="{{route('shop.index', $shop->id)}}">@lang($shop->title)</a>
                    </h3>

                    <p class="shop_description">Описание: @lang($shop->description)</p>
                    <p class="shop_tags">Категория: {{$shop->category_id ? $categories[$shop->category_id] : "Нет категории"}}</p>

                    <div class = "shop_rating">
                        @for($i = 1; $i <= 5; $i++)
                            @if ($i <= $shop->rating)
                                <i class="active fa-solid fa-star"></i>
                            @else
                                <i class="fa-regular fa-star"></i>
                            @endif
                        @endfor
                    </div>

                    <a href = '{{route('shop.index', $shop->id)}}' class="add_review_btn">Добавить отзыв</a>
                </div>
            </div>

            <!--МАГАЗИН-->
            @endforeach

        </div>

        <!--SIDEBAR-->
        <div class = "sidebar">
            <form method="post" class = "search_container" action="{{route('main.getShopsBySearch')}}">
                @csrf
                <h3 class = "search_title">Поиск</h3>
                <div style = "display: flex">
                    <input type = "text" name = "text" class = "text-input" placeholder="Поиск...">
                    <button class="search_btn" type="submit">Поиск</button>
                </div>
            </form>

            <div class = "categories_container">
                <h3 class = "categories_title">Категории</h3>
                <ul>
                    @foreach($categories as $key => $category)
                    <li><a class = "category" href="{{route('main.getShopsByCategory', $key)}}">@lang($category)</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

</main>

@include('components.footer')

</body>
</html>
