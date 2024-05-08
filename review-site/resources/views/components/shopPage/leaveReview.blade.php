<div class="flex flex-col mt-4 w-full lg:w-1/2 ">
    @if(session('status_ok'))
        @component('components.success', ['status' => session('status_ok')])@endcomponent
    @elseif ($errors->any())
        @foreach ($errors->all() as $error)
            @component('components.error', ['status' => $error])@endcomponent
        @endforeach
    @elseif(session('status_err'))
        @component('components.error', ['status' => session('status_err')])@endcomponent
    @endif

    <form method="POST" action="{{route('reviews.store')}}" class="bg-white py-3 rounded-xl">
        @csrf
        <input name='rating' value="{{old('rating') ?? -1}}" type="hidden">
        <input name='user_id' value="{{\Illuminate\Support\Facades\Auth::user()->getUserId()}}" type="hidden">
        <input name='shop_id' value="{{$shop->id}}" type="hidden">
        <div>
            <label for="title"></label>
            <input name="title" id="title" placeholder="@lang('main/shop.title')"
                   class="text-base w-full border-none outline-none pb-2 px-4" value="{{old('title')}}">
        </div>

        <div>
            <label for="text"></label>
            <textarea name='description' id="text" placeholder="@lang('main/shop.description')"
                      class="text-sm w-full resize-none border-b mt-2 h-16 outline-none px-4 "
            >{{old('description')}}</textarea>
        </div>

        <div class="w-full flex justify-between px-4 items-center">
            <div class="cursor-default">
                @for ($i = 1; $i <= 5; $i++)
                    <input class="hidden" type="radio" id="rating{{ $i }}" name="rating" value="{{ $i }}">
                    <label for="rating{{ $i }}"><i onclick="Rating(this)" class="star text-xl cursor-pointer
                            {{$i <= old('rating') ? 'fa-solid active' : 'fa-regular'}} fa-star"></i></label>
                @endfor
            </div>
            <button class="border rounded px-2 py-1 bg-indigo-600 text-white hover:bg-indigo-700 text-center"
                    type="submit">
                @lang('main/shop.publish')
            </button>
        </div>
    </form>
</div>
