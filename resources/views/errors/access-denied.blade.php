<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Brak dostępu') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-medium text-red-600">
                        {{ __('Nie masz uprawnień do korzystania z tej funkcjonalności.') }}
                    </h3>
                    <p class="mt-4 text-gray-700">
                        Przepraszamy, ale nie masz odpowiednich uprawnień, aby uzyskać dostęp do tej części aplikacji.
                    </p>
                    <a href="{{ route('dashboard') }}"
                        class="mt-6 inline-block bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                        {{ __('Powrót na stronę główną') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
