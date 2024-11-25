<x-app-layout>

    <x-flash-alert />

    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Community Contributions') }}
        </h2>

        <ul class="flex space-x-4 mt-4">

            @if (session('token'))
            <p>Token: {{ session('token') }}</p>
            @endif
    
            <li>
                <a class="px-4 py-2 rounded-lg {{ request()->exists('popular') ? 'text-blue-500 hover:text-blue-700' : 'text-gray-500 cursor-not-allowed' }}"
                    href="{{ route('dashboard', ['channel' => request('channel')]) }}">
                    Most recent
                </a>
            </li>
            <li>
                <a class="px-4 py-2 rounded-lg {{ request()->exists('popular') ? 'text-gray-500 cursor-not-allowed' : 'text-blue-500 hover:text-blue-700' }}"
                    href="{{ route('dashboard', ['popular' => true, 'channel' => request('channel')]) }}">
                    Most popular
                </a>
            </li>
        </ul>
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