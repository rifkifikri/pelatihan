
<x-guest-layout>
                <div class="mb-10">
                    <h2 class="text-4xl font-bold text-[#407613]">
                        Selamat Datang! 
                    </h2>

                    <p class="mt-2 text-gray-500">
                        Silakan login menggunakan NIK dan Password.
                    </p>
                
                    @if(session('warning'))
                    <div class="grid md:grid-cols-4 gap-2 mt-6 mb-6 rounded-xl border border-yellow-200 bg-yellow-50 px-4 py-3 text-yellow-800">
                        <x-ui.svg name="status.warning" class="w-16 h-16 md:col-span-1  hover:text-white"/>
                        <div class="md:col-span-3 text-justify">{{ session('warning') }}</div>                  
                    </div>
                    @endif

                </div>

    <form method="POST" action="{{ route('login') }}" id="loginForm">
        @csrf
                    <!-- NIK  -->
            <div class="mb-5">
                <label for="nik" class="block mb-2 font-semibold text-slate-700">
                    Nomor Induk Kependudukan (NIK)
                </label>
                <div class="relative">
                    <span class="absolute left-4 top-3 text-xl">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#a6ddad" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-id-card-icon lucide-id-card"><path d="M16 10h2"/><path d="M16 14h2"/><path d="M6.17 15a3 3 0 0 1 5.66 0"/><circle cx="9" cy="11" r="2"/><rect x="2" y="5" width="20" height="14" rx="2"/></svg>
                    </span>
                    <input  id="nik" name="nik" type="text" maxlength="16" value="{{ old('nik') }}" required
                        autofocus placeholder="3201234567890123"
                        class="w-full rounded-2xl border border-slate-300 pl-12 pr-4 py-3 focus:border-[#5aa71b] focus:ring-[#5aa71b] focus:outline-none">
                </div>

                @error('nik')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror

            </div>

                    <!-- PASSWORD -->
            <div class="mb-5">
                <label class="block mb-2 font-semibold text-gray-700">
                    Password
                </label>

                <div class="relative">

                    <span class="absolute left-4 top-3 text-xl">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#a6ddad" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-lock-keyhole-icon lucide-lock-keyhole"><circle cx="12" cy="16" r="1"/><rect x="3" y="10" width="18" height="12" rx="2"/><path d="M7 10V7a5 5 0 0 1 10 0v3"/></svg>
                    </span>

                    <input  id="password" name="password" type="password" required class="w-full rounded-2xl border border-blue-300 pl-12 pr-12 py-3 focus:border-[#71f00a] focus:ring-[#5aa71b] focus:outline-none">

                    <button type="button" onclick="togglePassword()" class="absolute right-4 top-3 text-slate-500">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#a6ddad" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye-icon lucide-eye"><path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"/><circle cx="12" cy="12" r="3"/></svg>
                    </button>
                </div>
                @error('password')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

                        <!-- CAPTCHA -->

                <!-- <div class="grid grid-cols-2 gap-4 mb-5">
                    <div>
                        <label class="block mb-2 font-semibold text-gray-700">
                            Captcha
                        </label>
                        <div id="captchaQuestion" class="rounded-2xl bg-red-200 text-center py-3 text-xl font-bold text-[#233316]">
                            8 + 5
                        </div>
                    </div>
                    <div>
                        <label class="block mb-2 font-semibold text-gray-700">
                            Jawaban
                        </label>
                        <input id="captcha" class="w-full rounded-2xl border border-slate-300 py-3 px-4  focus:border-[#71f00a] focus:ring-[#5aa71b] focus:outline-none">
                    </div>
                </div>
                        @error('captcha_answer')
                        <p class="text-red-500 text-sm mt-1">
                            {{ $message }}
                        </p>
                        @enderror
                            <div class="flex items-center gap-3">
                                <span id="captchaQuestion" class="font-semibold text-[#5AA71B]"></span>
                                <input type="number" id="captchaAnswer" name="captcha_answer" class="w-24 rounded-xl border-gray-300 focus:border-[#5AA71B]">
                            </div>
                            <input type="hidden" id="captchaResult" name="captcha_result">                 -->
<div class="space-y-2">
    <label class="block text-sm font-medium text-slate-700">
        Verifikasi
    </label>
    <div class="flex items-center gap-3">
        <div id="captchaQuestion" class="min-w-28 h-12 rounded-xl bg-green-50 px-4 py-3 font-bold text-[#5AA71B] border border-green-200">

            ...
        </div>
        <input  name="captcha_answer" id="captchaAnswer" autocomplete="off" 
        class="flex-1 rounded-xl border h-12 border-blue-300  px-4 py-3 focus:border-[#71f00a] focus:ring-[#5aa71b] focus:outline-none">

        <button type="button"  id="refreshCaptcha" class="rounded-xl bg-green-100 px-3 py-3  hover:bg-green-200">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#5de9ba" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-refresh-ccw-icon lucide-refresh-ccw"><path d="M21 12a9 9 0 0 0-9-9 9.75 9.75 0 0 0-6.74 2.74L3 8"/><path d="M3 3v5h5"/><path d="M3 12a9 9 0 0 0 9 9 9.75 9.75 0 0 0 6.74-2.74L21 16"/><path d="M16 16h5v5"/></svg>
        </button>

    </div>

    @error('captcha_answer')
        <p class="text-sm text-red-600 mt-3 mb-3">
            {{ $message }}
        </p>
    @enderror

</div>

        <!-- REMEMBER -->

                    <div class="flex items-center justify-between mb-6">
                        <label class="flex items-center gap-2 text-[0.8rem] text-gray-800">
                            <input type="checkbox" name="remember" class="rounded border-gray-300 text-[#5aa71b]">
                            <span>Ingat Saya</span>
                        </label>
                    </div>

                    <!-- <button class="w-1/4 rounded-2xl bg-[#5AA71B] py-2 text-sm font-medium
                    cursor-pointer text-white shadow-lg transition duration-300 hover:scale-[1.07] hover:shadow-xl
                    hover:bg-[#b5ea8a] hover:text-[#5AA71B]">
                    MASUK
                    </button> -->
                    <x-ui.button type="submit" variant="primary" size="md">
                        <span class="text-sm"> Masuk</span>
                        <x-ui.svg name="navigation.log-in" class="w-4 h-4 cursor-pointer"/>
                    </x-ui.button>                    

                    <!-- FOOTER -->
                    <div class="text-center mt-6">
                        <span class="text-slate-500 text-sm">  Belum punya akun? </span>
                        <a href="{{ route('register') }}" class="font-semibold text-[#5AA71B] hover:underline"> Daftar </a>
                    </div>

                    <!-- Home -->
                    <div class="flex text-center mt-3 justify-center">
                        <span class="text-slate-500 "></span>
                        <a href="{{ route('home') }}" class="font-semibold text-[#5AA71B] hover:underline hover:scale-[1.02]">
                        <x-ui.svg name="navigation.home" class="w-5 h-5 md:col-span-1  hover:text-green hover:scale-[1.02]"/>
                        </a>
                    </div>                    

    </form>

<script>
    async function generateCaptcha() {
        const response = await fetch('/captcha/generate');
        const data = await response.json();
        document.getElementById('captchaQuestion').innerHTML =
            data.question;
    }

    generateCaptcha();
    document
    .getElementById('refreshCaptcha')
    .addEventListener('click', generateCaptcha);
</script>

<script>
    function togglePassword(){
        const input=document.getElementById("password");
        input.type=input.type==="password"?"text":"password";
    }
</script>

</x-guest-layout>