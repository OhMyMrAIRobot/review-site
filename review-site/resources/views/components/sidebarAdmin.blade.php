<div class="pl-8 py-4 pr-4 h-full bg-gray-100">
    <h3 class="text-3xl font-bold">@lang('admin/sidebar.title')</h3>
    <p class="text-sm font-bold mt-10 text-gray-500">@lang('admin/sidebar.navigation')</p>
    <ul class="flex flex-col mt-3 gap-2 font-bold text-xl">
        <li class="flex py-3 px-3 items-center hover:text-indigo-600 hover:bg-gray-200 rounded
        @if(Str::startsWith(request()->url(), route('shops.index'))) text-indigo-600 @endif">
            <i class="fa-solid fa-cart-shopping"></i>
            <a class = "w-full ml-3" href = "{{route('shops.index')}}">@lang('admin/sidebar.shops')</a>
        </li>

        <li class="flex py-3 px-3 items-center hover:text-indigo-600 hover:bg-gray-200 rounded
        @if(Str::startsWith(request()->url(), route('categories.index'))) text-indigo-600 @endif">
            <i class="fa-solid fa-bars-staggered"></i>
            <a class = "w-full ml-3" href = "{{route('categories.index')}}">@lang('admin/sidebar.categories')</a>
        </li>

        <li class="flex py-3 px-3 items-center hover:text-indigo-600 hover:bg-gray-200 rounded
        @if(Str::startsWith(request()->url(), route('reviews.index'))) text-indigo-600 @endif">
            <i class="fa-solid fa-star"></i>
            <a class = "w-full ml-3" href = "{{route('reviews.index')}}">@lang('admin/sidebar.reviews')</a>
        </li>

        <li class="flex py-3 px-3 items-center hover:text-indigo-600 hover:bg-gray-200 rounded
        @if(Str::startsWith(request()->url(), route('users.index'))) text-indigo-600 @endif">
            <i class="fa-solid fa-circle-user"></i>
            <a class = "w-full ml-3" href = "{{route('users.index')}}">@lang('admin/sidebar.users')</a>
        </li>

        <li class="flex py-3 px-3 items-center hover:text-indigo-600 hover:bg-gray-200 rounded
        @if(Str::startsWith(request()->url(), route('feedback.index'))) text-indigo-600 @endif">
            <i class="fa-solid fa-comments"></i>
            <a class = "w-full ml-3" href = "{{route('feedback.index')}}">@lang('admin/sidebar.feedback')</a>
        </li>

        <li class="flex py-3 px-3 items-center hover:text-indigo-600 hover:bg-gray-200 rounded
        @if(Str::startsWith(request()->url(), route('statistics.index'))) text-indigo-600 @endif">
            <i class="fa-solid fa-chart-simple"></i>
            <a class = "w-full ml-3" href = "{{route('statistics.index')}}">@lang('admin/sidebar.statistics')</a>
        </li>

        <li class="flex py-3 px-3 items-center hover:text-indigo-600 hover:bg-gray-200 rounded">
            <i class="fa-solid fa-right-from-bracket"></i>
            <a class = "w-full ml-3" href = "{{route('main.index')}}">@lang('admin/sidebar.exit')</a>
        </li>

    </ul>
</div>
