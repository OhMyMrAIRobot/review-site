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
        'resources/css/pagination.css',
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
@include('components.adminHeader')

<main class = "admin-container">
    @include('components.sidebarAdmin')

    <div class = "admin-right_cont">
        <div class = "admin_btn_container">
        </div>

        <div class = "admin_container_header">
            <h2>Управление отзывами</h2>
            <div class = "admin_table_header">
                <div class="admin_table_id">ID</div>
                <div class = "admin_table_text bold">Заголовок</div>
                <div class = "admin_table_time bold">Опубликован</div>
                <div class = "admin_table_author bold">Автор</div>
                <div class = "admin_table_control bold">Управление</div>
            </div>
        </div>

        @foreach($reviews as $key => $review)
        {{--Отзыв--}}
        <div class = "admin_table_header">
            <div class="admin_table_id">@lang($key + 1)</div>
            <div class = "admin_table_text">
                @lang(strlen($review->title) > 50 ?
                    mb_substr($review->title, 0, 50, 'UTF-8') . '...'
                    :
                    $review->title
                )
            </div>
            <div class = "admin_table_time">{{ \Carbon\Carbon::parse($review->created_at)->format('G:i d-m-Y') }}</div>
            <div class = "admin_table_author">@lang($review->author)</div>
            <form method="POST" action="{{route('reviews.destroy', $review->id)}}" class = "admin_table_control">
                @csrf
                @method('DELETE')
                <a class = "admin_table_edit" href = "{{route('reviews.edit', $review->id)}}">edit</a>
                <button class = "admin_table_delete" type="SUBMIT">delete</button>
            </form>
        </div>
        {{--Отзыв--}}
        @endforeach

        <div class = "pagination_main" style="margin-top: 30px">
            {{ $reviews->onEachSide(6)->links('components.pagination') }}
        </div>
    </div>
</main>


<!--FOOTER-->
@include('components.footer')

</body>
</html>
