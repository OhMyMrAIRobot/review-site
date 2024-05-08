@extends('layouts.authBase')

@section('page.title')
    @lang('main/register.page')
@endsection

@section('form')
    <h1 class="text-2xl font-bold leading-tight tracking-tight text-gray-900">
        @lang('main/register.title')
    </h1>
    <form class="space-y-4 md:space-y-6" method='POST' action="{{route('register.store')}}">
        @csrf
        <div>
            <label for="username" class="block mb-2 text-sm font-medium text-gray-900">@lang('main/register.usernameLabel')</label>
            <input type="text" name = "username" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                   placeholder="@lang('main/register.username')" value="{{old('username')}}">
        </div>

        <div>
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">@lang('main/register.emailLabel')</label>
            <input type="text" name = "email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Example@mail.com" value="{{old('email')}}">
        </div>

        <div>
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900">@lang('main/register.password')</label>
            <input type="password" name = "password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
        </div>

        <div>
            <label for="password_c" class="block mb-2 text-sm font-medium text-gray-900">@lang('main/register.confirm')</label>
            <input type="password" name = "password_confirmation" id="password_c" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
        </div>

        <div class="flex items-start">
            <div class="flex items-center h-5">
                <input name="remember" id="remember" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800">
            </div>
            <div class="ml-3 text-sm">
                <label for="remember" class="font-light text-gray-500 ">@lang('main/register.remember')</label>
            </div>
        </div>

        <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-bold leading-6 text-white shadow-sm hover:bg-indigo-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 transition-all duration-300"
        >@lang('main/register.title')</button>

        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
            @lang('main/register.haveAcc')
        </p>

    </form>
@endsection

