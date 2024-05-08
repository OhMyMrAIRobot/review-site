@extends('layouts.authBase')

@section('page.title')
    @lang('main/reset.page')
@endsection

@section('form')
    <h1 class="text-2xl font-bold leading-tight tracking-tight text-gray-900">
        @lang('main/reset.title')
    </h1>
    <form class="space-y-4 md:space-y-6" method='POST' action="{{route('password.update')}}">
        @csrf
        <input name="token" type="hidden" value="{{$request->token}}">
        <div>
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">@lang('main/reset.emailLabel')</label>
            <input readonly type="text" name = "email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                   placeholder="Example@mail.com" value="{{$request->email}}">
        </div>

        <div>
            <label for="password" class="mb-2 text-sm font-medium text-gray-900">@lang('main/reset.password')</label>
            <input type="password" name = "password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" >
        </div>

        <div>
            <label for="password_c" class="mb-2 text-sm font-medium text-gray-900">@lang('main/reset.confirm')</label>
            <input type="password" name = "password_confirmation" id="password_c" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" >
        </div>

        <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-bold leading-6 text-white shadow-sm hover:bg-indigo-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 transition-all duration-300"
        >@lang('main/reset.reset')</button>

    </form>
@endsection
