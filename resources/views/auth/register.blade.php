<x-guest-layout>

    <div class="w-full max-w-3xl">

            <div class="text-center mb-8">
                <h1 class="mt-2 text-3xl font-bold text-slate-800">
                    Daftar Akun Baru
                </h1>
                <p class="mt-2 text-slate-500 text-sm">
                    Silakan lengkapi data berikut untuk membuat akun.
                </p>
            </div>

            <!-- <form method="POST" action="{{ route('register') }}" class="space-y-5" x-data="{ agree: false }"> -->
            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" class="space-y-5" x-data="{ agree: false }">                
                @csrf
                    <!-- NAMA-->
                    <div>
                        <label class="block mb-2 font-semibold text-gray-800"> Nama Lengkap </label>
                        <x-ui.input name="name" :value="old('name')" placeholder="Masukkan nama lengkap..." />
                        <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                    </div>

                    <!-- NIK -->
                    <div>
                        <label class="block mb-2 font-semibold text-gray-800"> NIK </label>
                        <x-ui.input name="nik" :value="old('nik')" placeholder="16 digit NIK..."  maxlength="16" inputmode="numeric"/>
                        <x-input-error :messages="$errors->get('nik')" class="mt-2"/>
                    </div>

                    <!-- HP -->
                    <div>
                        <label class="block mb-2 font-semibold text-gray-800"> Nomor HP / WhatsApp </label>
                        <x-ui.input name="phone" :value="old('phone')" placeholder="08xxxxxxxxxx" maxlength="13" inputmode="numeric"/>
                        <x-input-error :messages="$errors->get('phone')" class="mt-2"/>
                    </div>

                    <!-- EMAIL -->
                    <div>
                        <label class="block mb-2 font-semibold text-gray-800"> Email </label>
                        <x-ui.input type="email" name="email" :value="old('email')" placeholder="nama@email.com" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2"/>
                    </div>

                    <!-- PASSWORD -->
                    <div>
                        <label class="block mb-2 font-semibold text-gray-800"> Password </label>
                        <x-ui.input type="password" name="password" placeholder="Minimal 8 karakter" autocomplete="new-password"/>
                        <x-input-error :messages="$errors->get('password')" class="mt-2"/>
                    </div>

                    <!-- KONFIRMASI -->
                    <div>
                        <label class="block mb-2 font-semibold text-gray-800"> Konfirmasi Password </label>
                        <x-ui.input type="password" name="password_confirmation" placeholder="Ulangi password" />
                    </div>
                    
                    <!-- Photo -->
                    <div x-data="{ 
                            photoName: null, 
                            photoPreview: null,
                            updatePreview(event) {
                            const file = event.target.files[0];

                            if (!file) {
                                this.photoName = null;
                                this.photoPreview = null;
                                return;
                            }

                            this.photoName = file.name;
                            const reader = new FileReader();
                            reader.onload = (e) => {
                                this.photoPreview = e.target.result;
                            };
                                reader.readAsDataURL(file);
                            }
                        }"
                    >
                        <label class="block mb-2 font-semibold text-gray-800">
                            Foto Profil
                        </label>

                        <div class="flex items-center gap-6">
                            <!-- Preview -->
                            <div class="shrink-0">
                                <template x-if="photoPreview">
                                    <img :src="photoPreview" class="w-24 h-24 rounded-full object-cover border-4 border-green-100 shadow">
                                </template>

                                <template x-if="!photoPreview">
                                    <div class="w-24 h-24 rounded-full border-2 border-dashed border-gray-300 bg-gray-50 flex items-center justify-center">
                                        <x-ui.svg name="action.camera-off" class="w-6 h-6 text-[#5AA71B]" />
                                    </div>
                                </template>
                            </div>

                            <!-- Upload -->
                            <div class="flex-1">
                                <input type="file" name="photo" accept="image/png,image/jpeg,image/jpg,image/webp"
                                    @change="updatePreview"
                                    class="block w-full text-sm file:mr-4  file:px-4  file:py-2  file:rounded-lg  file:border-0  file:bg-[#5AA71B]   file:text-white  hover:file:bg-[#4A9217]">

                                <p class="mt-2 text-sm text-gray-500" x-show="photoName" x-text="photoName">
                                </p>

                                <p class="mt-2 text-xs text-gray-400">
                                    JPG, PNG, WEBP (Maksimal 2 MB)
                                </p>
                            </div>

                        </div>

                        <x-input-error :messages="$errors->get('photo')" class="mt-2"/>
                    </div>                    


                    <!-- S&K BERLAKU -->
                    <div class="flex items-center gap-3">
                        <input  type="checkbox" x-model="agree" class="rounded border-slate-300 text-[#5AA71B] focus:ring-[#5AA71B]">
                        <span class="text-sm text-slate-600">
                            Saya menyetujui syarat dan ketentuan.
                        </span>
                    </div>

                    <!-- TOMBOL -->
                    <x-ui.button type="submit" class="w-full justify-center" x-bind:disabled="!agree" x-bind:class="agree ? '' : 'opacity-50 cursor-not-allowed'">
                        Daftar Sekarang
                    </x-ui.button>

                    <!-- FOOTER -->
                    <div class="text-center mt-6">
                        <span class="text-slate-500">  Sudah punya akun? </span>
                        <a href="{{ route('login') }}" class="font-semibold text-[#5AA71B] hover:underline"> Login </a>
                    </div>
                  
                    <!-- Home -->
                    <div class="flex text-center mt-6 justify-center">
                        <span class="text-slate-500"></span>
                        <a href="{{ route('home') }}" class="font-semibold text-[#5AA71B] hover:underline">
                        <x-ui.svg name="navigation.home" class="w-6 h-6 text-[#5AA71B]" />
                        </a>
                    </div>   
        </form>

</div>


</x-guest-layout>

