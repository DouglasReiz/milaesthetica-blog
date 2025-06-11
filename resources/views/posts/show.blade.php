<x-templates.guest>
    <article class="max-w-6xl mx-auto px-2 py-16 text-gray-900 bg-white rounded-md">

        {{-- Capa do Post --}}
        @if($post->image)
        <div class="mb-10">
            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-full h-auto rounded-md shadow-lg">
        </div>
        @endif

        {{-- Título --}}
        <h1 class="text-4xl font-bold mb-4 leading-tight">{{ $post->title }}</h1>

        {{-- Autor e Data --}}
        <div class="mb-10 text-sm text-gray-500">
            Publicado em {{ $post->created_at->format('d/m/Y') }}
            @if($post->author)
            por <span class="font-semibold">{{ $post->author->name }}</span>
            @endif
        </div>

        {{-- Conteúdo do Post --}}
        <div class="prose prose-lg max-w-none">
            {!! $post->content !!}
        </div>

        {{-- Botão Voltar --}}
        <div class="mt-12 flex">
            <div class="">
                <a href="{{ route('posts.index') }}"
                    class="inline px-6 py-2 border border-gray-300 rounded hover:bg-gray-100 text-sm">
                    ← Voltar ao blog
                </a>
            </div>
            {{-- Botão Editar --}}
            <div class="ml-2">
                <a href="{{ route('posts.edit', $post->id) }}"
                    class="inline px-6 py-2 border border-gray-300 rounded hover:bg-gray-100 text-sm">
                    Editar
                </a>
            </div>
        </div>

        <section class="mt-12 border-t border-gray-400">
            <h2 class="text-xl font-semibold mb-4">Deixe um comentário</h2>

            @if(session('success'))
            <p class="text-green-600 mb-4">{{ session('success') }}</p>
            @endif

            <form action="{{ route('comments.store', $post->id) }}" method="POST" class="space-y-4">
                @csrf
                <input type="text" name="name" placeholder="Seu nome" required class="w-full border p-2 rounded" />
                <textarea name="comment" placeholder="Seu comentário" required class="w-full border p-2 rounded"></textarea>
                <button type="submit" class="bg-amber-600 text-white px-4 py-2 rounded">Comentar</button>
            </form>
        </section>

        <section class="mt-8 bg-gray-100 p-2 rounded-md">
            <h2 class="text-lg font-semibold mb-2">Comentários</h2>

            @forelse ($post->comments as $comment)
            <div class="border-t border-gray-400 pt-4 mb-4">
                <p class="font-semibold">{{ $comment->name }}</p>
                <p class="text-gray-600">{{ $comment->comment }}</p>
            </div>

            @auth
            <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja deletar este comentário?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-500 hover:underline">Excluir</button>
            </form>
            @endauth
            @empty
            <p>Seja o primeiro a comentar!</p>
            @endforelse
        </section>
    </article>
</x-templates.guest>