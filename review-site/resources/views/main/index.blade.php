@extends('layouts.base')

@section('page.title')
    @lang('main/index.page')
@endsection

@if ($reviews)
    @section('lastReviews')
        @include('components/mainPage.lastReviews')
    @endsection
@endif

@section('content')
    <div class="bg-white lg:py-10">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            @include('components/mainPage.desktopSubtitle')

            <div class="mx-auto mt-10 flex max-w-2xl flex-col-reverse gap-x-16 gap-y-10 border-t border-gray-200 lg:pt-10 lg:mx-0 lg:grid lg:max-w-none lg:grid-cols-12">
                <div class="flex flex-col gap-y-8 lg:col-span-8">

                    @include('components/mainPage.mobileSubtitle')

                    @foreach($shops as $shop)
                        @include('components/mainPage.shop')
                    @endforeach

                    {{ $shops->onEachSide(5)->links('components.pagination') }}
                </div>

                @include('components/mainPage.sidebar')
            </div>
        </div>
    </div>
@endsection

