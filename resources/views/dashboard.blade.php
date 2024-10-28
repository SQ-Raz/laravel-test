<x-app-layout>

    <x-flash-alert />

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