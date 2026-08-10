@props([
    'href',
    'icon',
    'label'
])

<a href="{{ $href }}" class="inline-flex items-center gap-2
          bg-[#5AA71B]
          hover:bg-[#407613]
          text-white
          rounded-xl px-5 py-3 transition duration-300 hover:-translate-y-0.5">

    <span class="text-lg">
        {{ $icon }}
    </span>

    <span>
        {{ $label }}
    </span>

</a>