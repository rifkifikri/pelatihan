@props([
    'label',
    'value' => '-',
])

<div class="rounded-xl border border-slate-200 bg-slate-50 p-4 transition hover:border-[#5AA71B]/30 hover:bg-green-50">
    <p class="text-xs uppercase tracking-wider text-slate-500">
        {{ $label }}
    </p>

    <p class="mt-2 text-base font-semibold text-slate-800">
        {{ $value ?: '-' }}
    </p>
</div>