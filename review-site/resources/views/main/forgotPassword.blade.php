<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width = device - width, initial-scale = 1">
    <title>@lang('main/forgot.page')</title>

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

<!--HEADER-->
@include('components.header')

<section class="bg-gray-50">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto  lg:py-20">

        <div class="w-full max-w-md">
            @if (session('status_ok'))
                @component('components.success', ['status' => session('status_ok')])@endcomponent
            @elseif (session('status_err'))
                @component('components.error', ['status' => session('status_err')])@endcomponent
            @elseif ($errors->any())
                @foreach ($errors->all() as $error)
                    @component('components.error', ['status' => $error])@endcomponent
                @endforeach
            @endif
        </div>


        <div class="w-full bg-white rounded-lg shadow dark:border max-w-md lg:mt-0  lg:p-0">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-2xl font-bold leading-tight tracking-tight text-gray-900">
                    @lang('main/forgot.title')
                </h1>
                <form class="space-y-4 md:space-y-6" method='POST' action="{{route('password.send')}}">
                    @csrf
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">@lang('main/forgot.emailLabel')</label>
                        <input type="text" name = "email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                               placeholder="Example@mail.com" value="{{old('email')}}">
                    </div>

                    <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-bold leading-6 text-white shadow-sm hover:bg-indigo-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 transition-all duration-300"
                    >@lang('main/forgot.send')</button>

                    <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                        @lang('main/forgot.noAcc')
                    </p>

                </form>
            </div>
        </div>
    </div>
</section>

<!--FOOTER-->
@include('components.footer')


</body>
</html>
