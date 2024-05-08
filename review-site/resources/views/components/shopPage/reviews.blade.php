<h1 class="text-3xl font-bold leading-tight border-b pb-2 tracking-tight text-gray-900 mt-10">
    @if ($reviews->isEmpty())
        @lang('main/shop.noReviews')
    @else
        @lang('main/shop.lastReviews')
    @endif
</h1>

<div class="flex flex-col gap-4 mt-4 lg:grid lg:grid-cols-2 lg:gap-x-8 lg:gap-y-8">
    @foreach($reviews as $review)
        @include('components.shopPage.reviewItem')
    @endforeach
</div>
