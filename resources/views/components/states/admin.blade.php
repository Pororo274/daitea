@auth
    @if(auth()->user()->role === 'admin')
        {{ $slot }}
    @endif
@endauth