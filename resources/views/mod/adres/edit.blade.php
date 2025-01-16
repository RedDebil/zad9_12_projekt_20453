<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edytuj adres') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if ($errors->any())
                        <div class="mb-4">
                            <ul class="text-red-500">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('mod.adres.update', $adres->id) }}">
                        @csrf
                        @method('PUT') <!-- Określamy, że to jest aktualizacja -->

                        <div class="mb-4">
                            <label for="miejscowosc" class="block text-sm font-medium text-gray-700">Miejscowość</label>
                            <input 
                                type="text" 
                                name="miejscowosc" 
                                id="miejscowosc" 
                                class="mt-1 block w-full" 
                                value="{{ old('miejscowosc', $adres->miejscowosc) }}" 
                                required
                                pattern="^[\p{L}\s\-]+$" 
                                title="Miejscowość może zawierać tylko litery, spacje i myślniki."
                            >
                        </div>

                        <div class="mb-4">
                            <label for="nazwa_ulicy" class="block text-sm font-medium text-gray-700">Nazwa ulicy</label>
                            <input 
                                type="text" 
                                name="nazwa_ulicy" 
                                id="nazwa_ulicy" 
                                class="mt-1 block w-full" 
                                value="{{ old('nazwa_ulicy', $adres->nazwa_ulicy) }}" 
                                required
                                pattern="^[\p{L}\s\-]+$" 
                                title="Nazwa ulicy może zawierać tylko litery, spacje i myślniki."
                            >
                        </div>

                        <div class="mb-4">
                            <label for="nr_ulicy" class="block text-sm font-medium text-gray-700">Numer ulicy</label>
                            <input 
                                type="number" 
                                name="nr_ulicy" 
                                id="nr_ulicy" 
                                class="mt-1 block w-full" 
                                required
                                value="{{ old('nr_ulicy', $adres->nr_ulicy) }}"
                                min="1" 
                                max="99999" 
                                title="Numer ulicy może zawierać tylko cyfry (maksymalnie 5 cyfr)."
                            >
                        </div>

                        <div class="mb-4">
                            <label for="nr_mieszkania" class="block text-sm font-medium text-gray-700">Numer mieszkania</label>
                            <input 
                                type="number" 
                                name="nr_mieszkania" 
                                id="nr_mieszkania" 
                                class="mt-1 block w-full" 
                                value="{{ old('nr_mieszkania', $adres->nr_mieszkania) }}"
                                min="1" 
                                max="99999" 
                                title="Numer mieszkania może zawierać tylko cyfry (maksymalnie 5 cyfr)."
                            >
                        </div>

                        <div class="flex items-center justify-between">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">
                                Zaktualizuj adres
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
