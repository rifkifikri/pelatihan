<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard Pengguna')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body x-data="{ sidebar: true }" class="bg-gray-100  font-[Poppins] text-sm">
    @include('pengguna.partials.sidebar')
    <div :class="sidebar ? 'ml-72' : 'ml-24'" class="min-h-screen" >
        @include('pengguna.partials.navbar')

        <main 
            x-data="{ show: false }"
            x-init="setTimeout(() => show = true, 50)"
            x-show="show"
            x-transition:enter="transition-all duration-500 ease-out"
            x-transition:enter-start="opacity-0 translate-y-8 scale-[0.98]"
            x-transition:enter-end="opacity-100 translate-y-0 scale-100"
            class="min-h-[calc(100vh-6rem)] p-8 pt-2"
        >
            @yield('content')
        </main>
    </div>

</body>
</html>