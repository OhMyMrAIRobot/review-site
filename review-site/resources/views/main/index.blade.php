<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width = device - width, initial-scale = 1">
    <title>Review site</title>

    <!--css-->
    @vite([
        'resources/css/style.css',
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
    @if ($reviews)
    <div class="bg-white py-10">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl lg:mx-0">
                <h3 class="text-3xl font-bold">Последние отзывы</h3>
            </div>

            <div class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-x-16 gap-y-16 border-t border-gray-200 pt-10 sm:mt-10 sm:pt-16 lg:mx-0 lg:max-w-none lg:grid-cols-3">
                @foreach($reviews as $key => $review)
                <article class="flex max-w-xl flex-col items-start justify-between">
                    <div class="flex items-center gap-x-4 text-xs">
                        <time class="text-gray-500">{{ \Carbon\Carbon::parse($review->created_at)->format('G:i M j, Y') }}</time>
                        <div>
                            @for($i = 1; $i <= 5; $i++)
                                @if ($i <= $review->rating)
                                    <i class="active fa-solid fa-star"></i>
                                @else
                                    <i class="fa-regular fa-star"></i>
                                @endif
                            @endfor
                        </div>
                    </div>

                    <div class="group relative">
                        <h3 class="mt-3 text-lg font-bold leading-6 text-gray-900 group-hover:text-gray-600">
                            <a href="{{route('shop.index', $review->shop_id)}}">
                                <span class="absolute inset-0"></span>
                                {{$review->title}}
                            </a>
                        </h3>
                        <p class="mt-3 line-clamp-3 text-sm leading-6 text-gray-600">{{$review->description}}</p>
                    </div>

                    <div class="relative mt-5 flex items-center gap-x-2">
                        <img src="{{asset('images/img.png')}}" alt="" class="h-10 w-10 rounded-full bg-gray-50">
                        <div class="text-sm leading-6">
                            <p class="font-bold text-gray-900">{{$review->author}}</p>
                        </div>
                    </div>

                </article>
                @endforeach
            </div>

        </div>
        @endif







{{--        <!--ОТЗЫВ-->--}}
{{--        <div class = "review_main">--}}
{{--            <div class = "review_body">--}}
{{--                <div class = "review_main_header">--}}
{{--                    <a href="{{route('shop.index', $review->shop_id)}}">--}}
{{--                        @lang($reviewShops[$key]['title'] . ' — ' . $review->title)--}}
{{--                    </a>--}}
{{--                    <div class = "review_main_rating">--}}
{{--                    </div>--}}
{{--                    <i class="review_icon fa-regular fa-user"></i>--}}
{{--                    <p class = "review_author">@lang($review->author)</p>--}}
{{--                </div>--}}
{{--                <p class = "review_main_desc">@lang($review->description)</p>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <!--ОТЗЫВ-->--}}

{{--        <h3>Магазины</h3>--}}
{{--    </div>--}}
{{--    @elseif ($method === 'category')--}}
{{--        <div class = "last_reviews_container">--}}
{{--            @if (!$shops->isEmpty())--}}
{{--                <h3>Магазины с категорией {{$categories[$id]}}:</h3>--}}
{{--            @else--}}
{{--                <h3>Магазины с категорией {{$categories[$id]}} не найдены!</h3>--}}
{{--            @endif--}}
{{--        </div>--}}
{{--    @elseif ($method === 'search')--}}
{{--        <div class = "last_reviews_container">--}}
{{--            @if (!$shops->isEmpty())--}}
{{--                <h3>Результаты поиска:</h3>--}}
{{--            @else--}}
{{--                <h3>Магазины не найдены!</h3>--}}
{{--            @endif--}}
{{--        </div>--}}


{{--    <div class = "main">--}}
{{--        <!--MAIN CONTENT-->--}}
{{--        <div class = "shop_container">--}}

{{--            @foreach($shops as $shop)--}}
{{--            <!--МАГАЗИН-->--}}
{{--            <div class = "shop">--}}
{{--                <a class = "shop_img" href = "{{route('shop.index', $shop->id)}}">--}}
{{--                    <img style="background: #ffffff; width: 100%; height: 100%" src="{{asset('images/'. $shop->img)}}" alt="shop_image">--}}
{{--                </a>--}}

{{--                <div class = "shop_text">--}}
{{--                    <h3 class = "shop_title">--}}
{{--                        <a href="{{route('shop.index', $shop->id)}}">@lang($shop->title)</a>--}}
{{--                    </h3>--}}

{{--                    <p class="shop_description">Описание: @lang($shop->description)</p>--}}
{{--                    <p class="shop_tags">Категория: {{$shop->category_id ? $categories[$shop->category_id] : "Нет категории"}}</p>--}}

{{--                    <div class = "shop_rating">--}}
{{--                        @for($i = 1; $i <= 5; $i++)--}}
{{--                            @if ($i <= $shop->rating)--}}
{{--                                <i class="active fa-solid fa-star"></i>--}}
{{--                            @else--}}
{{--                                <i class="fa-regular fa-star"></i>--}}
{{--                            @endif--}}
{{--                        @endfor--}}
{{--                    </div>--}}

{{--                    <a href = '{{route('shop.index', $shop->id)}}' class="add_review_btn">Добавить отзыв</a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!--МАГАЗИН-->--}}
{{--            @endforeach--}}
{{--            <div class = "pagination_main">--}}
{{--                {{ $shops->onEachSide(5)->links('components.pagination') }}--}}
{{--            </div>--}}

{{--        </div>--}}

{{--        <!--SIDEBAR-->--}}
{{--        <div class = "sidebar">--}}
{{--            <form method="get" class = "search_container" action="{{route('main.getShopsBySearch')}}">--}}
{{--                <h3 class = "search_title">Поиск</h3>--}}
{{--                <div style = "display: flex">--}}
{{--                    <input type = "text" name = "search" class = "text-input" placeholder="Поиск...">--}}
{{--                    <button class="search_btn" type="submit">Поиск</button>--}}
{{--                </div>--}}
{{--            </form>--}}

{{--            <div class = "categories_container">--}}
{{--                <h3 class = "categories_title">Категории</h3>--}}
{{--                <ul>--}}
{{--                    @foreach($categories as $key => $category)--}}
{{--                        <li><a class = "category" href="{{route('main.getShopsByCategory', $key)}}">@lang($category)</a></li>--}}
{{--                    @endforeach--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

</main>

@include('components.footer')

</body>
</html>
