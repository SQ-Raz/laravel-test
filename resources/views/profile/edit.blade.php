<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-4">
            <!-- Mostrar imagen de perfil si existe -->
            @if(Auth::user()->image)
            <img src="{{ asset('storage/' . Auth::user()->image) }}" alt="Profile Image" class="h-12 w-12 rounded-full">
            @else
            <!-- Imagen de respaldo si el usuario no tiene una imagen cargada -->
            <img src="{{ asset('images/logo_community_links.png') }}" alt="Default Profile Image" class="h-12 w-12 rounded-full">
            @endif

            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Profile') }}
            </h2>
        </div>
    </x-slot>

    <!-- Resto del contenido de la vista -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-image-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>