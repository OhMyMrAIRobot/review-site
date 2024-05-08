@extends('layouts.adminBase')

@section('page.title')
    @lang('admin/reviews.page')
@endsection

@section('rightSide')
    @include('components.admin.adminReviews.searchBar')

    @include('components.admin.status')

    <div class="grid grid-cols-12 mt-1 text-base border-b bg-gray-50">
        <div class="col-span-1 font-bold pl-3 pt-1 pb-1 border-b">ID</div>

        <div class="col-span-3 font-bold pl-3 pt-1 pb-1 border-b">@lang('admin/reviews.title')</div>

        <div class="col-span-2 font-bold pl-3 pt-1 pb-1 border-b">@lang('admin/reviews.sent')</div>

        <div class="col-span-3 font-bold pl-3 pt-1 pb-1 border-b">@lang('admin/reviews.author')</div>

        <div class="col-span-3 font-bold pl-3 pt-1 pb-1 border-b">@lang('admin/reviews.control')</div>
        @foreach($reviews as $key => $review)
            @include('components.admin.adminReviews.reviewItem')
        @endforeach
    </div>
    <div class="pagination_main" style="margin-top: 30px">
        {{ $reviews->onEachSide(10)->links('components.pagination') }}
    </div>
@endsection

