<x-app-layout>

<div class="max-w-6xl mx-auto space-y-8">
    <!-- Profile -->
<div class="rounded-3xl bg-white border border-green-100 shadow-sm p-8">
    <div class="flex flex-col items-center">
        <img src="{{ $user->photo ? asset('storage/'.$user->photo) : asset('images/avatar.png') }}"
            class="w-32 h-32 rounded-full object-cover border-4 border-green-100 shadow">
        <h1 class="mt-5 text-3xl font-bold text-slate-800"> {{ $user->name }} </h1>
        <p class="mt-1 text-slate-500"> {{ $user->email }} </p>
        <div class="flex flex-wrap justify-center gap-3 mt-6">

    <!-- Role     -->
    <x-ui.badge :color="$user->role == 'admin' ? 'red' : 'green'">
        {{ ucfirst($user->role) }}
    </x-ui.badge>    

    <!-- STATUS USER -->
    <x-ui.badge
        :color="match($user->status){
            'active' => 'green',
            'pending' => 'yellow',
            default => 'red'
        }">
        {{ ucfirst($user->status) }}
    </x-ui.badge>

    <!-- INFO email -->
<x-ui.badge  :color="$user->email_verified_at ? 'green' : 'yellow'">
    {{ $user->email_verified_at ? 'Verified' : 'Belum Verifikasi' }}
</x-ui.badge>
        </div>
    </div>
</div>

    <!-- INFORMASI -->
<div class="grid md:grid-cols-2 gap-5">

    <x-ui.detail-item
        label="NIK"
        :value="$user->nik"/>

    <x-ui.detail-item
        label="Nomor HP"
        :value="$user->phone"/>

    <x-ui.detail-item
        label="Email"
        :value="$user->email"/>

    <x-ui.detail-item
        label="Alias"
        :value="$user->alias"/>

    <x-ui.detail-item
        label="Tanggal Daftar"
        :value="$user->created_at->translatedFormat('d F Y')"/>

    <x-ui.detail-item
        label="Terakhir Diubah"
        :value="$user->updated_at->translatedFormat('d F Y H:i')"/>

</div>

    <!-- AKSI -->
<div class="flex justify-end gap-3">
    <a href="{{ route('admin.users.index') }}">
        <x-ui.button color="secondary"> Kembali </x-ui.button>
    </a>
    <a href="{{ route('admin.users.edit',$user) }}">
        <x-ui.button> Edit Pengguna </x-ui.button>
    </a>

</div>

</div>
</x-app-layout>