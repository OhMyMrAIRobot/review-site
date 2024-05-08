@extends('layouts.adminBase')

@section('page.title')
    @lang('admin/shops.pageIndex')
@endsection

@section('rightSide')
    @include('components.adminShop.searchBar')

    <div class="border-b border-r p-4 bg-gray-50 flex gap-x-8">
        <a href = "{{route('shops.create')}}" class="border rounded-xl bg-indigo-600 hover:bg-indigo-700 focus:ring-4 focus:outline-none focus:ring-gray-300 text-white font-bold text-base px-6 py-2"
        >@lang('admin/shops.create')</a>
    </div>

    @include('components.admin.status')

    <div class="grid grid-cols-12 mt-1 text-base border-b bg-gray-50">
        <div class="col-span-1 font-bold pl-3 pt-1 pb-1 border-b">ID</div>

        <div class="col-span-4 font-bold pl-3 pt-1 pb-1 border-b overflow-x-hidden">@lang('admin/shops.title')</div>

        <div class="col-span-2 font-bold pl-3 pt-1 pb-1 border-b overflow-x-hidden">@lang('admin/shops.rating')</div>

        <div class="col-span-2 font-bold pl-3 pt-1 pb-1 border-b overflow-x-hidden">@lang('admin/shops.category')</div>

        <div class="col-span-3 font-bold pl-3 pt-1 pb-1 border-b overflow-x-hidden">@lang('admin/shops.control')</div>

        @foreach($shops as $key => $shop)
            @include('components.adminShop.shopItem')
        @endforeach
    </div>
    <div class = "pagination_main" style="margin-top: 30px">
        {{ $shops->onEachSide(10)->links('components.pagination') }}
    </div>
@endsection



