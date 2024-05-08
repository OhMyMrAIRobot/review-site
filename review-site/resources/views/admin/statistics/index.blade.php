@extends('layouts.adminBase')

@section('page.title')
    @lang('admin/statistics.page')
@endsection

@section('rightSide')
    @include('components.admin.adminStatistics.searchBar')

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
            @include('components.admin.adminStatistics.statisticsItem')
        @endforeach
    </div>
    <div class = "pagination_main" style="margin-top: 30px">
        {{ $activities->onEachSide(50)->links('components.pagination') }}
    </div>
@endsection

