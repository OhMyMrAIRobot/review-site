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
                        <form class="text-gray-300 hover:text-white mr-4 rounded-lg py-1 px-4 border border-gray-400 cursor-pointer" action="{{route('auth.logout')}}" method='POST'>
                            @csrf
                            <button type='submit'>@lang('header.logOut')</button>
                        </form>
                @endif
                <div class="langMain">
                    @switch(session('lang'))
                        @case('en')
                            <div class="flex items-center cursor-pointer border-l pl-4">
                                <svg class="w-5 h-5 rounded-full me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 3900 3900"><path fill="#b22234" d="M0 0h7410v3900H0z"/><path d="M0 450h7410m0 600H0m0 600h7410m0 600H0m0 600h7410m0 600H0" stroke="#fff" stroke-width="300"/><path fill="#3c3b6e" d="M0 0h2964v2100H0z"/><g fill="#fff"><g id="d"><g id="c"><g id="e"><g id="b"><path id="a" d="M247 90l70.534 217.082-184.66-134.164h228.253L176.466 307.082z"/><use xlink:href="#a" y="420"/><use xlink:href="#a" y="840"/><use xlink:href="#a" y="1260"/></g><use xlink:href="#a" y="1680"/></g><use xlink:href="#b" x="247" y="210"/></g><use xlink:href="#c" x="494"/></g><use xlink:href="#d" x="988"/><use xlink:href="#c" x="1976"/><use xlink:href="#e" x="2470"/></g></svg>
                                <h5 class="text-gray-500 text-base hover:text-white">English <span class="text-sm">(US)</span></h5>
                            </div>
                            @break
                        @case('ru')
                            <div class="flex items-center cursor-pointer border-l pl-4">
                                <svg class="h-5 w-5 rounded-full me-3" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" preserveAspectRatio="xMidYMid meet" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M31.9 2c-13 0-24.1 8.4-28.2 20h56.6C56.1 10.4 45 2 31.9 2z" fill="#f9f9f9"></path><path d="M31.9 62c13.1 0 24.2-8.4 28.3-20H3.7c4.1 11.7 15.2 20 28.2 20z" fill="#ed4c5c"></path><path d="M3.7 22C2.6 25.1 2 28.5 2 32s.6 6.9 1.7 10h56.6c1.1-3.1 1.7-6.5 1.7-10s-.6-6.9-1.7-10H3.7" fill="#428bc1"></path></g></svg>
                                <h5 class="text-gray-500 text-base hover:text-white">Russian <span class="text-sm">(RU)</span></h5>
                            </div>
                    @endswitch

                    <div class="absolute hidden langDrop ">
                        <ul class="flex flex-col gap-y-2.5 px-5 py-4 mt-6 bg-gray-700 ml-3 rounded-xl">
                            @if(session('lang') !== 'ru' )
                                <li class="flex items-center cursor-pointer">
                                    <svg class="h-3.5 w-3.5 rounded-full me-2" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" preserveAspectRatio="xMidYMid meet" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M31.9 2c-13 0-24.1 8.4-28.2 20h56.6C56.1 10.4 45 2 31.9 2z" fill="#f9f9f9"></path><path d="M31.9 62c13.1 0 24.2-8.4 28.3-20H3.7c4.1 11.7 15.2 20 28.2 20z" fill="#ed4c5c"></path><path d="M3.7 22C2.6 25.1 2 28.5 2 32s.6 6.9 1.7 10h56.6c1.1-3.1 1.7-6.5 1.7-10s-.6-6.9-1.7-10H3.7" fill="#428bc1"></path></g></svg>
                                    <a href = "{{route('changeLang',  'ru')}}" class="font-medium text-gray-400 text-sm hover:text-white w-full">Russian <span class="text-xs">(RU)</span></a>
                                </li>
                            @endif

                            @if(session('lang') !== 'en' )
                                <li class="flex items-center cursor-pointer">
                                    <svg class="w-3.5 h-3.5 rounded-full me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 3900 3900"><path fill="#b22234" d="M0 0h7410v3900H0z"/><path d="M0 450h7410m0 600H0m0 600h7410m0 600H0m0 600h7410m0 600H0" stroke="#fff" stroke-width="300"/><path fill="#3c3b6e" d="M0 0h2964v2100H0z"/><g fill="#fff"><g id="d"><g id="c"><g id="e"><g id="b"><path id="a" d="M247 90l70.534 217.082-184.66-134.164h228.253L176.466 307.082z"/><use xlink:href="#a" y="420"/><use xlink:href="#a" y="840"/><use xlink:href="#a" y="1260"/></g><use xlink:href="#a" y="1680"/></g><use xlink:href="#b" x="247" y="210"/></g><use xlink:href="#c" x="494"/></g><use xlink:href="#d" x="988"/><use xlink:href="#c" x="1976"/><use xlink:href="#e" x="2470"/></g></svg>
                                    <a href = "{{route('changeLang',  'en')}}" class="font-medium text-gray-400 text-sm hover:text-white w-full">English <span class="text-xs">(EN)</span></a>
                                </li>
                            @endif

                            <li class="flex items-center cursor-pointer">
                                <svg class="h-3.5 w-3.5 rounded-full me-2" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" preserveAspectRatio="xMidYMid meet" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g fill="#ed4c5c"> <path d="M61.2 25C58 11.8 46.2 2 32 2h-1v23h30.2"> </path> <path d="M17 6C10 10.1 4.8 16.9 2.8 25H17V6"> </path> <path d="M2.8 39c2 8.1 7.2 14.9 14.2 19V39H2.8z"> </path> <path d="M31 62h1c14.2 0 26-9.8 29.2-23H31v23"> </path> </g> <path d="M61.2 25H31V2c-5.1.2-9.9 1.6-14 4v19H2.8c-.5 2.2-.8 4.6-.8 7s.3 4.8.8 7H17v19c4.1 2.4 8.9 3.8 14 4V39h30.2c.5-2.2.8-4.6.8-7s-.3-4.8-.8-7" fill="#ffffff"> </path> </g></svg>
                                <a href="#" class="font-medium text-gray-400 text-sm hover:text-white w-full">Deutsch <span class="text-xs">(DA)</span></a>
                            </li>

                            <li class="flex items-center cursor-pointer">
                                <svg class="h-3.5 w-3.5 rounded-full me-2" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" preserveAspectRatio="xMidYMid meet" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M1.7 32c0 13.1 8.4 24.2 20 28.3V3.7C10.1 7.8 1.7 18.9 1.7 32z" fill="#75a843"></path><path d="M61.7 32c0-13.1-8.4-24.2-20-28.3v56.6c11.7-4.1 20-15.2 20-28.3" fill="#ed4c5c"></path><path d="M21.7 60.3c3.1 1.1 6.5 1.7 10 1.7s6.9-.6 10-1.7V3.7C38.6 2.6 35.2 2 31.7 2s-6.9.6-10 1.7v56.6" fill="#ffffff"></path></g></svg>
                                <a href="#" class="font-medium text-gray-400 text-sm hover:text-white w-full">Italiano <span class="text-xs">(IT)</span></a>
                            </li>
                        </ul>
                    </div>
                </div>

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
                    <li class="flex items-center">

{{--                        <a href = "{{route('changeLang', session('lang') === 'en' ? 'ru' : 'en')}}"--}}
{{--                           class="block text-gray-500 py-2 rounded hover:text-white">Lng</a>--}}
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
