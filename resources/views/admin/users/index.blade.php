<x-app-layout>

<!-- HEADER -->
<div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
    <div>
        <h1 class="text-2xl font-bold text-gray-800">
            Kelola Pengguna
        </h1>
        <p class="text-sm font-semibold text-green-500 mt-1">
            Manajemen data pengguna aplikasi.
        </p>
    </div>
</div>

<!-- STATISTIK -->
 <div class="grid grid-cols-2 lg:grid-cols-4 gap-5 mb-10 mt-4">
    <x-ui.stat-card title="Total" :value="$stat['total']" color="gray">
        <x-ui.svg name="navigation.users-round" class="w-8 h-8 text-[#5AA71B]" />
    </x-ui.stat-card>   
    <x-ui.stat-card title="Aktif" :value="$stat['active']" color="green">
        <x-ui.svg name="navigation.user-check" class="w-8 h-8 text-[#5AA71B]" />
    </x-ui.stat-card>   
    <x-ui.stat-card title="Pending" :value="$stat['pending']" color="yellow">
        <x-ui.svg name="navigation.user-pen" class="w-8 h-8 text-[#5AA71B]" />
    </x-ui.stat-card>   
    <x-ui.stat-card title="Rejected" :value="$stat['rejected']" color="red">
        <x-ui.svg name="navigation.user-round-x" class="w-8 h-8 text-[#5AA71B]" />
    </x-ui.stat-card>   
</div>

<!-- FILTER -->
<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5 mb-6">
    <form>
        <div class="grid lg:grid-cols-4 gap-4">
            <div>
                <label class="block text-sm font-medium mb-2"> Cari </label>
                <x-ui.input name="search" :value="request('search')" placeholder="Nama / Email / NIK"/>
            </div>

            <div>
                <label class="block text-sm font-medium mb-2">Role</label>
                <x-ui.select name="role">
                    <option value="">Semua</option>
                    <option value="admin" @selected(request('role')=='admin')>Admin</option>
                    <option  value="pengguna" @selected(request('role')=='pengguna')>Pengguna</option>
                </x-ui.select>
            </div>

            <div>
                <label class="block text-sm font-medium mb-2">Status</label>
                <x-ui.select name="status">
                    <option value="">Semua</option>
                    <option value="active" @selected(request('status')=='active')> Active </option>
                    <option value="pending" @selected(request('status')=='pending')>Pending</option>
                    <option value="rejected" @selected(request('status')=='rejected')>Rejected</option>
                </x-ui.select>
            </div>

            <div class="flex items-end">
                <x-ui.button>
                    <x-ui.svg name="action.search" class="w-4 h-4  hover:text-white"/>
                    Cari
                </x-ui.button>
            </div>
        </div>
    </form>
</div>

<!-- DATA TABEL -->
<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="min-w-full">
            <tdead class="bg-gray-50">
                <tr class="h-10 text-green-50 bg-gray-800 text-xs text-left">
                    <td class="text-center">Foto</td>
                    <td>Nama</td>
                    <td>Email</td>
                    <td>Role</td>
                    <td>Status</td>
                    <td>Terdaftar</td>
                    <td class="text-center">
                    Aksi
                    </td>
                </tr>
            </tdead>
            <tbody>
            @forelse($users as $user)
                <tr class="border-t border-t-gray-200 text-sm">
                    <td class="p-4">
                        <img src="{{ $user->photo_url }}" class="w-12 h-12 rounded-full object-cover">
                    </td>
                    <td>
                        <div class="font-semibold"> {{ $user->name }} </div>
                        <div class="text-xs text-gray-500">  {{ $user->nik }} </div>
                    </td>
                    <td>
                        {{ $user->email }}
                    </td>
                    <td>
                        @if($user->role=='admin')
                        <x-ui.badge color="red"> Admin </x-ui.badge>
                        @else
                        <x-ui.badge color="green"> Pengguna </x-ui.badge>
                        @endif
                    </td>
                    <td>
                        @if($user->status=='active')
                        <x-ui.badge color="green">Active </x-ui.badge>
                        @elseif($user->status=='pending')
                        <x-ui.badge color="yellow"> Pending </x-ui.badge>
                        @else
                        <x-ui.badge color="red"> Rejected </x-ui.badge>
                        @endif
                    </td>
                    <td>
                        {{ $user->created_at->format('d M Y') }}
                    </td>
                    <td>
                        <div class="flex justify-center gap-2">
                            <a href="{{ route('admin.users.show',$user) }}">
                            <x-ui.button>
                            <x-ui.svg name="navigation.menu" class="w-4 h-4  hover:text-white"/>
                            Detail
                            </x-ui.button>
                            </a>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center py-10 text-gray-500">Belum ada data pengguna.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- PAGNATIoN -->
<div class="mt-6">{{ $users->links() }}</div>

<!-- PENUTUP -->
</x-app-layout>