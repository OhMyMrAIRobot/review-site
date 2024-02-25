<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width = device - width, initial-scale = 1">
    <title>admin Reviews</title>

    <!--css-->
    @vite([
        'resources/css/style.css',
        'resources/css/header.css',
        'resources/css/footer.css',
        'resources/css/admin.css',
        'resources/css/adminReviews.css',
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

<main class = "admin-container">
    @include('components.sidebarAdmin')

    <div class = "admin-right_cont">
        <div class = "admin_btn_container">
        </div>

        <div class = "admin_container_header">
            <h2>Управление отзывами</h2>
            <div class = "admin_table_header">
                <div class="admin_table_id">ID</div>
                <div class = "admin_table_text bold">Текст</div>
                <div class = "admin_table_author bold">Автор</div>
                <div class = "admin_table_control bold">Управление</div>
            </div>
        </div>

        @php for ($i = 1; $i <= 5; $i++): @endphp
        {{--Отзыв 1--}}
        <div class = "admin_table_header">
            <div class="admin_table_id"><?=$i?></div>
            <div class = "admin_table_text">
                <?php echo mb_substr('Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrum ', 0, 50, 'UTF-8') . '...' ?>
            </div>
            <div class = "admin_table_author">Автор <?=$i?></div>
            <div class = "admin_table_control">
                <a class = "admin_table_edit" href = "#">edit</a>
                <a class = "admin_table_delete" href = "#">delete</a>
            </div>
        </div>
        {{--Отзыв 1--}}
        @php endfor; @endphp

    </div>
</main>


<!--FOOTER-->
@include('components.footer')

</body>
</html>
