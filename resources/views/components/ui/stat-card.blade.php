@props([
    'title',
    'value',
    'subtitle' => null,
    'color' => 'green',
])

@php
$colors = [
    'gray' => [
        'text' => 'text-gray-600',
        'bg' => 'bg-gray-100',
        'border' => 'border-gray-200',
    ],
    'green' => [
        'text' => 'text-green-600',
        'bg' => 'bg-green-100',
        'border' => 'border-green-100',
    ],
    'yellow' => [
        'text' => 'text-yellow-600',
        'bg' => 'bg-yellow-100',
        'border' => 'border-yellow-100',
    ],
    'red' => [
        'text' => 'text-red-600',
        'bg' => 'bg-red-100',
        'border' => 'border-red-100',
    ],
    'pink' => [
        'text' => 'text-pink-600',
        'bg' => 'bg-pink-100',
        'border' => 'border-pink-100',
    ],
];

$style = $colors[$color] ?? $colors['green'];
@endphp

<div class="group relative overflow-hidden rounded-2xl border {{ $style['border'] }} bg-white p-6 transition-all duration-300 hover:-translate-y-1 hover:shadow-lg cursor-pointer">
    <div class="absolute inset-0 bg-linear-to-br from-[#5AA71B]/20 to-transparent opacity-0 group-hover:opacity-100 transition"></div>
    <div class="relative flex justify-between items-start">
        <div>
            <p class="text-sm font-medium {{ $style['text'] }}">
                {{ $title }}
            </p>
            <h2 class="mt-3 text-4xl font-bold {{ $style['text'] }}">
                {{ $value }}
            </h2>
            @if($subtitle)
                <p class="mt-3 text-sm {{ $style['text'] }}">
                    {{ $subtitle }}
                </p>
            @endif
        </div>
        <div class="w-14 h-14 rounded-2xl {{ $style['bg'] }} flex items-center justify-center group-hover:scale-110 transition">
            {{ $slot }}
        </div>
    </div>

</div>