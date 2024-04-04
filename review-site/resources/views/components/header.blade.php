<header class = "header">
        <nav class = "bg-white border-gray-200 px-4 lg:px-6 py-2.5 dark:bg-gray-800">
            <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
                <a href = "{{route('main.index')}}" class="flex items-center">
{{--                    <img src="https://flowbite.com/docs/images/logo.svg" class="mr-3 h-6 sm:h-9" alt="Logo" />--}}
                    <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Reviews</span>
                </a>
                <div class="flex items-center lg:order-2">
                    @if(!\Illuminate\Support\Facades\Auth::check())
                        <a href = "{{route("auth.index")}}" class="text-white hover:bg-gray-700 text-base rounded-lg px-4 py-2 focus:ring-4 mr-2">Log In</a>
                        <a href = "{{route('register.index')}}" class="text-white text-base focus:ring-primary-300 bg-primary-700 hover:bg-primary-800 focus:ring-4 rounded-lg py-2 px-4 mr-2">Sign Up</a>
                    @else
                        <a class="text-white mr-2 text-xl cursor-pointer px-4 py-2 focus:ring-4"
                            ><i class = "fa fa-user mr-1"></i>@lang(\Illuminate\Support\Facades\Auth::user()->getUsername())
                        </a>
                        <a class = "text-gray-300 hover:text-white mr-2 rounded-lg py-1 px-4 border border-gray-400">
                            <form action="{{route('auth.logout')}}" method='POST'>
                                @csrf
                                <button type='submit'>Logout</button>
                            </form>
                        </a>
                    @endif
                </div>

                <div class = "hidden justify-between items-center w-full lg:flex lg:w-auto lg:order-1">
                    <ul class="flex flex-col mt-4 text-xl lg:flex-row lg:space-x-8 lg:mt-0">
                        <li>
                            <a href = "{{route('main.index')}}" class="block text-white py-2 rounded hover:text-white">Главная</a>
                        </li>
                        <li>
                            <a href = "{{route('main.index')}}" class="block text-gray-500 py-2 rounded hover:text-white">О нас</a>
                        </li>
                        @if(\Illuminate\Support\Facades\Auth::check())
                            @if(\Illuminate\Support\Facades\Auth::user()->isAdmin())
                                <li>
                                    <a href = "{{route('shops.index')}}" class="block text-gray-500 py-2 rounded hover:text-white">Админ панель</a>
                                </li>
                            @endif
                        @endif
                    </ul>
                </div>

            </div>

        </nav>
</header>
