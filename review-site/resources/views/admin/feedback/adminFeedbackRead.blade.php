<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width = device - width, initial-scale = 1">
    <title>admin categories</title>

    <!--css-->
    @vite([
    'resources/css/style.css',
    'resources/css/header.css',
    'resources/css/footer.css',
    'resources/css/admin.css',
    'resources/css/adminFeedback.css',
    'resources/css/adminReadFeedback.css',
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

        <div class = "admin_container_header">
            <h2>Сообщение</h2>

            <h5>Почта</h5>
            <input disabled class = "input_email" value="{{$feedback->email}}">

            <h5>Текст</h5>
            <textarea class="feedback_input" disabled>{{$feedback->description}}</textarea>
            <a href = "{{route('feedback.index')}}" class = "admin_btn_edit">Закрыть</a>
        </div>
    </div>
</main>

<!--FOOTER-->
@include('components.footer')

</body>
</html>
