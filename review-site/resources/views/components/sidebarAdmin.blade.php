<div class="pl-8 py-4 pr-4 h-full bg-gray-100">
    <h3 class="text-3xl font-bold">Admin panel</h3>
    <p class="text-sm font-bold mt-10 text-gray-500">Navigation</p>
    <ul class="flex flex-col mt-3 gap-2 font-bold text-xl">
        <li class="flex py-3 px-3 items-center hover:text-indigo-600 hover:bg-gray-200 rounded
        @if(Str::startsWith(request()->url(), route('shops.index'))) text-indigo-600 @endif">
            <i class="fa-solid fa-cart-shopping"></i>
            <a class = "w-full ml-3" href = "{{route('shops.index')}}">Shops</a>
        </li>

        <li class="flex py-3 px-3 items-center hover:text-indigo-600 hover:bg-gray-200 rounded
        @if(Str::startsWith(request()->url(), route('categories.index'))) text-indigo-600 @endif">
            <i class="fa-solid fa-bars-staggered"></i>
            <a class = "w-full ml-3" href = "{{route('categories.index')}}">Categories</a>
        </li>

        <li class="flex py-3 px-3 items-center hover:text-indigo-600 hover:bg-gray-200 rounded
        @if(Str::startsWith(request()->url(), route('reviews.index'))) text-indigo-600 @endif">
            <i class="fa-solid fa-star"></i>
            <a class = "w-full ml-3" href = "{{route('reviews.index')}}">Reviews</a>
        </li>

        <li class="flex py-3 px-3 items-center hover:text-indigo-600 hover:bg-gray-200 rounded
        @if(Str::startsWith(request()->url(), route('users.index'))) text-indigo-600 @endif">
            <i class="fa-solid fa-circle-user"></i>
            <a class = "w-full ml-3" href = "{{route('users.index')}}">Users</a>
        </li>

        <li class="flex py-3 px-3 items-center hover:text-indigo-600 hover:bg-gray-200 rounded
        @if(Str::startsWith(request()->url(), route('feedback.index'))) text-indigo-600 @endif">
            <i class="fa-solid fa-comments"></i>
            <a class = "w-full ml-3" href = "{{route('feedback.index')}}">Feedback</a>
        </li>

        <li class="flex py-3 px-3 items-center hover:text-indigo-600 hover:bg-gray-200 rounded">
            <i class="fa-solid fa-right-from-bracket"></i>
            <a class = "w-full ml-3" href = "{{route('main.index')}}">Exit</a>
        </li>

    </ul>
</div>
