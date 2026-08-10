@props([
    'name' => 'User',
    'photo' => null,
    'size' => 'md',
])

@php

$sizes = [
    'sm' => 'w-10 h-10 text-sm',
    'md' => 'w-14 h-14 text-lg',
    'lg' => 'w-20 h-20 text-2xl',
];

@endphp

@if ($photo)

    <img
        src="{{ asset($photo) }}"
        alt="{{ $name }}"
        {{ $attributes->merge([
            'class' => 'rounded-full object-cover '.($sizes[$size] ?? $sizes['md'])
        ]) }}
    >

@else

    <div
        {{ $attributes->merge([
            'class' => 'rounded-full bg-[#AAE977]/20 border border-[#AAE977]/40
                    text-white font-bold flex items-center justify-center '.($sizes[$size] ?? $sizes['md'])
        ]) }}>

        {{ strtoupper(substr(trim($name), 0, 1)) }}

    </div>

@endif