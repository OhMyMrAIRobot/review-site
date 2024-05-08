@if (session('status_err') || $errors->any())
    <div class="w-1/2">
        @if (session('status_err'))
            @component('components.success', ['status' => session('status_ok')])@endcomponent
        @endif
        @foreach ($errors->all() as $error)
            @component('components.error', ['status' => $error])@endcomponent
        @endforeach
    </div>
@endif
