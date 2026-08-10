@props([
    'title' => 'makmur'
])

<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite('resources/css/app.css')

    <title>{{ $title }}</title>

    <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script>

</head>

<body class="h-full">

<div class="min-h-full">

    <x-navbar />

    <!-- <x-header>
        <span class="font-poppins text-xl text-blue-800">{{ $title }}</span>
    </x-header> -->
    <main class="container py-4 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 bg-gray-100">
        {{ $slot }}
    </main>
<x-footer />
</div>

</body>
</html>