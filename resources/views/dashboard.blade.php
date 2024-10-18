<x-app-layout>
    @if (session('status'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">¡Atención!</strong>
        <span class="block sm:inline">{{ session('status') }}</span>
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
            <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" onclick="this.parentElement.parentElement.style.display='none';">
                <title>Cerrar</title>
                <path d="M14.348 14.849a1 1 0 01-1.415 0L10 11.414l-2.933 2.935a1 1 0 01-1.415-1.415L8.586 10 5.65 7.065a1 1 0 011.415-1.415L10 8.586l2.933-2.936a1 1 0 011.415 1.415L11.414 10l2.935 2.935a1 1 0 010 1.414z" />
            </svg>
        </span>
    </div>
    @endif

    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Community Contributions') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">

                <x-community-links :links="$links" />


                <div class="lg:col-span-1">
                    <x-community-add-link :channels="$channels" />
                </div>

            </div>
        </div>
    </div>
</x-app-layout>