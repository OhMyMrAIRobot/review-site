<div class="lg:col-span-4 lg:border-l mt-8 lg:mt-0 lg:pl-2 h-fit lg:pb-8 lg:pt-2">
    <form method="get" action="{{route('main.getShopsBySearch')}}">
        <h3 class="text-3xl lg:text-2xl font-bold pb-1">@lang('main/index.search')</h3>
        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">@lang('main/index.search')</label>
        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
            </div>
            <input type="search" name = "search" id="default-search" class="block w-full p-4 ps-10 text-base text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="@lang('main/index.search')..." value="{{request('search')}}" />
            <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-4 py-2">@lang('main/index.search')</button>
        </div>
    </form>
    <h3 class="text-3xl lg:text-2xl font-bold pb-3 mt-8 lg:mt-4 border-t pt-8 lg:pt-4">@lang('main/index.categories')</h3>
    <ul class="flex flex-col gap-y-3 lg:ml-5 lg:pb-4 overflow-scroll max-h-64">
        @foreach($categories as $key => $category)
            <li class="text-2xl block pl-2 border-b hover:ml-3 transition-all duration-500">
                <a href="{{route('main.getShopsByCategory', $key)}}">{{$category}}</a>
            </li>
        @endforeach
    </ul>
</div>
