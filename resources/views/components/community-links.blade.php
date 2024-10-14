<!-- Links list (occupies 3/4 of the grid in large screens) -->
@props(['links'])   
@if ($links->isEmpty())
    <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 rounded-lg shadow-md">
        <p class="font-bold">Sin contribuciones</p>
        <p>No hay contribuciones disponibles en este momento. ¡Vuelve más tarde para ver nuevas publicaciones!</p>
    </div>
@else
    <div class="lg:col-span-3">
        @foreach ($links as $link)
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300 sm:rounded-lg mb-6">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <span class="inline-block px-2 py-1 text-white text-sm font-semibold rounded"
                    style="background-color: {{ $link->channel->color }}">
                    {{ $link->channel->title }}
                </span>
                {{$link->title}}
                <small>Contributed by: {{$link->creator->name}} {{$link->updated_at->diffForHumans()}}</small>
            </div>
        </div>
        @endforeach
        <div class="mt-4">
            {{$links->links()}}
        </div>
    </div>
@endif




