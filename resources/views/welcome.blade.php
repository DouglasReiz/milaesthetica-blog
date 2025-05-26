<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('partials.head')
</head>

<body class="bg-[#f9f5ee] text-[#222] font-sans">
    <header class="bg-white shadow-md sticky top-0 z-50">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <a href="/" class="text-xl font-bold">Camilla Scarani</a>
            <nav class="space-x-4 text-sm font-medium">
                <a href="/" class="text-gray-700 hover:text-black">Início</a>
                <a href="/blog" class="text-gray-700 hover:text-black">Blog</a>
                <a href="/contato" class="text-gray-700 hover:text-black">Contato</a>
            </nav>
        </div>
    </header>
    <section class="text-center py-16 px-4">
        <h1 class="text-4xl md:text-5xl font-semibold leading-tight mb-4">Blog da Brigitte</h1>
        <p class="text-lg md:text-xl text-gray-600 max-w-2xl mx-auto">Conteúdos exclusivos sobre beleza, bem-estar e autoestima para você se sentir ainda mais confiante!</p>
    </section>

    <section>


        <div class="max-w-6xl mx-auto">
            <h1 class="text-4xl font-light text-center text-gray-800 mb-12">Blog da Brigitte</h1>

            <div class="grid md:grid-cols-3 sm:grid-cols-2 gap-10">
                @foreach ($posts as $post)
                <div class="bg-white rounded-lg shadow-md overflow-hidden group transition-transform duration-300 hover:-translate-y-1">
                    <a href="">
                        <div class="relative">
                            <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" class="w-full h-60 object-cover group-hover:scale-105 transition-transform duration-300">
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
                </div>
                @endforeach
            </div>
        </div>


    </section>
</body>

</html>