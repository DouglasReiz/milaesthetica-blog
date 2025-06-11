<x-templates.guest>

    <div class="grid lg:grid-cols-3 md:grid-cols-3 sm:grid-cols-2 gap-10">
        @foreach ($posts as $post)
        <div class="bg-white rounded-lg shadow-md overflow-hidden group transition-transform duration-300 hover:-translate-y-1">
            <a href="{{ route('posts.show', $post->id) }}">
                <div class="relative">
                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-full h-60 object-cover group-hover:scale-105 transition-transform duration-300">
                    <div class="absolute inset-0 bg-gradient-to-t from-[#f4f0e5]/80 via-transparent to-transparent pointer-events-none"></div>
                </div>
                <div class="p-5">
                    <h2 class="text-xl font-semibold text-gray-800 group-hover:text-[#c9a57d] transition-colors duration-300">
                        {{ $post->title }}
                    </h2>
                    <p class="mt-2 text-sm text-gray-600">{{ $post->excerpt }}</p>
                    <p class="mt-4 text-xs text-gray-400">{{ $post->created_at->format('d/m/Y') }}</p>
                </div>
            </a>

            {{-- Botão de DELETE --}}
            @auth
            <div class="m-3 flex items-center">
                <div class="">
                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="inline-block px-6 py-2 border border-gray-300 rounded hover:bg-red-400 text-sm">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn-danger">
                            Deletar
                        </button>
                    </form>
                </div>

                {{-- Botão Editar --}}
                <div class="ml-2">
                    <a href="{{ route('posts.edit', $post->id) }}"
                        class="inline-block px-6 py-2 border border-gray-300 rounded hover:bg-yellow-400 text-sm">
                        Editar
                    </a>
                </div>
            </div>
            @endauth
        </div>
        @endforeach
    </div>

</x-templates.guest>