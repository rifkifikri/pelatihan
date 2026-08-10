@props([
    'rows' => 5,
])

<textarea
    rows="{{ $rows }}"
    {{ $attributes->merge([
        'class' => 'w-full
            poppins
            text-base
            text-gray-800
            rounded-xl
            border
            border-slate-300
            px-4
            py-3
            bg-white
            transition-all
            duration-300
            focus:border-[#5AA71B]
            focus:ring-[#5AA71B]/20
            focus:outline-none
            hover:border-[#7CC242]
            resize-y'
    ]) }}
></textarea>