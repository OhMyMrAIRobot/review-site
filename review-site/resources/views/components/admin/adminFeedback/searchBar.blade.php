<form method="get" class="relative bg-gray-100" action="{{route('feedback.getFeedbackBySearch')}}">
    <div class="absolute inset-y-0 start-0 flex items-center px-8 pointer-events-none ">
        <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
        </svg>
    </div>
    <input type="search" name = "search" id="default-search" class="block w-full py-4 px-14 outline-none text-sm text-gray-900 border-b border-r bg-gray-100 focus:ring-blue-500 focus:border-blue-500" placeholder="@lang('admin/feedback.search')..." value="{{request('search')}}" />
    <div class="absolute flex end-2.5 bottom-2.5 gap-x-3 items-center">
        <input type="date" name="date_from" class="bg-inherit border rounded-lg px-4 py-0.5 text-sm" value="{{request('date_from')}}">
        <span class="">to</span>
        <input type="date" name="date_to" class="bg-inherit border rounded-lg px-4 py-0.5 text-sm" value="{{request('date_to')}}">
        <button type="submit" class="text-white bg-indigo-600 hover:bg-indigo-700 focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-lg text-sm px-4 py-2 font-bold"
        >@lang('admin/feedback.search')</button>
    </div>
</form>
