<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dodaj Nowy Produkt') }}
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

                    <form action="{{ route('produkty.store') }}" method="POST">
                        @csrf
                        <!-- Formularz do dodania produktu -->
                        <div class="mb-4">
                            <label for="nazwa" class="block text-sm font-medium text-gray-700">Nazwa produktu</label>
                            <input type="text" name="nazwa" id="nazwa" class="mt-1 block w-full" required>
                        </div>

                        <div class="mb-4">
                            <label for="opis" class="block text-sm font-medium text-gray-700">Opis produktu</label>
                            <textarea name="opis" id="opis" class="mt-1 block w-full" required></textarea>
                        </div>

                        <div class="mb-4">
                            <label for="cena" class="block text-sm font-medium text-gray-700">Cena produktu</label>
                            <input 
                                type="text" 
                                name="cena" 
                                id="cena" 
                                class="mt-1 block w-full" 
                                required 
                                pattern="^\d+([.,]\d{1,2})?$" 
                                title="Cena może zawierać tylko liczby z opcjonalnym separatorem dziesiętnym (np. 10, 10.50, 10,50)." 
                                value="{{ old('cena') }}">
                        </div>

                        <div class="mb-4">
                            <label for="kategoria_id" class="block text-sm font-medium text-gray-700">Kategoria</label>
                            <select name="kategoria_id" id="kategoria_id" class="mt-1 block w-full" required>
                                <option value="">Wybierz kategorię</option>
                                @foreach($kategorie as $kategoria)
                                    <option value="{{ $kategoria->id }}">{{ $kategoria->kategoria }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="dostawca_id" class="block text-sm font-medium text-gray-700">Dostawca</label>
                            <select name="dostawca_id" id="dostawca_id" class="mt-1 block w-full" required>
                                <option value="">Wybierz dostawcę</option>
                                @foreach($dostawcy as $dostawca)
                                    <option value="{{ $dostawca->id }}">{{ $dostawca->nazwa }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Dodaj Produkt</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
