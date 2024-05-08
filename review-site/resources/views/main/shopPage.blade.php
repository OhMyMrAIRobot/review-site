@extends('layouts.base')

@section('page.title')
    {{$shop->title}}
@endsection

@section('content')
    <section class="mx-auto max-w-screen-xl px-3">

        <h1 class="text-3xl font-bold leading-tight border-b pb-2 tracking-tight text-gray-900 mt-10">
            @lang('main/shop.shopInfo')
        </h1>

        <div class="lg:grid lg:grid-cols-12 flex flex-col gap-y-6 gap-x-4 px-2 py-5 mt-10 bg-white rounded-2xl">
            <div class="col-span-2 lg:mx-auto">
                <img src="{{asset('/images/'. $shop->img)}}" alt="shop_img" class="max-w-40 max-h-40">
            </div>

            @include('components.shopPage.shopInfo')

            @include('components.shopPage.totalReviews')
        </div>

        @if(!\Illuminate\Support\Facades\Auth::check())
            <h1 class="text-3xl font-bold leading-tight border-b pb-2 tracking-tight text-gray-900 mt-10">
                @lang('main/shop.login')
            </h1>
        @else
            <h1 class="text-3xl font-bold leading-tight tracking-tight border-b pb-2 text-gray-900 mt-10">
                @lang('main/shop.leaveReview')
            </h1>
            @include('components.shopPage.leaveReview')
        @endif

        @include('components.shopPage.reviews')

        <div class="mt-2 pb-10">{{ $reviews->onEachSide(6)->links('components.pagination') }}</div>
    </section>
@endsection

<script>
    const Rating = (current) => {
        let stars = Array.from(document.getElementsByClassName('star'));
        const currentIndex = stars.indexOf(current);
        stars.forEach((star, index) => {
            if (index <= currentIndex) {
                star.classList.add('fa-solid', 'active');
                star.classList.remove('fa-regular');
            } else {
                star.classList.add('fa-regular');
                star.classList.remove('fa-solid', 'active');
            }
        })
    }
</script>
