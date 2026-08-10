<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>
    @vite(['resources/css/app.css','resources/js/app.js'])

</head>

<body class="min-h-screen bg-linear-to-b from-lime-50 to-green-100">
<div class="min-h-screen flex items-center justify-center px-6 py-10">
    <div class="w-full max-w-7xl overflow-hidden rounded-3xl bg-white shadow-2xl grid lg:grid-cols-2">
        <!-- LEFT PANEL -->
        <div class="hidden lg:flex relative flex-col justify-center p-16 bg-linear-to-b from-[#5aa71b] via-[#6abf24] to-[#407613] text-white">
            <div class="absolute inset-0 opacity-10">
                <div class="absolute w-72 h-72 rounded-full bg-white -top-16 -left-16"></div>
                <div class="absolute w-80 h-80 rounded-full bg-white bottom-0 right-0"></div>
            </div>

            <div class="relative z-10">
                <h1 class="text-6xl font-black tracking-widest">
                    HALAL
                </h1>
                <div class="mt-8 space-y-2 text-xl font-light">
                    <p>Himpunan</p>
                    <p>Aplikasi</p>
                    <p>Latihan</p>
                    <p>Anak</p>
                    <p>Laravel</p>
                </div>
                <p class="mt-10 text-lg opacity-90 leading-8">
                    Belajar Laravel Modern dengan pendekatan profesional,
                    mulai dari Authentication, Dashboard,
                    hingga membangun aplikasi yang siap dikembangkan.
                </p>
                <div class="mt-12">
                    <div class="h-56 rounded-3xl bg-white/10 backdrop-blur flex items-center justify-center">
                        <span class="text-8xl">
                            gambar komputer
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- RIGHT PANEL -->

        <div class="flex items-center justify-center p-10 lg:p-16">
            <div class="w-full max-w-md">
                <!-- <div class="mb-10">
                    <h2 class="text-4xl font-bold text-[#407613]">
                        Selamat Datang 
                    </h2>

                    <p class="mt-2 text-gray-500">
                        Silakan login menggunakan NIK dan Password.
                    </p>
                </div> -->
                {{ $slot }}
            </div>
        </div>
    </div>
</div>

</body>
</html>