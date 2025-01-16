<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Lista Adresów - Paczkomat
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg text-gray-800 leading-tight mb-4">Zarządzaj Paczkomatami</h3>
                    <a href="{{ route('mod.adres.create') }}" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700">
                        Dodaj Adres
                    </a>
                    <table class="table-auto w-full text-left border-collapse">
                        <thead>
                            <tr>
                                <th class="border-b-2 p-2">Miejscowość</th>
                                <th class="border-b-2 p-2">Ulica</th>
                                <th class="border-b-2 p-2">Nr Ulicy</th>
                                <th class="border-b-2 p-2">Nr Mieszkania</th>
                                <th class="border-b-2 p-2">Typ Adresu</th>
                                <th class="border-b-2 p-2">Akcje</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($adresy as $adres)
                            <tr>
                                <td class="border-b-2 p-2">{{ $adres->miejscowosc }}</td>
                                <td class="border-b-2 p-2">{{ $adres->nazwa_ulicy }}</td>
                                <td class="border-b-2 p-2">{{ $adres->nr_ulicy }}</td>
                                <td class="border-b-2 p-2">{{ $adres->nr_mieszkania ?? 'Brak' }}</td>
                                <td class="border-b-2 p-2">{{ $adres->typ_adresu }}</td>
                                <td class="border-b-2 p-2">
                                    <a href="{{ route('mod.adres.edit', $adres->id) }}" class="text-blue-500 hover:underline">Edytuj</a>
                                    <form action="{{ route('mod.adres.destroy', $adres->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                            onclick="return confirm('Czy na pewno chcesz usunąć ten adres?')" 
                                            class="text-red-500 hover:underline">
                                            Usuń
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
