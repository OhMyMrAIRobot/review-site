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
    ])

    <link rel = "stylesheet" href = "{{asset('cssTest/test.css')}}">

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

        <form method="POST" action="{{route('reviews.update', $user->id)}}" class = "admin_container_header">
            @csrf
            @method('PUT')
            <h2>Редактировать отзыв</h2>

            <div class = "admin_edit_user_container">
                <h5>Автор</h5>
                <input name = "username" value = "@lang($user->username)" class = "input_category">

                <h5>Email</h5>
                <input name = "email" value = "@lang($user->email)" class = "input_category">

                <h5>Пароль</h5>
                <input name = "password" class = "input_category" type="password">

                <div class = "admin_checkbox">
                    <input name="admin" type="checkbox" {{ $user->admin ? 'checked' : '' }}>
                    Админ
                </div>
            </div>

            <button type="SUBMIT" class = "admin_btn_edit">Сохранить</button>
        </form>
    </div>
</main>


<!--FOOTER-->
@include('components.footer')

</body>
</html>

