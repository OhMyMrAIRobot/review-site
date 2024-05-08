<div class="overflow-x-hidden col-span-1 font-bold pl-3 pt-3 pb-3 border-b border-r">{{(request('page') ?? 1) * 10 + $key - 9}}</div>

<div class="overflow-x-hidden line-clamp-3 max-h-[5.5rem] border-b leading-6 text-base col-span-3 text-gray-500 pl-3 pt-3 pb-3 hover:text-indigo-600 hover:bg-gray-100 cursor-pointer border-r">
    <a href="{{route('reviews.edit', $review->id)}}">{{$review->title}}</a>
</div>

<div class="overflow-x-hidden col-span-2 text-gray-500 pl-3 border-b pt-3 pb-3 border-r ">{{ \Carbon\Carbon::parse($review->created_at)->format('G:i M j, Y') }}</div>

<div class="overflow-x-hidden col-span-3 text-gray-500 pl-3 pt-3 pb-3 border-r border-b overflow-hidden" style="text-overflow: ellipsis">{{$review->author}}</div>

<form action="{{route('reviews.destroy', $review->id)}}" method="POST" class = "flex gap-x-12 col-span-3 border-b pl-3 pt-3 pb-3 border-r">
    @csrf
    @method('DELETE')
    <a href = "{{route('reviews.edit', $review->id)}}" class="block h-fit text-white rounded-full font-medium bg-green-600 px-4 py-0.5 hover:bg-green-700"
    >@lang('admin/reviews.edit')</a>
    <button type="submit" class="block h-fit text-white rounded-full font-medium bg-red-600 px-4 py-0.5 hover:bg-red-700"
    >@lang('admin/reviews.delete')</button>
</form>
