<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width = device - width, initial-scale = 1">
    <title>admin shops</title>

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
        <form method="get" class="relative bg-gray-100" action="{{route('shops.getShopsBySearch')}}">
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
            >Create a shop</a>
        </div>

        <div class="grid grid-cols-12 mt-1 text-base border-b bg-gray-50">
            <div class="col-span-1 font-bold pl-3 pt-1 pb-1 border-b">ID</div>

            <div class="col-span-4 font-bold pl-3 pt-1 pb-1 border-b">Title</div>

            <div class="col-span-2 font-bold pl-3 pt-1 pb-1 border-b">Rating</div>

            <div class="col-span-2 font-bold pl-3 pt-1 pb-1 border-b">Category</div>

            <div class="col-span-3 font-bold pl-3 pt-1 pb-1 border-b">Control</div>

            @foreach($shops as $key => $shop)
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
                    <span class="cursor-default relative z-10 rounded-full bg-gray-100 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-200">{{$shop->category_id ? $categories[$shop->category_id] : "No category"}}</span>
                </div>

                <form action="{{route('shops.destroy', $shop->id)}}" method="POST" class = "flex gap-x-12 col-span-3 pl-3 pt-3 pb-3 border-r">
                    @csrf
                    @method('DELETE')
                    <a href = "{{route('shops.edit', $shop->id)}}" class="block h-fit text-white rounded-full font-medium bg-green-600 px-4 py-0.5 hover:bg-green-700"
                    >Edit</a>
                    <button type="submit" class="block h-fit text-white rounded-full font-medium bg-red-600 px-4 py-0.5 hover:bg-red-700"
                    >Delete</button>
                </form>
            @endforeach
        </div>
        <div class = "pagination_main" style="margin-top: 30px">
            {{ $shops->onEachSide(10)->links('components.pagination') }}
        </div>
    </div>

</section>


<!--FOOTER-->
@include("components.footer")

</body>
</html>
