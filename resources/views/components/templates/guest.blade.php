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

    <section class="container mx-auto px-4 py-8 grid gap-10 md:grid-cols-2 lg:grid-cols-3">
        <div class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transition duration-300">
            <div class="grid md:grid-cols-3 sm:grid-cols-2 gap-10">
                <div class="font-sans text-gray-900 antialiased">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </section>
</body>

</html>