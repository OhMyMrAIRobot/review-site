<div class="col-span-1 font-bold pl-3 pt-3 pb-3 border-b border-r overflow-x-hidden">{{(request('page') ?? 1) * 10 + $key - 9}}</div>

<div class="col-span-5 text-gray-500 pl-3 border-b pt-3 pb-3 border-r overflow-x-hidden">{{ $category->category }}</div>

<div class="col-span-3 text-gray-500 pl-3 border-b pt-3 pb-3 border-r overflow-x-hidden">{{ \Carbon\Carbon::parse($category->created_at)->format('G:i M j, Y') }}</div>

<form action="{{route('categories.destroy', $category->id)}}" method="POST" class = "flex gap-x-12 col-span-3 border-b pl-3 pt-3 pb-3 border-r">
    @csrf
    @method('DELETE')
    <a href = "{{route('categories.edit', $category->id)}}" class="block h-fit text-white rounded-full font-medium bg-green-600 px-4 py-0.5 hover:bg-green-700"
    >@lang('admin/categories.edit')</a>
    <button type="submit" class="block h-fit text-white rounded-full font-medium bg-red-600 px-4 py-0.5 hover:bg-red-700"
    >@lang('admin/categories.delete')</button>
</form>
