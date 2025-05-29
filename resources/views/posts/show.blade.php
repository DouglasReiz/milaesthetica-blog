<x-templates.guest>
    <div class="flex flex-col gap-6 max-w-4xl mx-auto px-4 py-16">
        {{-- Título --}}
        <h1 class="text-4xl font-bold mb-4 text-gray-900">{{ $post->title }}</h1>

        {{-- Data de publicação (opcional) --}}
        <p class="text-sm text-gray-500 mb-6">
            Publicado em {{ $post->created_at->format('d/m/Y') }}
        </p>

        {{-- Imagem de capa (opcional) --}}
        @if($post->image)
        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-full rounded-lg mb-8 shadow">
        @endif

        {{-- Conteúdo --}}
        <div class="prose max-w-none prose-lg">
            {!! $post->content !!}
        </div>
    </div>
</x-templates.guest>