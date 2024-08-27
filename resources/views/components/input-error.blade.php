@props(['for'])

<span class="h-4 text-xs text-red-500">
    @error($for)
        {{ $message }}
    @enderror
</span>
