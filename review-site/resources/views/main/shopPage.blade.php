<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width = device - width, initial-scale = 1">
    <title>{{$shop->title}}</title>

    <!--css-->
    @vite([
        'resources/css/style.css',
    ])

    <!--icons-->
    <script src="https://kit.fontawesome.com/0cca381f7a.js" crossorigin="anonymous"></script>

    <!--font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Cardo&family=Comfortaa:wght@300..700&family=Lato:wght@300;900&display=swap"
        rel="stylesheet">

</head>
<body class="bg-gray-50">

<!--HEADER-->
@include('components.header')

<section class="mx-auto max-w-screen-xl px-3">

    <h1 class="text-3xl font-bold leading-tight border-b pb-2 tracking-tight text-gray-900 mt-10">
        Shop info
    </h1>

    <div class="lg:grid lg:grid-cols-12 flex flex-col gap-y-6 gap-x-4 px-2 py-5 mt-10 bg-white rounded-2xl">
        <div class="col-span-2 lg:mx-auto">
            <img src="{{asset('/images/'. $shop->img)}}" alt="shop_img" class="max-w-40 max-h-40">
        </div>

        <div class="col-span-6 flex flex-col gap-3">
            <h3 class="border-b pb-2 text-2xl font-bold">{{$shop->title}}</h3>
            <div class="flex items-center gap-x-6 text-sm">
                <div>
                    @for($i = 1; $i <= 5; $i++)
                        @if ($i <= $shop->rating)
                            <i class="text-xl active fa-solid fa-star"></i>
                        @else
                            <i class="text-xl fa-regular fa-star"></i>
                        @endif
                    @endfor
                </div>
                <a href="{{route('main.getShopsByCategory', $shop->category_id ?? -1)}}"
                   class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100">{{$category ?? "No category"}}</a>
            </div>
            <div class="group relative">
                <p class="text-sm leading-6">{{$shop->description}}</p>
            </div>
        </div>

        <div class="col-span-4 w-1/2 lg:w-3/4 lg:mx-auto">
            <div class="flex flex-col gap-3">
                <h3 class="font-bold text-2xl border-b pb-2">Customer Reviews</h3>

                <div class="flex gap-2 items-center">
                    <div class="">
                        @for($i = 1; $i <= 5; $i++)
                            @if ($i <= $shop->rating)
                                <i class="text-sm active fa-solid fa-star"></i>
                            @else
                                <i class="text-sm fa-regular fa-star"></i>
                            @endif
                        @endfor
                    </div>
                    <p class="text-sm">Based on {{$reviewsCount}} reviews</p>
                </div>

                <div class="flex flex-col gap-3 border-b pb-2">
                    @for($i = 5; $i >0; $i--)
                        <div class="flex items-center gap-2">
                            <p style="font-size: 0.75rem">{{$i}}</p>
                            <i class="text-sm active fa-solid fa-star"></i>
                            <div
                                style="background-image: linear-gradient(to right, gold 0%, gold {{$shop->percentage[$i] ?? 0}}%, gray {{$shop->percentage[$i] ?? 0}}%, gray 100%)"
                                class="w-full rounded-full h-3"></div>
                            <p class="w-2 text-xs">{{$shop->percentage[$i] ?? 0}}%</p>
                        </div>
                    @endfor
                </div>
                {{--                    <span><i class = "fas fa-phone"></i>&nbsp @lang($shop->phone)</span>--}}
                {{--                    <span><i class = "fas fa-envelope"></i>&nbsp; @lang($shop->email)</span>--}}
                <div class="text-3xl flex gap-3">
                    <a href = "{{$shop->facebook}}"><i class = "fab fa-facebook"></i></a>
                    <a href = "{{$shop->instagram}}"><i class = "fab fa-instagram"></i></a>
                    <a href = "{{$shop->telegram}}"><i class = "fab fa-telegram"></i></a>
                    <a href = "{{$shop->vk}}"><i class = "fab fa-vk"></i></a>
                </div>
            </div>
        </div>
    </div>

    @if(!\Illuminate\Support\Facades\Auth::check())
        <h1 class="text-3xl font-bold leading-tight border-b pb-2 tracking-tight text-gray-900 mt-10">
            To leave a review <a class="text-indigo-600" href="{{route('auth.index')}}">log in</a>!
        </h1>
    @else
        <h1 class="text-3xl font-bold leading-tight tracking-tight border-b pb-2 text-gray-900 mt-10">
            Leave a review
        </h1>
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
                    <input name="title" id="title" placeholder="Title..."
                           class="text-base w-full border-none outline-none pb-2 px-4" value="{{old('title')}}">
                </div>

                <div>
                    <label for="text"></label>
                    <textarea name='description' id="text" placeholder="Write a description"
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
                        Publish
                    </button>
                </div>
            </form>
        </div>
    @endif

    <h1 class="text-3xl font-bold leading-tight border-b pb-2 tracking-tight text-gray-900 mt-10">
        {{$reviews->isEmpty() ? "No reviews found" : "Last reviews"}}
    </h1>

    <div class="flex flex-col gap-4 mt-4 lg:grid lg:grid-cols-2 lg:gap-x-8 lg:gap-y-8">
        @foreach($reviews as $review)
            <div class="flex gap-2 bg-white rounded-xl px-2 py-2">
                <div>
                    <img src="{{asset('images/img.png')}}" alt="user" class="max-w-10 rounded-full bg-gray-50">
                </div>
                <div class="flex flex-col gap-2">
                    <div class="leading-6">
                        <p class="font-bold text-xl text-gray-700">{{$review->author}}</p>
                        <time
                            class="text-gray-500 text-sm">{{ \Carbon\Carbon::parse($review->created_at)->format('G:i M j, Y') }}</time>
                    </div>

                    <div>
                        @for($i = 1; $i <= 5; $i++)
                            @if ($i <= $review->rating)
                                <i class="active fa-solid fa-star"></i>
                            @else
                                <i class="fa-regular fa-star"></i>
                            @endif
                        @endfor
                    </div>

                    <div>
                        <h3 class="text-lg font-bold leading-6 text-gray-900">{{$review->title}}</h3>
                        <p class="text-sm leading-6 text-gray-600">{{$review->description}}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="mt-2 pb-10">{{ $reviews->onEachSide(6)->links('components.pagination') }}</div>
</section>

<!--FOOTER-->
@include('components.footer')

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
</body>
</html>
