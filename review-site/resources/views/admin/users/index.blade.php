@extends('layouts.adminBase')

@section('page.title')
    @lang('admin/users.page')
@endsection

@section('rightSide')
    @include('components.admin.adminUsers.searchBar')

    @include('components.admin.status')

    <div class="grid grid-cols-12 mt-1 text-base bg-gray-50">
        <div class="col-span-1 font-bold pl-3 pt-1 pb-1 border-b">Id</div>

        <div class="col-span-2 font-bold pl-3 pt-1 pb-1 border-b">@lang('admin/users.login')</div>

        <div class="col-span-4 font-bold pl-3 pt-1 pb-1 border-b">@lang('admin/users.email')</div>

        <div class="col-span-2 font-bold pl-3 pt-1 pb-1 border-b">@lang('admin/users.role')</div>

        <div class="col-span-3 font-bold pl-3 pt-1 pb-1 border-b">@lang('admin/users.control')</div>

        @foreach($users as $key => $user)
            @include('components.admin.adminUsers.userItem')
        @endforeach
    </div>
    <div style="margin-top: 30px">
        {{ $users->onEachSide(10)->links('components.pagination') }}
    </div>
@endsection

