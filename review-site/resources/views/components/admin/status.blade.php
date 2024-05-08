@if (session('status_ok'))
    <div class="mt-3 w-full pl-3 border-b">
        <div class="w-1/3">
            @if (session('status_ok'))
                @component('components.success', ['status' => session('status_ok')])@endcomponent
            @endif
        </div>
    </div>
@endif
