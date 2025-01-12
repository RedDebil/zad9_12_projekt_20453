<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Produkty') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-6">
                        <form method="GET" action="{{ route('produkty.index') }}" class="flex items-center space-x-4">
                            <div>
                                <label for="kategoria" class="block text-sm font-medium text-gray-700">Filtruj według kategorii</label>
                                <select name="kategoria" id="kategoria" class="mt-1 block w-full pl-3 pr-10 py-2 border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <option value="">Wszystkie</option>
                                    @foreach ($kategorie as $kategoria)
                                        <option value="{{ $kategoria->id }}" {{ $kategoriaId == $kategoria->id ? 'selected' : '' }}>
                                            {{ $kategoria->kategoria }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Filtruj
                                </button>
                            </div>
                        </form>
                    </div>
                    <h3 class="font-semibold text-lg mb-4">Lista Produktów</h3>
                    @if($produkty->isEmpty())
                        <p>Brak dostępnych produktów.</p>
                    @else
                        <table class="table-auto w-full text-left border-collapse">
                            <thead>
                                <tr>
                                    <th class="border-b-2 p-2">#</th>
                                    <th class="border-b-2 p-2">Nazwa</th>
                                    <th class="border-b-2 p-2">Opis</th>
                                    <th class="border-b-2 p-2">Cena</th>
                                    <th class="border-b-2 p-2">Kategoria</th>
                                    <th class="border-b-2 p-2">Dostawca</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($produkty as $produkt)
                                    <tr>
                                        <td class="border-b p-2">{{ $loop->iteration }}</td>
                                        <td class="border-b p-2">{{ $produkt->nazwa }}</td>
                                        <td class="border-b p-2">{{ $produkt->opis }}</td>
                                        <td class="border-b p-2">{{ number_format($produkt->cena, 2) }} zł</td>
                                        <td class="border-b p-2">{{ $produkt->kategoria->kategoria ?? 'Brak kategorii' }}</td>
                                        <td class="border-b p-2">{{ $produkt->dostawca->nazwa ?? 'Brak dostawcy' }}</td>
                                        <td class="border-b p-2">
                                            <a href="{{ route('produkty.show', $produkt->id) }}" class="text-indigo-600 hover:text-indigo-900">
                                                Zobacz szczegóły
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
