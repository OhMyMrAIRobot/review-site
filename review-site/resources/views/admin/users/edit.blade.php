@extends('layouts.adminActionBase')

@section('page.title')
    {{$user->username}}
@endsection

@section('adminFormTitle')
    @lang('admin/users.titleEdit')
@endsection

@section('adminFormBody')
    <form method="POST" action="{{route('users.update', $user->id)}}" enctype="multipart/form-data" class="bg-white  py-4 px-6 flex flex-col gap-y-6 h-fit w-1/2 border rounded-xl">
        @csrf
        @method('PUT')

        <div>
            <label for = "username" class="block mb-1 text-sm font-medium text-gray-900">@lang('admin/users.username')</label>
            <input name = "username" id="username" type = "text" placeholder="@lang('admin/users.username')..." value="{{$user->username}}" class="bg-inherit border border-gray-300 text-gray-900 sm:text-sm rounded-lg outline-none focus:ring-indigo-800 focus:border-indigo-600 block w-full p-2.5">
        </div>

        <div>
            <label for = "email" class="block mb-1 text-sm font-medium text-gray-900">@lang('admin/users.email')</label>
            <input name = "email" id="email" type = "text" placeholder="@lang('admin/users.email')..." value="{{$user->email}}" class="bg-inherit border border-gray-300 text-gray-900 sm:text-sm rounded-lg outline-none focus:ring-indigo-800 focus:border-indigo-600 block w-full p-2.5">
        </div>

        <div>
            <label for = "password" class="block mb-1 text-sm font-medium text-gray-900">@lang('admin/users.password')</label>
            <input name = "password" id="password" type = "text" placeholder="••••••••" class="bg-inherit border border-gray-300 text-gray-900 sm:text-sm rounded-lg outline-none focus:ring-indigo-800 focus:border-indigo-600 block w-full p-2.5">
        </div>

        <div class="inline-flex items-center gap-x-3">
            <label class="relative flex items-center rounded-full cursor-pointer" for="check">
                <input type="checkbox" name = "admin" {{ $user->admin ? 'checked' : '' }} class="before:content[''] peer relative h-5 w-5 cursor-pointer appearance-none rounded-md border border-blue-gray-200 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-blue-gray-500 before:opacity-0 before:transition-opacity checked:border-indigo-600 checked:bg-indigo-600" id="check" />
                <span class="absolute text-white transition-opacity opacity-0 pointer-events-none top-2/4 left-2/4 -translate-y-2/4 -translate-x-2/4 peer-checked:opacity-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 20 20" fill="currentColor" stroke="currentColor" stroke-width="1">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                    </svg>
                </span>
            </label>
            <label class="mt-px font-medium text-gray-900 cursor-pointer select-none" for="check">
                @lang('admin/users.admin')
            </label>
        </div>

        <button type="submit" class="mt-2 mr-auto border rounded-xl bg-indigo-600 hover:bg-indigo-700 focus:ring-4 focus:outline-none focus:ring-gray-300 text-white font-bold text-base px-6 py-2">@lang('admin/users.save')</button>
    </form>
@endsection


