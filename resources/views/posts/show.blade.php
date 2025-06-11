<x-templates.guest>
    <article class="max-w-4xl mx-auto px-4 py-16 text-gray-900">

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
        <div class="mt-12">
            <a href="{{ route('posts.index') }}"
                class="inline px-6 py-2 border border-gray-300 rounded hover:bg-gray-100 text-sm">
                ← Voltar ao blog
            </a>
        </div>

        {{-- Botão Editar --}}
        <div class="mt-12">
            <a href="{{ route('posts.edit', $post->id) }}"
                class="inline px-6 py-2 border border-gray-300 rounded hover:bg-gray-100 text-sm">
                Editar 
            </a>
        </div>
    </article>
</x-templates.guest>