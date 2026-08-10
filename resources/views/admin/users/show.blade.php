<x-app-layout>

<div class="grid lg:grid-cols-4 gap-6">
    <!-- Profile -->
    <div class="lg:col-span-2 space-y-6">

        <div class="space-y-6">
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
                <x-ui.badge :color="match($user->status){ 'active' => 'green',  'pending' => 'yellow',  default => 'red'}">
                    {{ ucfirst($user->status) }}
                </x-ui.badge>
                    <!-- INFO email -->
                <x-ui.badge  :color="$user->email_verified_at ? 'green' : 'yellow'">
                    {{ $user->email_verified_at ? 'Verified' : 'Belum Verifikasi' }}
                </x-ui.badge>
                </div>
            </div>
        </div>    
        <!-- end profil -->

        <div class="rounded-3xl bg-white border border-slate-200 shadow-sm">
            <div class="px-6 py-5 border-b border-slate-100 text-center">
                <h2 class="text-lg font-bold text-slate-800"> Aksi Administrator </h2>
                <p class="text-sm text-slate-500"> Kelola status akun pengguna. </p>
            </div>

            <div  class="flex gap-6 px-4 py-4 justify-center">
                @if($user->status != 'active')
                <form action="{{ route('admin.users.activate', $user) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <x-ui.button variant="success" type="submit" class="w-full justify-center">Aktifkan</x-ui.button>
                </form>
                @endif

                @if($user->status != 'reject')
                <form action="{{ route('admin.users.reject', $user) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <x-ui.button variant="warning" type="submit" class="w-full justify-center">Tolak</x-ui.button>
                </form>
                @endif
                <form action="{{ route('admin.users.destroy', $user) }}"  method="POST" onsubmit="return confirm('Yakin ingin menghapus akun ini?')">
                    @csrf
                    @method('DELETE')
                    <x-ui.button variant="danger" type="submit" class="w-full justify-center"> Hapus Akun </x-ui.button>
                </form>
            </div>
        </div>
    </div>
    <div class="lg:col-span-2 space-y-6">
        <div class="rounded-3xl bg-white border border-slate-200 shadow-sm">
            <div class="px-6 py-5 border-b border-b-gray-200">
            <h2 class="font-bold text-slate-700">Informasi Pengguna</h2>
            </div>

            <div class="p-6 grid md:grid-cols-2 gap-5">
                <x-ui.detail-item label="NIK" :value="$user->nik"/>
                <x-ui.detail-item label="Nomor HP" :value="$user->phone"/>
                <x-ui.detail-item label="Email" :value="$user->email"/>
                <x-ui.detail-item label="Alias" :value="$user->alias"/>
                <x-ui.detail-item label="Tanggal Daftar" :value="$user->created_at->translatedFormat('d F Y')"/>
                <x-ui.detail-item label="Terakhir Diubah" :value="$user->updated_at->translatedFormat('d F Y H:i')"/>
            </div>
            <div class="grid px-6 py-5 justify-end">
                <a href="{{ route('admin.users.index') }}"><x-ui.button variant="secondary">Kembali</x-ui.button></a>  
            </div>          
        </div>

    </div>

</div>
</x-app-layout>