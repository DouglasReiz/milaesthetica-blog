<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('partials.head')
</head>

<body class="bg-[#f9f5ee] text-[#222] font-sans">
    <header class="bg-amber-50 shadow-md sticky top-0 z-50">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <a href="/" class=" ml-4 sm:ml-0 text-xl font-bold"><img src="{{ asset($logo->logo_path) }}" alt="Camilla Scarani"
                    class="h-20"></a>
            <nav class="space-x-4 text-sm font-medium">
                <a href="/" class="text-gray-700 hover:text-black">Início</a>
                <a href="/blog" class="text-gray-700 hover:text-black">Blog</a>
                <a href="/contato" class="text-gray-700 hover:text-black">Contato</a>
            </nav>
        </div>
    </header>
    <section class="text-center py-16 px-4">
        <h1 class="text-4xl md:text-5xl font-semibold leading-tight mb-4">Blog da Camilla</h1>
        <p class="text-lg md:text-xl text-gray-600 max-w-2xl mx-auto">Conteúdos exclusivos sobre beleza, bem-estar e autoestima para você se sentir ainda mais confiante!</p>
    </section>

    <section>


        <div class="max-w-6xl mx-auto">

            <div class="">
                @foreach ($posts as $post)
                <div class="bg-white shadow-md overflow-hidden">
                    <article class="max-w-4xl mx-auto px-4 py-16 text-gray-900">

                        {{-- Capa do Post --}}
                        @if($post->image)
                        <div class="mb-10">
                            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-full h-auto rounded-md shadow-lg">
                        </div>
                        @endif

                        {{-- Título --}}
                        <a href="{{ route('posts.show', $post->id) }}"><h1 class="text-4xl font-bold mb-4 leading-tight">{{ $post->title }}</h1></a>



                        {{-- Autor e Data --}}
                        <div class="mb-10 text-sm text-gray-500">
                            Publicado em {{ $post->created_at->format('d/m/Y') }}
                        </div>

                        {{-- Conteúdo do Post --}}
                        <div class="prose prose-lg max-w-none">
                            {!! $post->content !!}
                        </div>
                    </article>
                </div>
                @endforeach
            </div>
        </div>

        <footer class="bg-gray-900 text-white mt-10">
            <div class="py-8">
                <div class="max-w-6xl mx-auto px-4 flex flex-col md:flex-row justify-between items-start md:items-center">
                    <a href="/" class="mb-4 md:mb-0">
                        @if ($logo)
                        <img src="{{ asset($logo->logo_path) }}" alt="Logo" class="h-12 w-auto">
                        @else
                        <span class="text-xl font-bold">Blog</span>
                        @endif
                    </a>

                    <ul class="flex flex-col md:flex-row gap-4 text-sm text-gray-300">
                        <li><a href="/cursos/" class="hover:text-white transition">AGENDA DE CURSOS</a></li>
                        <li><a href="https://cursos.brigittecalegari.com.br/" class="hover:text-white transition" target="_blank">CURSOS ONLINE</a></li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-gray-700 py-6">
                <div class="max-w-6xl mx-auto px-4 flex flex-col md:flex-row items-center justify-between space-y-4 md:space-y-0">
                    <div class="flex space-x-4">
                        <a href="https://www.instagram.com/brigittecalegari" target="_blank" class="text-gray-400 hover:text-white text-xl">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="https://www.facebook.com/AtelieBrigitteCalegari" target="_blank" class="text-gray-400 hover:text-white text-xl">
                            <i class="fab fa-facebook"></i>
                        </a>
                    </div>

                    <p class="text-xs text-gray-400 text-center md:text-left">
                        <a href="mailto:contato@brigittecalegari.com.br" class="hover:underline">contato@brigittecalegari.com.br</a>
                        &nbsp;/&nbsp;
                        (44) 3023 7767
                    </p>

                    <div class="flex items-center space-x-2 text-xs text-gray-500">
                        <a href="http://bloquo.cc" target="_blank" class="hover:text-white">bloquo.cc</a>
                        <span>|</span>
                        <p class="text-xs">TODOS OS DIREITOS RESERVADOS</p>
                    </div>
                </div>
            </div>
        </footer>

    </section>
</body>

</html>