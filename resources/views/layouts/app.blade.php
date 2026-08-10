<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>
    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])
</head>

<body x-data="{ sidebar:true }" class="bg-slate-100">
<x-layouts.sidebar />
<div :class="sidebar ? 'ml-72' : 'ml-24'" class="min-h-screen transition-all duration-300">
    <x-layouts.navbar/>
    <main class="p-8">
        {{ $slot }}
    </main>
    <x-layouts.footer />
</div>
</body>

</html>