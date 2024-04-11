<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width = device - width, initial-scale = 1">
    <title>@lang('admin/statistics.page')</title>

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

@include('components.header')

<section class="grid grid-cols-12">
    <div class="col-span-3">
        @include('components.sidebarAdmin')
    </div>

    <div class="col-span-9 border-l bg-gray-50 pr-1">
        <form method="get" class="relative bg-gray-100" action="{{route('statistics.search')}}">
            <div class="w-full">
                <div class="absolute inset-y-0 start-0 flex items-center px-8 pointer-events-none ">
                    <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </div>
                <input type="search" name = "search" class="bg-gray-100 block py-4 px-14 w-full outline-none text-sm text-gray-900 border-b border-r " placeholder="@lang('admin/statistics.search')..." value="{{request('search')}}">
                <div class="absolute flex end-2.5 bottom-2.5 gap-x-3 items-center">
                    <input type="date" name="date_from" class="bg-inherit border rounded-lg px-4 py-0.5 text-sm" value="{{request('date_from')}}">
                    <span class="">@lang('admin/statistics.to')</span>
                    <input type="date" name="date_to" class="bg-inherit border rounded-lg px-4 py-0.5 text-sm" value="{{request('date_to')}}">
                    <button type="submit" class="text-white bg-indigo-600 hover:bg-indigo-700 focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-lg text-sm px-4 py-2 font-bold"
                    >@lang('admin/statistics.search')</button>
                </div>
            </div>
        </form>

        <div class="border-b border-r p-4 bg-gray-50 flex gap-x-8">
            <p>@lang('admin/statistics.unique', ['count' => $unique])</p>
        </div>

        <div class="grid grid-cols-12 mt-1 text-base border-b bg-gray-50">
            <div class="col-span-1 font-bold pl-3 pt-1 pb-1 border-b">Id</div>

            <div class="col-span-2 font-bold pl-3 pt-1 pb-1 border-b">@lang('admin/statistics.user')</div>

            <div class="col-span-2 font-bold pl-3 pt-1 pb-1 border-b">Ip</div>

            <div class="col-span-1 font-bold pl-3 pt-1 pb-1 border-b">@lang('admin/statistics.browser')</div>

            <div class="col-span-1 font-bold pl-3 pt-1 pb-1 border-b">@lang('admin/statistics.os')</div>

            <div class="col-span-3 font-bold pl-3 pt-1 pb-1 border-b">Url</div>

            <div class="col-span-2 font-bold pl-3 pt-1 pb-1 border-r border-b">@lang('admin/statistics.date')</div>

            @foreach($activities as $key => $activity)
                <div style="overflow-wrap: break-word" class="col-span-1 font-bold pl-3 pt-3 pb-3 border-b border-r">{{(request('page') ?? 1) * 50 + $key - 49}}</div>

                <div style="overflow-wrap: break-word" class="col-span-2 text-gray-500 font pl-3 pt-3 pb-3 border-b border-r">{{$users[$activity->user_id] ?? 'Guest'}}</div>

                <div style="overflow-wrap: break-word" class="col-span-2 text-gray-500 pl-3 pt-3 pb-3 border-b border-r">{{ $activity->ip }}</div>

                <div style="overflow-wrap: break-word" class="col-span-1 text-gray-500 pl-3 pt-3 pb-3 border-b border-r">{{$activity->browser}}</div>

                <div style="overflow-wrap: break-word" class="col-span-1 text-gray-500 pl-3 pt-3 pb-3 border-b border-r">{{$activity->os}}</div>

                <div style="overflow-wrap: break-word" class="col-span-3 text-gray-500 pl-3 pt-3 pb-3 border-b border-r">{{$activity->url}}</div>

                <div style="overflow-wrap: break-word" class="col-span-2 text-gray-500 pl-3 pt-3 pb-3 border-b border-r">{{ \Carbon\Carbon::parse($activity->created_at)->format('G:i:s d-m-Y') }}</div>
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
