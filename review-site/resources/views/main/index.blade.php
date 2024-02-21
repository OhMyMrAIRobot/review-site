<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width = device - width, initial-scale = 1">
    <title>some title</title>

    <!--css-->
    @vite([
        'resources/css/style.css',
        'resources/css/header.css',
        'resources/css/main.css',
        'resources/css/shop.css',
        'resources/css/sidebar.css',
        'resources/css/footer.css',
        'resources/css/lastReviews.css',
    ])

    <!--boostrap-->
<!--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">-->

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

<!--MAIN-->
<main>
    <div class = "last_reviews_container">
        <h3>Последние отзывы</h3>

        <!--ОТЗЫВ 1-->
        <div class = "review_main">
            <img class = "img_review" alt="img_review" src="{{asset('/images/img.png')}}">
            <div class = "review_body">
                <div class = "review_main_header">
                    <a href="shopPage.php">Магазин 1</a>
                    <div class = "review_main_rating">
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                    </div>
                    <i class="review_icon fa-regular fa-user"></i>
                    <p class = "review_author">username</p>
                </div>
                <p class = "review_main_desc">Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam. ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam</p>
            </div>

        </div>
        <!--ОТЗЫВ 1-->


        <!--ОТЗЫВ 1-->
        <div class = "review_main">
            <img class = "img_review" alt="img_review" src="{{asset('/images/img.png')}}">
            <div class = "review_body">
                <div class = "review_main_header">
                    <a href="shopPage.php">Магазин 1</a>
                    <div class = "review_main_rating">
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                    </div>
                    <i class="review_icon fa-regular fa-user"></i>
                    <p class = "review_author">username</p>
                </div>
                <p class = "review_main_desc">Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam. ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam</p>
            </div>

        </div>
        <!--ОТЗЫВ 1-->

        <!--ОТЗЫВ 1-->
        <div class = "review_main">
            <img class = "img_review" alt="img_review" src="{{asset('/images/img.png')}}">
            <div class = "review_body">
                <div class = "review_main_header">
                    <a href="shopPage.php">Магазин 1</a>
                    <div class = "review_main_rating">
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                    </div>
                    <i class="review_icon fa-regular fa-user"></i>
                    <p class = "review_author">username</p>
                </div>
                <p class = "review_main_desc">Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam. ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam</p>
            </div>

        </div>
        <!--ОТЗЫВ 1-->

        <h3>Магазины</h3>
    </div>


    <div class = "main">
        <!--MAIN CONTENT-->
        <div class = "shop_container">

            <!--МАГАЗИН1-->
            <div class = "shop">
                <img class = "shop_img" src="{{asset('/images/img.png')}}" alt="shop_image">

                <div class = "shop_text">
                    <h3 class = "shop_title">
                        <a href="shopPage.php">Название 1</a>
                    </h3>

                    <p class="shop_description">С другой стороны постоянное информационно-пропагандистское обеспечение нашей деятельности обеспечивает широкому кругу (специалистов) участие в формировании позиций, занимаемых участниками в отношении поставленных задач. . Значимость этих проблем настолько очевидна, что дальнейшее развитие различных форм деятельности обеспечивает</p>
                    <p class="shop_tags">Электроника</p>

                    <div class = "shop_rating">
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                    </div>

                    <button class="add_review_btn">Добавить отзыв</button>
                </div>
            </div>
            <!--МАГАЗИН1-->

            <!--МАГАЗИН1-->
            <div class = "shop">
                <img class = "shop_img" src="{{asset('/images/img.png')}}" alt="shop_image">

                <div class = "shop_text">
                    <h3 class = "shop_title">
                        <a href="shopPage.php">Название 1</a>
                    </h3>

                    <p class="shop_description">С другой стороны постоянное информационно-пропагандистское обеспечение нашей деятельности обеспечивает широкому кругу (специалистов) участие в формировании позиций, занимаемых участниками в отношении поставленных задач. . Значимость этих проблем настолько очевидна, что дальнейшее развитие различных форм деятельности обеспечивает</p>
                    <p class="shop_tags">Электроника</p>

                    <div class = "shop_rating">
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                    </div>

                    <button class="add_review_btn">Добавить отзыв</button>
                </div>
            </div>
            <!--МАГАЗИН1-->

        </div>

        <!--SIDEBAR-->
        <div class = "sidebar">
            <div class = "search_container">
                <h3 class = "search_title">Поиск</h3>
                <input type = "text" name = "search_name" class = "text-input" placeholder="Поиск...">
            </div>

            <div class = "categories_container">
                <h3 class = "categories_title">Категории</h3>
                <ul>
                    <li><a class = "category" href="#">Категория 1</a></li>
                    <li><a class = "category" href="#">Категория 2</a></li>
                    <li><a class = "category" href="#">Категория 3</a></li>
                    <li><a class = "category" href="#">Категория 4</a></li>
                    <li><a class = "category" href="#">Категория 5</a></li>
                    <li><a class = "category" href="#">Категория 6</a></li>
                </ul>
            </div>
        </div>
    </div>

</main>

@include('components.footer')

</body>
</html>
