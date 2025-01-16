<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Zarządzanie Kategoriami
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('kategorie.create') }}" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700">
                        Dodaj Kategorię
                    </a>

                    <table class="table-auto w-full text-left border-collapse">
                        <thead>
                            <tr>
                                <th class="border-b-2 p-2">Nazwa Kategorii</th>
                                <th class="border-b-2 p-2">Akcje</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($kategorie as $kategoria)
                            <tr>
                                <td class="border-b-2 p-2">{{ $kategoria->kategoria }}</td>
                                <td class="border-b-2 p-2">
                                    <a href="{{ route('kategorie.edit', $kategoria->id) }}" class="text-blue-500 hover:underline">Edytuj</a>
                                    <form action="{{ route('kategorie.destroy', $kategoria->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Czy na pewno chcesz usunąć tę kategorię?')" class="text-red-500 hover:underline">
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
