@extends('layouts.base')

@section('content')
    <section class="bg-gray-50">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto lg:py-20">

            <div class="w-full max-w-md mx-auto">
                @if (session('status_ok'))
                    @component('components.success', ['status' => session('status_ok')])@endcomponent
                @elseif ($errors->any())
                    @foreach ($errors->all() as $error)
                        @component('components.error', ['status' => $error])@endcomponent
                    @endforeach
                @endif
            </div>
            <div class="w-full bg-white rounded-lg shadow dark:border lg:mt-0 max-w-md lg:p-0">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    @yield('form')
                </div>
            </div>
        </div>
    </section>
@endsection
