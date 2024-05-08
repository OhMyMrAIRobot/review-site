@extends('layouts.base')

@section('content')
    <section class="grid grid-cols-12">
        <div class="col-span-3">
            @include('components.sidebarAdmin')
        </div>
        <div class="col-span-9 border-l bg-gray-50 pr-1">
            @yield('rightSide')
        </div>
    </section>
@endsection


