<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edytuj Kategorię
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('kategorie.update', $kategoria->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div>
                            <label for="kategoria" class="block text-sm font-medium text-gray-700">Nazwa Kategorii</label>
                            <input type="text" name="kategoria" id="kategoria" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ $kategoria->kategoria }}" required>
                        </div>

                        <div class="mt-6">
                            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700">
                                Zaktualizuj Kategorię
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
