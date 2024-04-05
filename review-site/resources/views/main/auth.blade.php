<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width = device - width, initial-scale = 1">
    <title>Auth</title>

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
        <div class="w-full bg-white rounded-lg shadow dark:border lg:mt-0 max-w-md lg:p-0">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-2xl font-bold leading-tight tracking-tight text-gray-900">
                    Log in to account
                </h1>
                <form class="space-y-4 md:space-y-6" method='POST' action="{{route('auth.login')}}">
                    @csrf
                    <div>
                        <label for="username" class="block mb-2 text-sm font-medium text-gray-900">Your username</label>
                        <input type="text" name = "username" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Username..." required="" value="{{old('username')}}">
                    </div>

                    <div>
                        <label for="password" class="mb-2 text-sm font-medium text-gray-900 flex justify-between">
                            <span>Password</span>
                            <a href="{{route('password.index')}}" class="text-indigo-600 hover:underline">Forgot password?</a>
                        </label>
                        <input type="password" name = "password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required="">
                    </div>

                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input name="remember" id="remember" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800">
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="remember" class="font-light text-gray-500 ">Remember me</label>
                        </div>
                    </div>

                    <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-bold leading-6 text-white shadow-sm hover:bg-indigo-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 transition-all duration-300"
                    >Log In</button>

                    <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                        Don't have an account? <a href="{{route('register.index')}}" class="font-medium text-indigo-600 hover:underline">Register here</a>
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
