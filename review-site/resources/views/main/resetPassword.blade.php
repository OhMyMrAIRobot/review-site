<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width = device - width, initial-scale = 1">
    <title>Auth</title>

    <!--css-->
    @vite([
        'resources/css/style.css',
        'resources/css/header.css',
        'resources/css/footer.css',
        'resources/css/register.css',
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

<!--MAIN-->
<form class = "reg_container" method='POST' action="{{route('password.update')}}">
    @csrf
    <input name="token" type="hidden" value="{{$request->token}}">
    <h2 class = "reg_header">Изменение пароля</h2>
    <label class = "reg_label">Ваш email</label>
    <input readonly id = "emailReg" name = "email" class = "reg_input" placeholder="Введите email..." value="{{$request->email}}">

    <label class = "reg_label">Новый пароль</label>
    <label for="pasReg1" class = "error-label">{{$errors->first('password')}}</label>
    <input id = "pasReg1" name = "password" type="password" class = "reg_input" placeholder="Введите пароль...">

    <label class = "reg_label">Повторите пароль</label>
    <label for="pasReg2" class = "error-label">{{$errors->first('password')}}</label>
    <input id = "pasReg2" name = "password_confirmation" type="password" class = "reg_input" placeholder="Повторите пароль...">

    <div class = "reg_btns_container">
        <button type="SUBMIT" class = "reg_btn">Изменить</button>
    </div>

</form>

<!--FOOTER-->
@include('components.footer')

</body>
</html>
