<x-app-layout>

<div class="space-y-6">

     <!-- Header  -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">
                Manajemen Berita
            </h1>
            <p class="text-sm text-slate-500 mt-1">
                Kelola berita yang akan ditampilkan pada website.
            </p>
        </div>

        @if(session('success'))
            <div class="rounded-xl bg-green-100 border border-green-300 p-4 text-green-700">
                {{ session('success') }}
            </div>
        @endif        

        <a href="{{ route('posts.create') }}">
            <x-ui.button>
                Tambah Berita
            </x-ui.button>
        </a>
    </div>

     <!-- Card  -->
    <x-ui.card>
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b text-slate-600">
                        <th class="py-3 text-left">Cover</th>
                        <th class="py-3 text-left">Judul</th>
                        <th class="py-3 text-left">Status</th>
                        <th class="py-3 text-left">Penulis</th>
                        <th class="py-3 text-left">Publish</th>
                        <th class="py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($posts as $post)
                        <tr class="border-b hover:bg-slate-50">
                            <td class="py-3">
                                @if($post->image)
                                    <img src="{{ asset('storage/'.$post->image) }}" class="w-20 h-14 rounded-lg object-cover">
                                @else
                                    <div class="w-20 h-14 rounded-lg bg-slate-200 flex items-center justify-center text-xs text-slate-500">
                                        No Image
                                    </div>
                                @endif
                            </td>
                            <td>
                                <div class="font-semibold">
                                    {{ $post->title }}
                                </div>
                                <div class="text-xs text-slate-500">
                                    {{ $post->slug }}
                                </div>
                            </td>
                            <td>
                                @if($post->status == 'published')
                                    <x-ui.badge color="green">
                                        Publish
                                    </x-ui.badge>
                                @else
                                    <x-ui.badge color="yellow">
                                        Draft
                                    </x-ui.badge>
                                @endif
                            </td>
                            <td>
                                {{ $post->user->name }}
                            </td>
                            <td>
                                {{ optional($post->published_at)->format('d M Y') ?? '-' }}
                            </td>
                            <td>
                                <div class="flex justify-center gap-2">
                                    <a href="{{ route('posts.show', $post) }}">
                                        <x-ui.button variant="info" size="sm">
                                            Lihat
                                        </x-ui.button>
                                    </a>
                                    <a href="{{ route('posts.edit', $post) }}">
                                        <x-ui.button  variant="warning" size="sm">
                                            Edit
                                        </x-ui.button>
                                    </a>                              
                                    <form action="{{ route('posts.destroy', $post) }}" method="POST" class="inline"
                                        onsubmit="return confirm('Yakin ingin menghapus berita ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <x-ui.button variant="danger" size="sm" type="submit">
                                            Hapus
                                        </x-ui.button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-10 text-center text-slate-400">
                                Belum ada berita.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </x-ui.card>
<div class="mt-4">
    {{ $posts->links() }}
</div>    
</div>

</x-app-layout>