<!-- Links list (occupies 3/4 of the grid in large screens) -->
<div class="lg:col-span-3">
    @foreach ($links as $link)
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300 sm:rounded-lg mb-6">
        <div class="p-6 text-gray-900 dark:text-gray-100">
            <span class="inline-block px-2 py-1 text-white text-sm font-semibold rounded"
                style="background-color: {{ $link->channel->color }}">
                {{ $link->channel->title }}
            </span>
            <small>Contributed by: {{$link->creator->name}} {{$link->updated_at->diffForHumans()}}</small>
        </div>
    </div>
    @endforeach
    <div class="mt-4">
        {{$links->links()}}
    </div>
</div>
@props(['links'])