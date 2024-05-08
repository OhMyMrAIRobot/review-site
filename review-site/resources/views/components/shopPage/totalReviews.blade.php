<div class="col-span-4 w-1/2 lg:w-3/4 lg:mx-auto">
    <div class="flex flex-col gap-3">
        <h3 class="font-bold text-2xl border-b pb-2">@lang('main/shop.customerReviews')</h3>

        <div class="flex gap-2 items-center">
            <div>
                @for($i = 1; $i <= 5; $i++)
                    @if ($i <= $shop->rating)
                        <i class="text-sm active fa-solid fa-star"></i>
                    @else
                        <i class="text-sm fa-regular fa-star"></i>
                    @endif
                @endfor
            </div>
            <p class="text-sm">@lang('main/shop.totalReviews', ['count' => $reviewsCount])</p>
        </div>

        <div class="flex flex-col gap-3 border-b pb-2">
            @for($i = 5; $i >0; $i--)
                <div class="flex items-center gap-2">
                    <p style="font-size: 0.75rem">{{$i}}</p>
                    <i class="text-sm active fa-solid fa-star"></i>
                    <div
                        style="background-image: linear-gradient(to right, gold 0%, gold {{$shop->percentage[$i] ?? 0}}%, gray {{$shop->percentage[$i] ?? 0}}%, gray 100%)"
                        class="w-full rounded-full h-3"></div>
                    <p class="w-2 text-xs">{{$shop->percentage[$i] ?? 0}}%</p>
                </div>
            @endfor
        </div>
        {{--                    <span><i class = "fas fa-phone"></i>&nbsp @lang($shop->phone)</span>--}}
        {{--                    <span><i class = "fas fa-envelope"></i>&nbsp; @lang($shop->email)</span>--}}
        <div class="text-3xl flex gap-3">
            <a href = "{{$shop->facebook}}"><i class = "fab fa-facebook"></i></a>
            <a href = "{{$shop->instagram}}"><i class = "fab fa-instagram"></i></a>
            <a href = "{{$shop->telegram}}"><i class = "fab fa-telegram"></i></a>
            <a href = "{{$shop->vk}}"><i class = "fab fa-vk"></i></a>
        </div>
    </div>
</div>
