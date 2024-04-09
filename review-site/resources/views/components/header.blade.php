<header>
    <nav class = "border-gray-200 px-4 lg:px-6 py-2.5 bg-gray-800">
        <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
            <a href = "{{route('main.index')}}" class="flex items-center">
                <span class="text-white self-center text-xl font-bold whitespace-nowrap">@lang('header.title') {{session('lang')}}</span>
            </a>
            <div class="flex items-center lg:order-2">
                @if(!\Illuminate\Support\Facades\Auth::check())
                    <a href = "{{route("auth.index")}}" class="text-white hover:bg-gray-700 text-base rounded-lg px-4 py-2 focus:ring-4 mr-2">@lang('header.logIn')</a>
                    <a href = "{{route('register.index')}}" class="text-white text-base focus:ring-primary-300 bg-primary-700 hover:bg-primary-800 focus:ring-4 rounded-lg py-2 px-4 mr-2">@lang('header.signUp')</a>
                @else
                    <a class="text-white mr-2 text-xl cursor-pointer px-4 py-2 focus:ring-4"
                    ><i class = "fa fa-user mr-1"></i>{{(\Illuminate\Support\Facades\Auth::user()->getUsername())}}
                    </a>
                        <form class="text-gray-300 hover:text-white mr-2 rounded-lg py-1 px-4 border border-gray-400 cursor-pointer" action="{{route('auth.logout')}}" method='POST'>
                            @csrf
                            <button type='submit'>@lang('header.logOut')</button>
                        </form>
                @endif
            </div>

            <div class = "justify-between items-center w-full flex lg:w-auto lg:order-1">
                <ul class="flex flex-col mt-4 text-xl lg:flex-row lg:space-x-8 lg:mt-0">
                    <li>
                        <a href = "{{route('main.index')}}" class="block py-2 rounded hover:text-white @if(request()->routeIs('main.index')) text-white @else text-gray-500 @endif"
                        >@lang('header.mainPage')</a>
                    </li>
                    <li>
                        <a href = "{{route('main.index')}}" class="block text-gray-500 py-2 rounded hover:text-white"
                        >@lang('header.about')</a>
                    </li>
                    @if(\Illuminate\Support\Facades\Auth::check())
                        @if(\Illuminate\Support\Facades\Auth::user()->isAdmin())
                            <li>
                                <a href = "{{route('shops.index')}}" class="block py-2 rounded hover:text-white @if(Str::startsWith(request()->url(), route('admin.index'))) text-white @else text-gray-500 @endif"
                                >@lang('header.adminPanel')</a>
                            </li>
                        @endif
                    @endif
                    <li>
                        <a href = "{{route('changeLang', session('lang') === 'en' ? 'ru' : 'en')}}"
                           class="block text-gray-500 py-2 rounded hover:text-white">Lng</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
