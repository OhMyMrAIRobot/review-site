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
        <h2 class = "single_shop_header">Название магазина</h2>
        <div class = "single_shop">
            <img class = "single_shop_img" src = "{{asset('/images/img.png')}}">
            <div class = "single_shop_info">
                <div class = "single_shop_rating">
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                </div>
                <p class = "single_shop_category">Категория</p>
                <p class = "single_shop_description">Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam,</p>

                <div class = "single_shop_contacts">
                    <span><i class = "fas fa-phone"></i>&nbsp; 123-456-789</span>
                    <span><i class = "fas fa-envelope"></i>&nbsp; my_title@gmail.com</span>
                </div>

                <div class = "single_shop_social">
                    <a class = "shop_social" href = "#"><i class = "fab fa-facebook"></i></a>
                    <a class = "shop_social" href = "#"><i class = "fab fa-instagram"></i></a>
                    <a class = "shop_social" href = "#"><i class = "fab fa-telegram"></i></a>
                    <a class = "shop_social" href = "#"><i class = "fab fa-vk"></i></a>
                </div>
            </div>
        </div>
    </div>

    <div class = "add_review_container">
        @if(session()->has('user'))
            <form method="post">
                <h5 class = "review_add_header">Заголовок отзыва</h5>
                <input class = "add_review_input" type = "text" placeholder = "Заголовок отзыва...">
                <h5 style = "margin-top: 15px" class = "review_add_header">Ваш отзыв</h5>
                <textarea class = "add_review_text" placeholder="Отзыв..."></textarea>
                <div class = "shop_rating">
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                </div>

                <button type = "submit" class = "add_review">Опубликовать</button>
            </form>
        @else
            <h3 class = "req_auth_text">Для того, чтобы оставить отзыв требуется <a href = "{{route('auth')}}">авторизация</a>!</h3>
        @endif


    </div>

    <div class = "reviews_container">
        <h2 style="color: #686868">Отзывы</h2>

        <!--ОТЗЫВ 1-->
        <div class = "review">
            <div class = "review_header">
                <i class="review_icon fa-regular fa-user"></i>
                <p class = "review_author">username</p>
                <div class = "review_rating">
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                </div>
                <p class = "review_time">12:03 12.07.2022</p>
            </div>

            <h4 class = "review_title">Lorem ipsum dolor sit amet</h4>
            <p class = "review_text">Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam. ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam</p>
        </div>
        <!--ОТЗЫВ 1-->

        <!--ОТЗЫВ 2-->
        <div class = "review">
            <div class = "review_header">
                <i class="review_icon fa-regular fa-user"></i>
                <p class = "review_author">username</p>
                <div class = "review_rating">
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                </div>
                <p class = "review_time">12:03 12.07.2022</p>
            </div>

            <h4 class = "review_title">Lorem ipsum dolor sit amet</h4>
            <p class = "review_text">Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam. ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam</p>
        </div>
        <!--ОТЗЫВ 2-->

    </div>
</main>


<!--FOOTER-->
@include('components.footer')

</body>
</html>
