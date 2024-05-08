<div class="bg-white pt-8 lg:py-10">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-2xl lg:mx-0">
            <h3 class="text-3xl font-bold">@lang('main/index.lastReviews')</h3>
        </div>

        <div
            class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-x-16 gap-y-16 border-t border-gray-200 pt-10 lg:mx-0 lg:max-w-none lg:grid-cols-3">
            @foreach($reviews as $key => $review)
                @include('components/mainPage.lastReviewItem')
            @endforeach
        </div>
    </div>
</div>
