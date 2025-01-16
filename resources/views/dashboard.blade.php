<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Jesteś zalogowany jako klient!") }}
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-4">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg text-gray-800 leading-tight mb-4">Zarządzaj zamówieniami</h3>

                    <!-- Link do formularza dodawania produktu -->
                    <a href="{{ route('orders.create') }}" class="text-blue-500 hover:underline">
                        Dodaj nowe zamówienie
                    </a>
                    <h3 class="font-semibold text-lg text-gray-800 leading-tight mb-4"></h3>
                    <a href="{{ route('orders.index') }}" class="text-blue-500 hover:underline">
                        Przejrzyj zamówienia
                    </a>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-4">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg text-gray-800 leading-tight mb-4">
                        <a href="{{ route('produkty.index') }}" class="text-blue-500 hover:underline">
                            Przejrzyj produkty
                        </a>
                    </h3>

                    <!-- Link do formularza dodawania produktu -->
                    
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
