<div class="flex gap-2 bg-white rounded-xl px-2 py-2">
    <div>
        <img src="{{asset('images/img.png')}}" alt="user" class="max-w-10 rounded-full bg-gray-50">
    </div>
    <div class="flex flex-col gap-2">
        <div class="leading-6">
            <p class="font-bold text-xl text-gray-700">{{$review->author}}</p>
            <time
                class="text-gray-500 text-sm">{{ \Carbon\Carbon::parse($review->created_at)->format('G:i M j, Y') }}</time>
        </div>

        <div>
            @for($i = 1; $i <= 5; $i++)
                @if ($i <= $review->rating)
                    <i class="active fa-solid fa-star"></i>
                @else
                    <i class="fa-regular fa-star"></i>
                @endif
            @endfor
        </div>

        <div>
            <h3 class="text-lg font-bold leading-6 text-gray-900">{{$review->title}}</h3>
            <p class="text-sm leading-6 text-gray-600">{{$review->description}}</p>
        </div>
    </div>
</div>
