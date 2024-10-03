<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Community Contributions') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach ($links as $link)
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300 sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <li class="text-lg font-semibold hover:text-blue-600 transition-colors duration-300">
                        {{$link->title}}
                    </li>
                    <small>Contributed by: {{$link->creator->name}} {{$link->updated_at->diffForHumans()}}</small>
                </div>
            </div>
            @endforeach
            <div class="mt-4">
                {{$links->links()}}
            </div>
        </div>
    </div>
</x-app-layout>
