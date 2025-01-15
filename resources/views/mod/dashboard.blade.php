<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Pracownika') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Jesteś zalogowany jako pracownik!") }}
                </div>
            </div>

            <!-- Produkty Section -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-4">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg text-gray-800 leading-tight mb-4">Zarządzaj produktami</h3>

                    <!-- Link do formularza dodawania produktu -->
                    <a href="{{ route('produkty.create') }}" class="text-blue-500 hover:underline">
                        Dodaj nowy produkt
                    </a>
                    <h3 class="font-semibold text-lg text-gray-800 leading-tight mb-4"></h3>
                    <a href="{{ route('mod.produkty.index') }}" class="text-blue-500 hover:underline">
                        Przejdź do produktów
                    </a>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-4">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg text-gray-800 leading-tight mb-4">Zarządzaj adresami</h3>

                    <!-- Link do formularza dodawania adresu -->
                    <a href="{{ route('adres.create') }}" class="text-blue-500 hover:underline">
                        Dodaj nowy paczkomat
                    </a>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-4">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg text-gray-800 leading-tight mb-4">Zarządzaj zamówieniami</h3>
                    <a href="{{ route('mod.orders.index') }}" class="text-blue-500 hover:underline">
                        Przejdź do zamówień
                    </a>
                </div>
            </div>
            
        </div>
    </div>
</x-app-layout>
