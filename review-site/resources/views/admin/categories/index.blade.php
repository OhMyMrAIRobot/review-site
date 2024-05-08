@extends('layouts.adminBase')

@section('page.title')
    @lang('admin/categories.pageMain')
@endsection

@section('rightSide')
    @include('components.admin.adminCategories.searchBar')

    <div class="border-b border-r p-4 bg-gray-50 flex gap-x-8">
        <a href="{{route('categories.create')}}"
           class="border rounded-xl bg-indigo-600 hover:bg-indigo-700 focus:ring-4 focus:outline-none focus:ring-gray-300 text-white font-bold text-base px-6 py-2"
        >@lang('admin/categories.create')</a>
    </div>

    @include('components.admin.status')

    <div class="grid grid-cols-12 mt-1 text-base border-b bg-gray-50">
        <div class="col-span-1 font-bold pl-3 pt-1 pb-1 border-b">Id</div>

        <div class="col-span-5 font-bold pl-3 pt-1 pb-1 border-b">@lang('admin/categories.category')</div>

        <div class="col-span-3 font-bold pl-3 pt-1 pb-1 border-b">@lang('admin/categories.created')</div>

        <div class="col-span-3 font-bold pl-3 pt-1 pb-1 border-b">@lang('admin/categories.control')</div>

        @foreach($categories as $key => $category)
            @include('components.admin.adminCategories.categoryItem')
        @endforeach
    </div>

    <div class="pagination_main" style="margin-top: 30px">
        {{ $categories->onEachSide(10)->links('components.pagination') }}
    </div>
@endsection
