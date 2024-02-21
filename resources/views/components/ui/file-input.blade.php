
<div>
    <input type="file" name="{{ $name }}" id=""
           class="block text-slate-500
              file:mr-4 file:py-2 file:px-4
              file:rounded-lg file:border-0
              file:font-medium
              file:bg-orange-100 file:text-orange-600
              hover:file:bg-orange-200">
    @error($name)
        <p class="text-red-400">
            {{ $message }}
        </p>
    @enderror
</div>
