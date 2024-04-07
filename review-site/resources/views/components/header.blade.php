<header>
    <nav class = "border-gray-200 px-4 lg:px-6 py-2.5 bg-gray-800">
        <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
            <a href = "{{route('main.index')}}" class="flex items-center">
                <span class="text-white self-center text-xl font-bold whitespace-nowrap">Reviews</span>
            </a>
            <div class="flex items-center lg:order-2">
                @if(!\Illuminate\Support\Facades\Auth::check())
                    <a href = "{{route("auth.index")}}" class="text-white hover:bg-gray-700 text-base rounded-lg px-4 py-2 focus:ring-4 mr-2">Log In</a>
                    <a href = "{{route('register.index')}}" class="text-white text-base focus:ring-primary-300 bg-primary-700 hover:bg-primary-800 focus:ring-4 rounded-lg py-2 px-4 mr-2">Sign Up</a>
                @else
                    <a class="text-white mr-2 text-xl cursor-pointer px-4 py-2 focus:ring-4"
                    ><i class = "fa fa-user mr-1"></i>@lang(\Illuminate\Support\Facades\Auth::user()->getUsername())
                    </a>
                        <form class="text-gray-300 hover:text-white mr-2 rounded-lg py-1 px-4 border border-gray-400 cursor-pointer" action="{{route('auth.logout')}}" method='POST'>
                            @csrf
                            <button type='submit'>Logout</button>
                        </form>
                @endif
            </div>

            <div class = "justify-between items-center w-full flex lg:w-auto lg:order-1">
                <ul class="flex flex-col mt-4 text-xl lg:flex-row lg:space-x-8 lg:mt-0">
                    <li>
                        <a href = "{{route('main.index')}}" class="block py-2 rounded hover:text-white @if(request()->routeIs('main.index')) text-white @else text-gray-500 @endif"
                        >MainPage</a>
                    </li>
                    <li>
                        <a href = "{{route('main.index')}}" class="block text-gray-500 py-2 rounded hover:text-white">About</a>
                    </li>
                    @if(\Illuminate\Support\Facades\Auth::check())
                        @if(\Illuminate\Support\Facades\Auth::user()->isAdmin())
                            <li>
                                <a href = "{{route('shops.index')}}" class="block py-2 rounded hover:text-white @if(Str::startsWith(request()->url(), route('admin.index'))) text-white @else text-gray-500 @endif"
                                >Admin panel</a>
                            </li>
                        @endif
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>
