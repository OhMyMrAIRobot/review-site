@extends('layouts.authBase')

@section('page.title')
    @lang('main/auth.page')
@endsection

@section('form')
    <h1 class="text-2xl font-bold leading-tight tracking-tight text-gray-900">
        @lang('main/auth.title')
    </h1>
    <form class="space-y-4 md:space-y-6" method='POST' action="{{route('auth.login')}}">
        @csrf
        <div>
            <label for="username" class="block mb-2 text-sm font-medium text-gray-900">@lang('main/auth.usernameLabel')</label>
            <input type="text" name = "username" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                   placeholder="@lang('main/auth.username')" value="{{old('username')}}">
        </div>

        <div>
            <label for="password" class="mb-2 text-sm font-medium text-gray-900 flex justify-between">
                <span>@lang('main/auth.password')</span>
                <a href="{{route('password.index')}}" class="text-indigo-600 hover:underline">@lang('main/auth.forgot')</a>
            </label>
            <input type="password" name = "password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
        </div>

        <div class="flex items-start">
            <div class="flex items-center h-5">
                <input name="remember" id="remember" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800">
            </div>
            <div class="ml-3 text-sm">
                <label for="remember" class="font-light text-gray-500 ">@lang('main/auth.remember')</label>
            </div>
        </div>

        <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-bold leading-6 text-white shadow-sm hover:bg-indigo-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 transition-all duration-300"
        >@lang('main/auth.login')</button>

        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
            @lang('main/auth.noAcc')
        </p>

    </form>
@endsection


