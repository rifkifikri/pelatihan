@extends('frontend.layouts.app')

@section('content')

<section class="bg-slate-50 py-20">
    <div class="max-w-7xl mx-auto px-6">
        <!--Header -->
        <div class="text-center mb-14">
            <span class="inline-block px-4 py-2 rounded-full bg-green-100 text-[#5AA71B] text-sm font-semibold">
                Semua Berita
            </span>
            <h1 class="mt-5 text-5xl font-bold text-slate-800">
                Informasi & Berita
            </h1>
            <p class="mt-4 text-slate-500 max-w-2xl mx-auto">
                Seluruh berita dan informasi yang telah dipublikasikan.
            </p>
        </div>


        <!--PEncarian Berita-->
        <div class="container flex-row w-1/2 items-center justify-center">
            <form action="{{ route('berita.index') }}" method="GET">
                <div class="flex flex-col md:flex-row gap-4 mb-8">
                    <div class="relative flex-1">
                    <span class="absolute left-4 top-3 text-xl">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#98db85" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search-icon lucide-search"><path d="m21 21-4.34-4.34"/><circle cx="11" cy="11" r="8"/></svg>        
                    </span>
                        <x-ui.input type="text" name="search" :value="request('search')" placeholder="Cari judul berita..." class="pl-12 pr-4 py-3 text-sm text-mauve-900" />
                    </div>
                    <x-ui.button type="submit" >
                        Cari
                    </x-ui.button>
                    @if(request('search'))
                        <a href="{{ route('berita.index') }}">
                            <x-ui.button variant="secondary" type="button" style="height:50px">
                                Refresh
                            </x-ui.button>
                        </a>
                    @endif
                </div>
            </form>

                    <!-- Hasil pencarian -->
                    @if(request('search'))
                    <div class="mb-12">
                        <span class="inline-flex items-center rounded-xl bg-gray-300 px-4 py-2 text-sm font-light text-[#57723f]">
                            Hasil pencarian :
                            <strong class="ml-2">
                                "{{ request('search') }}" {{ $posts->total() }} Berita
                            </strong>
                        </span>
                    </div>
                    @endif

                    <!-- Rekap Pencarian 
                <div class="flex items-center justify-between mb-8">
                <h2 class="text-xl font-semibold text-slate-500">
                <span class="text-sm font-normal text-slate-700"> Daftar Berita :</span>  {{ $posts->total() }} Berita
                </h2>
                    <span class="text-sm text-slate-500">
                    Total : {{ $posts->total() }} Berita
                </span> 
            </div>         -->
        </div>
        <!--Grid -->
        <div class="grid gap-8 md:grid-cols-2 xl:grid-cols-3">
            @forelse($posts as $post)
                <x-ui.post-card :post="$post"/>
            @empty
                <div class="col-span-3 text-center py-20">
                    Belum ada berita.
                </div>
            @endforelse
        </div>

        <!--Pagination -->
        <div class="mt-14">
            {{ $posts->links() }}
        </div>
    </div>
</section>

@endsection