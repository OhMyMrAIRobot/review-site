<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width = device - width, initial-scale = 1">
    <title>some title</title>

    <!--css-->
    <link rel = "stylesheet" href = "./styles/style.css">
    <link rel = "stylesheet" href = "styles/header.css">
    <link rel = "stylesheet" href = "./styles/shopPage.css">
    <link rel = "stylesheet" href = "./styles/footer.css">

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
<?php require "./components/header.php"?>

<main>
    <div class = "single_shop_container">
        <h2 class = "single_shop_header">Название магазина</h2>
        <div class = "single_shop">
            <img class = "single_shop_img" src = "./images/img.png">
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

        <button class = "add_review">Опубликовать</button>
    </div>

    <div class = "reviews_container">
        <h2 class = "">Отзывы</h2>

        <div class = "review">

        </div>

    </div>
</main>


<!--FOOTER-->
<?php require "./components/footer.php"?>

</body>
</html>