<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width = device - width, initial-scale = 1">
    <title>@yield('page.title')</title>

    <!--css-->
    @vite([
        'resources/css/style.css',
    ])

    <!--icons-->
    <script src="https://kit.fontawesome.com/0cca381f7a.js" crossorigin="anonymous"></script>

    <!--font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cardo&family=Comfortaa:wght@300..700&family=Lato:wght@300;900&display=swap" rel="stylesheet">

</head>
<body>

@include('components.header')

@yield('lastReviews')

@yield('content')

<div class="bg-white pt-8 lg:py-10">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-2xl lg:mx-0">
            <h3 class="text-3xl font-bold">@lang('main/index.lastReviews')</h3>
        </div>

    </div>
</div>

<div class="bg-white lg:py-10">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        @yield('subtitle')
    </div>
</div>

@include('components.footer')

</body>
</html>
