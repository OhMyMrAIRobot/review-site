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
    <div class="bg-white pt-8 lg:py-10">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl lg:mx-0">
                <h3 class="text-3xl font-bold">@lang('index.lastReviews')</h3>
            </div>

            <div class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-x-16 gap-y-16 border-t border-gray-200 pt-10 lg:mx-0 lg:max-w-none lg:grid-cols-3">
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
                        <img src="{{asset('images/img.png')}}" alt="user" class="h-10 w-10 rounded-full bg-gray-50">
                        <div class="text-sm leading-6">
                            <p class="font-bold text-gray-900">{{$review->author}}</p>
                        </div>
                    </div>

                </article>
                @endforeach
            </div>

        </div>
        @endif
    </div>

    <div class="bg-white lg:py-10">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="hidden lg:block mx-auto lg:max-w-2xl lg:mx-0">
                <h3 class="text-3xl font-bold">
                @if ($method === 'search')
                    @if ($shops->isEmpty())
                        @lang("index.noResults")
                    @else
                        @lang("index.searchResults")
                    @endif
                @elseif ($method === 'category')
                    @if ($shops->isEmpty())
                        @lang('index.noShopsCategory', ['category' => $categories[$id]])
                    @else
                        @lang('index.shopsCategory', ['category' => $categories[$id]])
                    @endif
                @else
                    @lang('index.shops')
                @endif
                </h3>
            </div>

            <div class="mx-auto mt-10 flex max-w-2xl flex-col-reverse gap-x-16 gap-y-10 border-t border-gray-200 lg:pt-10 lg:mx-0 lg:grid lg:max-w-none lg:grid-cols-12">
                <div class="flex flex-col gap-y-8 lg:col-span-8">

                    <div class="lg:hidden lg:max-w-2xl lg:mx-0 border-b pb-8">
                        <h3 class="text-3xl font-bold">
                            @if ($method === 'search')
                                @if ($shops->isEmpty())
                                    @lang("index.noResults")
                                @else
                                    @lang("index.searchResults")
                                @endif
                            @elseif ($method === 'category')
                                @if ($shops->isEmpty())
                                    @lang('index.noShopsCategory', ['category' => $categories[$id]])
                                @else
                                    @lang('index.shopsCategory', ['category' => $categories[$id]])
                                @endif
                            @else
                                @lang('index.shops')
                            @endif
                        </h3>
                    </div>

                    @foreach($shops as $shop)
                        <article class="flex max-w-3xl gap-x-3 border-b border-gray-200 pb-8">
                            <a href = {{route('shop.index', $shop->id)}}>
                                <img src="{{asset('images/'. $shop->img)}}" alt="shop_img" class="max-w-40 max-h-40">
                            </a>
                            <div class="flex flex-col">
                                <div class="flex items-center gap-x-4 text-xs">
                                    <div>
                                        @for($i = 1; $i <= 5; $i++)
                                            @if ($i <= $shop->rating)
                                                <i class="active fa-solid fa-star"></i>
                                            @else
                                                <i class="fa-regular fa-star"></i>
                                            @endif
                                        @endfor
                                    </div>
                                    <a href="{{route('main.getShopsByCategory', $shop->category_id ?? -1)}}" class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100">{{$shop->category_id ? $categories[$shop->category_id] : "No category"}}</a>
                                </div>
                                <div class="group relative">
                                    <h3 class="mt-3 text-lg font-bold leading-6 text-gray-900 group-hover:text-gray-600">
                                        <a href="{{route('shop.index', $shop->id)}}">
                                            <span class="absolute inset-0"></span>
                                            {{$shop->title}}
                                        </a>
                                    </h3>
                                    <p class="mt-3 line-clamp-3 text-sm leading-6 text-gray-600">{{$shop->description}}</p>
                                </div>
                                <a href="{{route('shop.index', $shop->id)}}" class="mt-4">@lang('index.addReview')</a>
                            </div>
                        </article>

                    @endforeach
                    {{ $shops->onEachSide(5)->links('components.pagination') }}
                </div>

                {{--SIDEBAR--}}
                <div class="lg:col-span-4 lg:border-l mt-8 lg:mt-0 lg:pl-2 h-fit lg:pb-8 lg:pt-2">
                    <form method="get" action="{{route('main.getShopsBySearch')}}">
                        <h3 class="text-3xl lg:text-2xl font-bold pb-1">@lang('index.search')</h3>
                        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">@lang('index.search')</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                </svg>
                            </div>
                            <input type="search" name = "search" id="default-search" class="block w-full p-4 ps-10 text-base text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="@lang('index.search')..." value="{{request('search')}}" />
                            <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-4 py-2">@lang('index.search')</button>
                        </div>
                    </form>
                    <h3 class="text-3xl lg:text-2xl font-bold pb-3 mt-8 lg:mt-4 border-t pt-8 lg:pt-4">@lang('index.categories')</h3>
                    <ul class="flex flex-col gap-y-3 lg:ml-5 lg:pb-4 overflow-scroll max-h-64">
                        @foreach($categories as $key => $category)
                            <li class="text-2xl block pl-2 border-b hover:ml-3 transition-all duration-500">
                                <a href="{{route('main.getShopsByCategory', $key)}}">@lang($category)</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                {{--SIDEBAR--}}
            </div>

        </div>
    </div>

</main>

@include('components.footer')

</body>
</html>
