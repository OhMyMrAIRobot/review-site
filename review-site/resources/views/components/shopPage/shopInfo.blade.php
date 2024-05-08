<div class="col-span-6 flex flex-col gap-3">
    <h3 class="border-b pb-2 text-2xl font-bold">{{$shop->title}}</h3>
    <div class="flex items-center gap-x-6 text-sm">
        <div>
            @for($i = 1; $i <= 5; $i++)
                @if ($i <= $shop->rating)
                    <i class="text-xl active fa-solid fa-star"></i>
                @else
                    <i class="text-xl fa-regular fa-star"></i>
                @endif
            @endfor
        </div>
        <a href="{{route('main.getShopsByCategory', $shop->category_id ?? -1)}}"
           class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100">{{$category ?? "No category"}}</a>
    </div>
    <div class="group relative">
        <p class="text-sm leading-6">{{$shop->description}}</p>
    </div>
</div>
