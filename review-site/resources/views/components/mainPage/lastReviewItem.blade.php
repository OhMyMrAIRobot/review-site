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
