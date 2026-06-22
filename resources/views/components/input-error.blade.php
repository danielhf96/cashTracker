@props(['field'])

@error($field)
<div class="text-red-500 text-sm mt-2">
    {{ $message }}
</div>
@enderror