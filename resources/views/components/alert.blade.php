@props(['type' => 'success', 'message' => ''])

@php
    $class = [
        'success' => 'border-green-400 bg-green-100 text-green-700',
        'error' => 'border-red-400 bg-red-100 text-red-700',
    ];

    $classesTxt = $class[$type] ?? $class['success'];

@endphp

<div class="my-10 text-center border text-sm py-3 {{ $classesTxt }}">
    {{ session($type) }}
</div>