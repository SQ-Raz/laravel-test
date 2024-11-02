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
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300 sm:rounded-lg mb-6 p-6">
        <div class="text-gray-900 dark:text-gray-100">
            <!-- Muestra el título del canal -->
            <a href="/dashboard/{{ $link->channel->slug }}"> 
                <span class="inline-block px-2 py-1 text-white text-sm font-semibold rounded"
                    style="background-color: {{ $link->channel->color }};">
                    {{ $link->channel->title }}
                </span> 
            </a>

            <!-- Título del link y contribuidor -->
            <h2 class="mt-2 text-lg font-semibold">{{$link->title}}</h2>
            <small>Contributed by: {{$link->creator->name}} {{$link->updated_at->diffForHumans()}}</small>

            <!-- Mostrar si el enlace está aprobado o pendiente -->
            <span class="inline-block px-2 py-1 text-white text-sm font-semibold rounded mt-2"
                style="background-color: {{ $link->approved ? 'green' : 'red' }};">
                {{ $link->approved ? 'Aprobado' : 'Pendiente' }}
            </span>

            <!-- Mostrar el número de votos y formulario de votación -->
            <div class="mt-4 flex items-center space-x-2">
                <span class="inline-block px-2 py-1 text-white text-sm font-semibold rounded border border-gray-300"
                    style="background-color: rgba(0, 0, 0, 0.6);"> <!-- Fondo oscuro para mejor contraste -->
                    Votos: {{ $link->users()->count() }}
                </span>

                <!-- Formulario de votación -->
                <form method="POST" action="/votes/{{$link->id}}">
                    @csrf
                    <button type="submit" 
                        class="px-4 py-2 rounded text-white {{ Auth::check() && Auth::user()->votedFor($link) ? 'bg-green-500 hover:bg-green-600' : 'bg-gray-500 hover:bg-gray-600' }} disabled:opacity-50"
                        {{ !Auth::user()->isTrusted() ? 'disabled' : '' }}>
                        Votar
                    </button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
    <div class="mt-4">
        {{$links->links()}}
    </div>
</div>
@endif
