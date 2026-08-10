<x-layout>
  <x-slot:title>{{$title}}</x-slot:title>

  <div class="container mx-auto px-4 py-8">
    <div class="flex grid-cols-2 gap-4 mt-6">
      @foreach ($posts as $post)
      <div class="px-4 py-4">
          <article class="bg-white shadow-md rounded-lg overflow-hidden border-amber-50 p-5">
            <h3 class="font-Sofia text-xl font-bold tracking-tight text-gray-800">{{$post['title']}}</h3>
            <a href="#" class="text-blue-500 hover:text-red-700">Avatar</a></span>
            <hr class="py-3 border-gray-300">       
            <p class="text-gray-600">{{Str::limit($post['isi'], 200)}}</p>
            <div class="mt-4"> 
              <a href="/posts/{{$post['slug']}}" class="text-blue-600
               hover:text-red-800">Baca Selengkapnya &raquo;</a>
            </div>
          </article> 
        </div>
        @endforeach
      </div>
    </div>

</x-layout>