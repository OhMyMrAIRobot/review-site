<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width = device - width, initial-scale = 1">
    <title>@lang('admin/users.page')</title>

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

@include('components.Header')

<section class="grid grid-cols-12">
    <div class="col-span-3">
        @include('components.sidebarAdmin')
    </div>

    <div class="col-span-9 border-l bg-gray-50 pr-1">
        <form method="get" class="relative bg-gray-100" action="{{route('users.getUsersBySearch')}}">
            <div class="absolute inset-y-0 start-0 flex items-center px-8 pointer-events-none ">
                <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
            </div>
            <input type="search" name = "search" id="default-search" class="block w-full py-4 px-14 outline-none text-sm text-gray-900 border-b border-r bg-gray-100 focus:ring-blue-500 focus:border-blue-500"
                   placeholder="@lang('admin/shops.search')..." value="{{request('search')}}" />
            <button type="submit" class="absolute end-2.5 bottom-2.5 text-white bg-indigo-600 hover:bg-indigo-700 focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-lg text-sm px-4 py-2 font-bold"
            >@lang('admin/shops.search')</button>
        </form>

        @if (session('status_ok'))
            <div class="mt-3 w-full pl-3 border-b">
                <div class="w-1/3">
                    @if (session('status_ok'))
                        @component('components.success', ['status' => session('status_ok')])@endcomponent
                    @endif
                </div>
            </div>
        @endif

        <div class="grid grid-cols-12 mt-1 text-base bg-gray-50">
            <div class="col-span-1 font-bold pl-3 pt-1 pb-1 border-b">Id</div>

            <div class="col-span-2 font-bold pl-3 pt-1 pb-1 border-b">@lang('admin/users.login')</div>

            <div class="col-span-4 font-bold pl-3 pt-1 pb-1 border-b">@lang('admin/users.email')</div>

            <div class="col-span-2 font-bold pl-3 pt-1 pb-1 border-b">@lang('admin/users.role')</div>

            <div class="col-span-3 font-bold pl-3 pt-1 pb-1 border-b">@lang('admin/users.control')</div>

            @foreach($users as $key => $user)
                <div class="col-span-1 font-bold pl-3 pt-3 pb-3 border-b border-r overflow-x-hidden">{{(request('page') ?? 1) * 10 + $key - 9}}</div>

                <div class="col-span-2 text-gray-500 pl-3 border-b pt-3 pb-3 border-r overflow-x-hidden">{{ $user->username }}</div>

                <div class="col-span-4 text-gray-500 pl-3 border-b pt-3 pb-3 border-r overflow-x-hidden">{{ $user->email }}</div>

                <div class="col-span-2 text-gray-500 pl-3 border-b pt-3 pb-3 border-r overflow-x-hidden">
                    <span class="cursor-default relative z-10 rounded-full bg-gray-100 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-200">
                        {{$user->admin ? trans('admin/users.admin') : trans('admin/users.user') }}</span>
                </div>

                <form action="{{route('users.destroy', $user->id)}}" method="POST" class = "flex gap-x-12 col-span-3 border-b pl-3 pt-3 pb-3 border-r">
                    @csrf
                    @method('DELETE')
                    <a href = "{{route('users.edit', $user->id)}}" class="block h-fit text-white rounded-full font-medium bg-green-600 px-4 py-0.5 hover:bg-green-700"
                    >@lang('admin/users.edit')</a>
                    <button type="submit" class="block h-fit text-white rounded-full font-medium bg-red-600 px-4 py-0.5 hover:bg-red-700"
                    >@lang('admin/users.delete')</button>
                </form>
            @endforeach
        </div>
        <div style="margin-top: 30px">
            {{ $users->onEachSide(10)->links('components.pagination') }}
        </div>
    </div>
</section>

<!--FOOTER-->
@include('components.footer')

</body>
</html>
