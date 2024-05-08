@extends('layouts.authBase')

@section('page.title')
    @lang('main/forgot.page')
@endsection

@section('form')
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
@endsection
