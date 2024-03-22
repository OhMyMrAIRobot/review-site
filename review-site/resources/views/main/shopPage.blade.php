<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width = device - width, initial-scale = 1">
    <title>shop page</title>

    <!--css-->
    @vite([
        'resources/css/style.css',
        'resources/css/header.css',
        'resources/css/shopPage.css',
        'resources/css/footer.css',
        'resources/css/pagination.css'
    ])

    <!--icons-->
    <script src="https://kit.fontawesome.com/0cca381f7a.js" crossorigin="anonymous"></script>

    <!--font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cardo&family=Comfortaa:wght@300..700&family=Lato:wght@300;900&display=swap" rel="stylesheet">

</head>
<body>

<!--HEADER-->
@include('components.header')

<main>
    <div class = "single_shop_container">
        <h2 class = "single_shop_header">@lang($shop->title)</h2>
        <div class = "single_shop">
            <img class = "single_shop_img" src = "{{asset('/images/'. $shop->img)}}">
            <div class = "single_shop_info">
                <div class = "single_shop_rating">
                    @for($i = 1; $i <= 5; $i++)
                        @if ($i <= $shop->rating)
                            <i class="active fa-solid fa-star"></i>
                        @else
                            <i class="fa-regular fa-star"></i>
                        @endif
                    @endfor
                </div>
                <p class = "single_shop_category">@lang($category)</p>
                <p class = "single_shop_description">@lang($shop->description)</p>

                <div class = "single_shop_contacts">
                    <span><i class = "fas fa-phone"></i>&nbsp @lang($shop->phone)</span>
                    <span><i class = "fas fa-envelope"></i>&nbsp; @lang($shop->email)</span>
                </div>

                <div class = "single_shop_social">
                    <a class = "shop_social" href = "@lang($shop->facebook)"><i class = "fab fa-facebook"></i></a>
                    <a class = "shop_social" href = "@lang($shop->instagram)"><i class = "fab fa-instagram"></i></a>
                    <a class = "shop_social" href = "@lang($shop->telegram)"><i class = "fab fa-telegram"></i></a>
                    <a class = "shop_social" href = "@lang($shop->vk)"><i class = "fab fa-vk"></i></a>
                </div>
            </div>
        </div>
    </div>

    <div class = "add_review_container">
        @if(session()->has('user'))
            @foreach($errors as $error)
                @lang($error)
            @endforeach
            <form method="POST" action="{{route('reviews.store')}}">
                @csrf
                <h5 class = "review_add_header">Заголовок отзыва</h5>
                <input name = 'title' class = "add_review_input" type = "text" placeholder = "Заголовок отзыва...">
                <h5 style = "margin-top: 15px" class = "review_add_header">Ваш отзыв</h5>
                <textarea name = 'description' class = "add_review_text" placeholder="Отзыв..."></textarea>
                <input name = 'rating' value="-1" type="hidden">
                <input name = 'user_id' value="@lang(intval(session('user')))" type="hidden">
                <input name = 'shop_id' value="@lang($shop->id)" type="hidden">
                <div class = "shop_rating">
                    @for ($i = 1; $i <= 5; $i++)
                        <input style="display: none" type="radio" id="rating{{ $i }}" name="rating" value="{{ $i }}">
                        <label for="rating{{ $i }}"><i onclick="Rating(this)" class="star fa-regular fa-star"></i></label>
                    @endfor
                </div>

                <button type = "SUBMIT" class = "add_review">Опубликовать</button>
            </form>

        @else
            <h3 class = "req_auth_text">Для того, чтобы оставить отзыв требуется <a href = "{{route('auth.index')}}">авторизация</a>!</h3>
        @endif
    </div>

    <div class = "reviews_container">
        @if($reviews->isEmpty())
            <h2 style="color: #686868; text-align: center">Отзывы не найдены!</h2>
        @else
            <h2 style="color: #686868">Отзывы</h2>
        @endif

        @foreach($reviews as $review)
        <!--ОТЗЫВ-->
            <div class = "review">
                <div class = "review_header">
                    <i class="review_icon fa-regular fa-user"></i>
                    <p class = "review_author">@lang($review->author)</p>
                    <div class = "review_rating">

                        @for($i = 1; $i <= 5; $i++)
                            @if ($i <= $review->rating)
                                <i class="active fa-solid fa-star"></i>
                            @else
                                <i class="fa-regular fa-star"></i>
                            @endif
                        @endfor
                    </div>
                    <p class = "review_time">{{ \Carbon\Carbon::parse($review->created_at)->format('G:i d-m-Y') }}</p>
                </div>

                <h4 class = "review_title">@lang($review->title)</h4>
                <p class = "review_text">@lang($review->description)</p>
            </div>
        <!--ОТЗЫВ-->
        @endforeach

        @if(!$reviews->isEmpty())
            <div class = "pagination_main" style="margin-top: 30px">
                {{ $reviews->onEachSide(5)->links('components.pagination') }}
            </div>
        @endif
    </div>
</main>

<!--FOOTER-->
@include('components.footer')

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
</body>
</html>
