@props([
    'name' => '?',
    'size' => 'md',
])

@php

$sizes = [
    'sm' => 'w-10 h-10 text-sm',
    'md' => 'w-12 h-12 text-base',
    'lg' => 'w-14 h-14 text-lg',
];

@endphp

<div
    {{ $attributes->merge([
        'class' => 'rounded-xl
                    bg-white/15
                    border
                    border-white/20
                    flex
                    items-center
                    justify-center
                    font-bold
                    text-white
                    '.($sizes[$size] ?? $sizes['md'])
    ]) }}>

    {{ strtoupper(substr($name,0,1)) }}

</div>