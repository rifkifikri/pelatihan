<x-app-layout>

    <div class="max-w-7xl mx-auto py-8">

        <div class="mb-8">
            <h1 class="text-3xl font-bold text-[#407613]">
                Profil Saya
            </h1>

            <p class="text-slate-500 mt-1">
                Kelola informasi akun dan keamanan akun Anda.
            </p>
        </div>

        <div class="space-y-6">

            @include('profile.partials.update-photo-form')

            @include('profile.partials.update-profile-information-form')

            @include('profile.partials.update-password-form')

            @include('profile.partials.delete-user-form')

        </div>

    </div>

</x-app-layout>