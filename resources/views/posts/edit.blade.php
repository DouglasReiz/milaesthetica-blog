<x-templates.guest>
    <div class="grid justify-items-center">
        <div class="px-10 w-3/6">

            @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div>
                    <label for="title" class="block font-medium text-lg text-gray-600"> Digite o Titulo</label>
                    <input id="title" value="{{ old('title', $post->title) }}" class="block mt-1 w-full rounded-md bg-white text-gray-800 shadow-sm border-gray-300 focus:border-orange-300 focus:ring focus:ring-orange-200 focus:ring-opacity-50" type="text" name="title" placeholder="Digite o titulo do Post" required>
                </div>
                <div class="mt-4">
                    <label for="content" class="block font-medium text-lg text-gray-600">Corpo do Post</label>
                    <textarea id="content" class="block mt-1 w-full rounded-md bg-white text-gray-800 shadow-sm border-gray-300 focus:border-orange-300 focus:ring focus:ring-orange-200 focus:ring-opacity-50" name="content" placeholder="Texto do Post" cols="35" rows="15">{{ old('content', $post->content) }}</textarea>
                </div>
                <div class="mt-4 mb-4">
                    <label for="image" class="block font-medium text-sm text-gray-600">Imagem</label>
                    <input id="image" class="block w-xs text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-700 focus:outline-none dark:bg-gray-100 dark:border-gray-600 dark:placeholder-gray-400" type="file" name="image">
                    <textarea name="user_id" id="User_id" class="block hidden mt-1 w-full rounded-md bg-white text-gray-800 shadow-sm border-gray-300 focus:border-orange-300 focus:ring focus:ring-orange-200 focus:ring-opacity-50">{{ auth()->id() }}</textarea>
                </div>

                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded mb-4">Atualizar</button>
            </form>
        </div>
    </div>
</x-templates.guest>