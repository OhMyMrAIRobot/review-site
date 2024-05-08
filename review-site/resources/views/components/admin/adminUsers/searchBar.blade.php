<form method="get" class="relative bg-gray-100" action="{{route('users.getUsersBySearch')}}">
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
