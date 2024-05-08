@extends('layouts.adminBase')

@section('rightSide')
    <div class="col-span-9 flex flex-col items-center gap-y-6 pb-10">
        <h4 class="font-bold text-3xl mt-8">@yield('adminFormTitle')</h4>

    @include('components.admin.adminShops.errors')

    @yield('adminFormBody')
@endsection
