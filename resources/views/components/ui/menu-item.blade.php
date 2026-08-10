@props([
    'active' => false,
    'href' => '#',
])

<a

href="{{ $href }}"

{{ $attributes->merge([

'class'=>

'flex items-center gap-4 rounded-xl px-4 py-3 transition-all duration-300 '.

($active

? 'bg-white text-[#407613] shadow-lg'

: 'hover:bg-white/20 text-white')

]) }}>

{{ $slot }}

</a>