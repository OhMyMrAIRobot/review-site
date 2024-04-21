<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width = device - width, initial-scale = 1">
    <title>@lang('admin/categories.pageMain')</title>

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
@include('components.Header')

<section class="grid grid-cols-12">
    <div class="col-span-3">
        @include('components.sidebarAdmin')
    </div>

    <div class="col-span-9 border-l bg-gray-50 pr-1">
        <form method="get" class="relative bg-gray-100" action="{{route('categories.getCategoriesBySearch')}}">
            <div class="absolute inset-y-0 start-0 flex items-center px-8 pointer-events-none ">
                <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
            </div>
            <input type="search" name = "search" id="default-search" class="block w-full py-4 px-14 outline-none text-sm text-gray-900 border-b border-r bg-gray-100 focus:ring-blue-500 focus:border-blue-500"
                   placeholder="@lang('admin/shops.search')..." value="{{request('search')}}" />
            <button type="submit" class="absolute end-2.5 bottom-2.5 text-white bg-indigo-600 hover:bg-indigo-700 focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-lg text-sm px-4 py-2 font-bold"
            >@lang('admin/shops.search')</button>
        </form>

        <div class="border-b border-r p-4 bg-gray-50 flex gap-x-8">
            <a href = "{{route('categories.create')}}" class="border rounded-xl bg-indigo-600 hover:bg-indigo-700 focus:ring-4 focus:outline-none focus:ring-gray-300 text-white font-bold text-base px-6 py-2"
            >@lang('admin/categories.create')</a>
        </div>

        @if (session('status_ok'))
            <div class="mt-3 w-full pl-3 border-b">
                <div class="w-1/3">
                    @if (session('status_ok'))
                        @component('components.success', ['status' => session('status_ok')])@endcomponent
                    @endif
                </div>
            </div>
        @endif

        <div class="grid grid-cols-12 mt-1 text-base border-b bg-gray-50">
            <div class="col-span-1 font-bold pl-3 pt-1 pb-1 border-b">Id</div>

            <div class="col-span-5 font-bold pl-3 pt-1 pb-1 border-b">@lang('admin/categories.category')</div>

            <div class="col-span-3 font-bold pl-3 pt-1 pb-1 border-b">@lang('admin/categories.created')</div>

            <div class="col-span-3 font-bold pl-3 pt-1 pb-1 border-b">@lang('admin/categories.control')</div>

            @foreach($categories as $key => $category)
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
            @endforeach
        </div>
        <div class = "pagination_main" style="margin-top: 30px">
            {{ $categories->onEachSide(10)->links('components.pagination') }}
        </div>
    </div>

</section>

@include('components.footer')

</body>
</html>