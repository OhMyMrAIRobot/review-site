<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width = device - width, initial-scale = 1">
    <title>edit review</title>

    <!--css-->
    @vite([
    'resources/css/style.css',
    'resources/css/header.css',
    'resources/css/footer.css',
    'resources/css/admin.css',
    'resources/css/adminEditReview.css',
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

        <form method="POST" action="{{route('reviews.update', $review->id)}}" class = "admin_container_header">
            @csrf
            @method('PUT')
            <h2>Редактировать отзыв</h2>

            <div class = "admin_edit_review_container">
                <h5>Заголовок</h5>
                <input name = "title" value = "@lang($review->title)" class = "input_review">

                <h5>Текст</h5>
                <textarea name = "description" class = "review_text_input">@lang($review->description)</textarea>

                <h5>Автор</h5>
                <input disabled value = "@lang($review->author)" class = "input_review">
                <input type="hidden" name = "user_id" value={{$review->user_id}}>
                <input type="hidden" name = "shop_id" value={{$review->shop_id}}>
                <input type="hidden" name = "rating" value={{$review->rating}}>

                <h5>Рейтинг</h5>
                <div class = "review_rating">
                    @for ($i = 1; $i <= 5; $i++)
                        @if ($i <= $review->rating)
                            <input style="display: none" type="radio" id="rating{{ $i }}" name="rating" value="{{ $i }}">
                            <label for="rating{{ $i }}"><i onclick="Rating(this)" class="star active fa-solid fa-star"></i></label>
                        @else
                            <input style="display: none" type="radio" id="rating{{ $i }}" name="rating" value="{{ $i }}">
                            <label for="rating{{ $i }}"><i onclick="Rating(this)" class="star fa-regular fa-star"></i></label>
                        @endif
                    @endfor
                </div>
            </div>

            <button type="SUBMIT" class = "admin_btn_edit">Сохранить</button>
        </form>
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

