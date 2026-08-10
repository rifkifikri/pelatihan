@props([
    'type' => 'button',
    'variant' => 'primary',
    'size' => 'md',
])

@php

$variants = [
'primary' => 'bg-[#5AA71B] hover:bg-[#407613] text-white',
'secondary' => 'bg-slate-200 hover:bg-slate-300 text-slate-800',
'success' => 'bg-green-600 hover:bg-green-700 text-white',
'warning' => 'bg-yellow-500 hover:bg-yellow-600 text-white',
'danger' => 'bg-red-600 hover:bg-red-700 text-white',
'info' => 'bg-sky-500 hover:bg-sky-600 text-white',
'info2' => 'bg-sky-300 hover:bg-sky-600 text-white',
'light' => 'bg-white border border-slate-300 hover:bg-slate-100 text-slate-700',
'dark' => 'bg-slate-800 hover:bg-slate-900 text-white',
];

$sizes = [
'sm' => 'px-3 py-2 text-sm',
'md' => 'px-5 py-3 text-md',
'lg' => 'px-6 py-4 text-lg',
];

@endphp

<button
    type="{{ $type }}"
    class="inline-flex items-center gap-2 rounded-xl text-xs font-semibold transition-all duration-300 cursor-pointer hover:-translate-y-0.5 {{ $variants[$variant] }} {{ $sizes[$size] }}"
    {{ $attributes->except('type') }}
>
    {{ $slot }}
</button>