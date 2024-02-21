<div>
    <input type="{{ $type }}" class="px-4 py-2 border border-gray-400 rounded-lg focus:outline-none focus:border-orange-500 w-full" placeholder="{{ $placeholder }}" name="{{ $name }}" value="{{ old($name) }}">
    @error($name)
        <p class="text-red-400">
            {{ $message }}
        </p>
    @enderror
</div>