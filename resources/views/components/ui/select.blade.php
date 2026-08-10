@props([
    'placeholder' => null,
])

<select
    {{ $attributes->merge([
        'class' => 'w-full
            poppins
            text-md
            text-gray-800
            rounded-xl
            border
            border-slate-300
            px-3
            py-2
            bg-white
            transition-all
            duration-300
            focus:border-[#5AA71B]
            focus:ring-[#5AA71B]/20
            focus:outline-none
            hover:border-[#7CC242]
            cursor-pointer'
    ]) }}
>

    @if($placeholder)
        <option value="" class="cursor-pointer">{{ $placeholder }}</option>
    @endif

    {{ $slot }}

</select>