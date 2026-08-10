@props(['name'])

@php
    $path = resource_path('svg/' . str_replace('.', '/', $name) . '.svg');

    if (! file_exists($path)) {
        return;
    }

    $svg = file_get_contents($path);

    // Hapus width & height
    $svg = preg_replace('/\s(width|height)="[^"]*"/i', '', $svg);

    // Tambahkan class dari Blade
    if ($attributes->has('class')) {
        if (preg_match('/class="([^"]*)"/', $svg, $match)) {
            $svg = preg_replace(
                '/class="([^"]*)"/',
                'class="'.$match[1].' '.$attributes->get('class').'"',
                $svg,
                1
            );
        } else {
            $svg = preg_replace(
                '/<svg\b([^>]*)>/',
                '<svg$1 class="'.$attributes->get('class').'">',
                $svg,
                1
            );
        }
    }
@endphp

{!! $svg !!}