@props([
    'padding' => 'p-6',
])

<div
    {{ $attributes->merge([
        'class' => "bg-white rounded-3xl shadow-lg {$padding}
                    transition-all duration-300
                    hover:-translate-y-1 hover:shadow-2xl"
    ]) }}>

    {{ $slot }}

</div>