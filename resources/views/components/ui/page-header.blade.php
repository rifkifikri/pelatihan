@props([
    'title',
    'subtitle' => ''
])

<div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-4 mb-8">

    <div>
        <h1 class="text-3xl font-bold text-gray-800">
            {{ $title }}
        </h1>
        @if($subtitle)
            <p class="mt-2 text-gray-500">
                {{ $subtitle }}
            </p>
        @endif
    </div>
    {{ $slot }}

</div>