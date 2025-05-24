<x-layouts.app :title="__('Posts')">
    <div class="max-w-6xl mx-auto px-4 py-10">
        <h1 class="text-3xl font-bold mb-6">Últimas Postagens</h1>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($posts as $post)
            <!-- defini rota postshow depois -->
            <a href="" class="bg-white shadow rounded-lg overflow-hidden hover:shadow-lg transition">
                @if ($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" class="w-full h-48 object-cover">
                @endif
                <div class="p-4">
                    <h2 class="text-xl font-semibold">{{ $post->title }}</h2>
                    <h2 class="text-xl font-semibold">{{ $user?->name }}</h2>
                    <p class="text-gray-600 text-sm mt-2">{{ $post->excerpt ?? Str::limit(strip_tags($post->content), 100) }}</p>
                </div>
            </a>
            @endforeach
        </div>

        <div class="mt-8">

        </div>
    </div>
</x-layouts.app>