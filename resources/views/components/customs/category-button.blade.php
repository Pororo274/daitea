<a
    href="{{ $link }}"
    class="block px-4 py-2 rounded-lg font-medium border border-orange-400
                        @if($isActive)
                            bg-orange-400 text-gray-50
                        @else
                            bg-none text-orange-400
                        @endif
                        "
>
    {{ $slot }}
</a>
