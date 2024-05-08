<div class="col-span-1 font-bold pl-3 pt-3 pb-3 border-r">{{(request('page') ?? 1) * 10 + $key - 9}}</div>

<div class="col-span-4 text-gray-500 pl-3 pt-3 pb-3 hover:text-indigo-600 hover:bg-gray-100 cursor-pointer border-r">
    <a href="{{route('shop.index', $shop->id)}}" class="block w-full">
        {{ $shop->title }}
    </a>
</div>

<div class="col-span-2 pl-3 pt-3 pb-3 border-r">
    @for($i = 1; $i <= 5; $i++)
        @if ($i <= $shop->rating)
            <i class="active fa-solid fa-star"></i>
        @else
            <i class="fa-regular fa-star"></i>
        @endif
    @endfor
</div>

<div class="col-span-2 pl-3 pt-3 pb-3 border-r">
    <span class="cursor-default relative z-10 rounded-full bg-gray-100 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-200">
        {{$shop->category_id ? $categories[$shop->category_id] : trans('admin/shops.noCategory')}}
    </span>
</div>

<form action="{{route('shops.destroy', $shop->id)}}" method="POST" class = "flex gap-x-12 col-span-3 pl-3 pt-3 pb-3 border-r">
    @csrf
    @method('DELETE')
    <a href = "{{route('shops.edit', $shop->id)}}" class="block h-fit text-white rounded-full font-medium bg-green-600 px-4 py-0.5 hover:bg-green-700"
    >@lang('admin/shops.edit')</a>
    <button type="submit" class="block h-fit text-white rounded-full font-medium bg-red-600 px-4 py-0.5 hover:bg-red-700"
    >@lang('admin/shops.delete')</button>
</form>
