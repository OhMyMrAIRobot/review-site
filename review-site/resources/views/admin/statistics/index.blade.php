<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width = device - width, initial-scale = 1">
    <title>Statistics</title>

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>

</head>
<body>

<!--HEADER-->
{{--@include('components.adminHeader')--}}

{{--<main class = "admin-container">--}}

{{--    <div class = "admin-right_cont">--}}
{{--        <div class = "admin_btn_container">--}}

{{--        <div class = "admin_container_header">--}}
{{--            @if(!$shops->isEmpty())--}}
{{--                <h2>Управление магазинами</h2>--}}
{{--                <div class = "admin_table_header">--}}
{{--                    <div class="admin_table_id">ID</div>--}}
{{--                    <div class = "admin_table_name bold">Название</div>--}}
{{--                    <div class = "admin_table_category bold">Категория</div>--}}
{{--                    <div class = "admin_table_control bold">Управление</div>--}}
{{--                </div>--}}
{{--            @else--}}
{{--                <h2>Магазины не найдены</h2>--}}
{{--            @endif--}}
{{--        </div>--}}


{{--        <!--Магазин-->--}}
{{--        <div class = "admin_table_header">--}}
{{--            <div class="admin_table_id">@lang()</div>--}}
{{--            <div class = "admin_table_name">@lang()</div>--}}
{{--            <div class = "admin_table_category">--}}
{{--                @lang($shop->category_id ? $categories[$shop->category_id] : 'Нет категории')--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <!--Магазин-->--}}
{{--        @endforeach--}}

{{--    </div>--}}
{{--</main>--}}
@include('components.header')

<section class="grid grid-cols-12">
    <div class="col-span-3">
        @include('components.sidebarAdmin')
    </div>

    <div class="col-span-9 border-l bg-gray-50 pr-1">
        <form method="get" class="relative bg-gray-100" action="{{route('statistics.index')}}">
            <div class="absolute inset-y-0 start-0 flex items-center px-8 pointer-events-none ">
                <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
            </div>
            <input type="search" name = "search" id="default-search" class="block w-full py-4 px-14 outline-none text-sm text-gray-900 border-b border-r bg-gray-100 focus:ring-blue-500 focus:border-blue-500" placeholder="Search..." value="{{request('search')}}" />
            <button type="submit" class="absolute end-2.5 bottom-2.5 text-white bg-indigo-600 hover:bg-indigo-700 focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-lg text-sm px-4 py-2 font-bold"
            >Search</button>
        </form>

        <div class="border-b border-r p-4 bg-gray-50 flex gap-x-8">
            <a href = "{{route('shops.create')}}" class="border rounded-xl bg-indigo-600 hover:bg-indigo-700 focus:ring-4 focus:outline-none focus:ring-gray-300 text-white font-bold text-base px-6 py-2"
            >Button</a>
        </div>

        <div class="border-b border-r p-4 bg-gray-50 flex gap-x-8">
            <p>Unique visitors: {{$unique}}</p>
        </div>

        <div class="grid grid-cols-12 mt-1 text-base border-b bg-gray-50">
            <div class="col-span-1 font-bold pl-3 pt-1 pb-1 border-b">Id</div>

            <div class="col-span-2 font-bold pl-3 pt-1 pb-1 border-b">User</div>

            <div class="col-span-2 font-bold pl-3 pt-1 pb-1 border-b">Ip</div>

            <div class="col-span-2 font-bold pl-3 pt-1 pb-1 border-b">Browser</div>

            <div class="col-span-1 font-bold pl-3 pt-1 pb-1 border-b">Os</div>

            <div class="col-span-4 font-bold pl-3 pt-1 pb-1 border-b">Url</div>

            @foreach($activities as $key => $activity)
                <div class="col-span-1 font-bold pl-3 pt-3 pb-3 border-r">{{(request('page') ?? 1) * 50 + $key - 49}}</div>

                <div class="col-span-2 font pl-3 pt-3 pb-3 border-r">{{$users[$activity->user_id] ?? 'Guest'}}</div>

                <div class="col-span-2 text-gray-500 pl-3 pt-3 pb-3 cursor-pointer border-r">{{ $activity->ip }}</div>

                <div class="col-span-2 pl-3 pt-3 pb-3 border-r">{{$activity->browser}}</div>

                <div class="col-span-1 pl-3 pt-3 pb-3 border-r">{{$activity->os}}</div>

                <div class="col-span-4 pl-3 pt-3 pb-3 border-r">{{$activity->url}}</div>
            @endforeach
        </div>
        <div class = "pagination_main" style="margin-top: 30px">
            {{ $activities->onEachSide(50)->links('components.pagination') }}
        </div>
    </div>

</section>


<!--FOOTER-->
@include("components.footer")

</body>
</html>
