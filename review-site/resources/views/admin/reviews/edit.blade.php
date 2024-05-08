@extends('layouts.adminActionBase')

@section('page.title')
    @lang('admin/reviews.editTitle')
@endsection

@section('adminFormTitle')
    @lang('admin/reviews.editTitle')
@endsection

@section('adminFormBody')
    <form method="POST" action="{{route('reviews.update', $review->id)}}" enctype="multipart/form-data" class="bg-white  py-4 px-6 flex flex-col gap-y-6 h-fit w-1/2 border rounded-xl">
        @csrf
        @method('PUT')

        <div>
            <label for = "title" class="block mb-1 text-sm font-medium text-gray-900">@lang('admin/reviews.title')</label>
            <input name = "title" id="title" type = "text" placeholder="@lang('admin/reviews.title')..."
                   value="{{$review->title}}" class="bg-inherit border border-gray-300 text-gray-900 sm:text-sm rounded-lg outline-none focus:ring-indigo-800 focus:border-indigo-600 block w-full p-2.5">
        </div>

        <div>
            <label for = "desc" class="block mb-1 text-sm font-medium text-gray-900">@lang('admin/shops.description')</label>
            <textarea name="description" id="desc" placeholder="@lang('admin/shops.description')..." class="bg-inherit border border-gray-300 text-gray-900 sm:text-sm rounded-lg outline-none focus:ring-indigo-800 focus:border-indigo-600 block w-full h-24 p-2.5"
            >{{$review->description}}</textarea>
        </div>
        <input type="hidden" name = "user_id" value={{$review->user_id}}>
        <input type="hidden" name = "shop_id" value={{$review->shop_id}}>
        <input type="hidden" name = "rating" value={{$review->rating}}>
        <div>
            <label class="block mb-1 text-sm font-medium text-gray-900">@lang('admin/shops.rating')</label>
            @for ($i = 1; $i <= 5; $i++)
                @if ($i <= $review->rating)
                    <input style="display: none" type="radio" id="rating{{ $i }}" name="rating" value="{{ $i }}">
                    <label for="rating{{ $i }}"><i onclick="Rating(this)" class="star cursor-pointer text-xl active fa-solid fa-star"></i></label>
                @else
                    <input style="display: none" type="radio" id="rating{{ $i }}" name="rating" value="{{ $i }}">
                    <label for="rating{{ $i }}"><i onclick="Rating(this)" class="star cursor-pointer text-xl fa-regular fa-star"></i></label>
                @endif
            @endfor
        </div>
        <button type="submit" class="mt-2 mr-auto border rounded-xl bg-indigo-600 hover:bg-indigo-700 focus:ring-4 focus:outline-none focus:ring-gray-300 text-white font-bold text-base px-6 py-2">@lang('admin/shops.save')</button>
    </form>
@endsection

<script>
    const Rating = (current) => {
        let stars = Array.from(document.getElementsByClassName('star'));
        const currentIndex = stars.indexOf(current);
        stars.forEach((star, index) => {
            if (index <= currentIndex){
                star.classList.add('fa-solid', 'active');
                star.classList.remove('fa-regular');
            } else {
                star.classList.add('fa-regular');
                star.classList.remove('fa-solid', 'active');
            }
        })
    }
</script>
