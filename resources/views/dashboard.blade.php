<x-layouts.app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
            <div class="relative aspect-video overflow-hidden text-center hover:shadow-xl transition-shadow duration-300 rounded-xl border border-neutral-200 dark:border-green-700">
                <div class="p-8">
                    <h2 class="text-xl font-medium text-gray-600 uppercase tracking-wide mb-2">Posts Criados:</h2>
                    <h1 class="text-9xl font-extrabold text-green-600 p-8">{{ $totalPosts }}</h1>
                </div>
            </div>
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-fuchsia-700 text-center hover:shadow-xl transition-shadow duration-300 rounded-xl">
                <div class="p-8">
                    <h2 class="text-xl font-medium text-gray-600 uppercase tracking-wide mb-2">Comentários compartilhados:</h2>
                    <h1 class="text-9xl font-extrabold text-fuchsia-600 p-8">{{ $totalcomments }}</h1>
                </div>
            </div>
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-blue-700 text-center hover:shadow-xl transition-shadow duration-300 rounded-xl">
                <div class="p-8">
                    <h2 class="text-xl font-medium text-gray-600 uppercase tracking-wide mb-2">Total de Visitas:</h2>
                    <h1 class="text-9xl font-extrabold text-blue-600 p-8">{{ $total }}</h1>
                </div>
            </div>
        </div>
        <div class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-yellow-700">
            <table class="w-full table-auto relative flex-1 overflow-hidden rounded-xl border border-yellow-700">
                <thead class="bg-yellow-700">
                    <tr>
                        <th class="border px-4 py-2 text-left">Data</th>
                        <th class="border px-4 py-2 text-left">Total de Acessos</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($visitsPerDay as $visit)
                    <tr class="hover:bg-gray-600">
                        <td class="border px-4 py-2 text-black hover:text-white">{{ \Carbon\Carbon::parse($visit->date)->format('d/m/Y') }}</td>
                        <td class="border px-4 py-2 text-black hover:text-white">{{ $visit->total }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.app>