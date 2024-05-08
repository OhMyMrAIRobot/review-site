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
        <a href="{{route('shop.index', $shop->id)}}" class="mt-4">@lang('main/index.addReview')</a>
    </div>
</article>
