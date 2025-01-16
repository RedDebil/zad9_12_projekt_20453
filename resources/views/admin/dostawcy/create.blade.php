<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dodaj Nowego Dostawcę
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('dostawcy.store') }}" method="POST">
                        @csrf
                        <div>
                            <label for="nazwa" class="block text-sm font-medium text-gray-700">Nazwa Dostawcy</label>
                            <input type="text" name="nazwa" id="nazwa" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                        </div>

                        <div class="mt-4">
                            <label for="nr_telefonu" class="block text-sm font-medium text-gray-700">Numer Telefonu</label>
                            <input type="text" name="nr_telefonu" id="nr_telefonu" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                        </div>

                        <div class="mt-6">
                            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700">
                                Dodaj Dostawcę
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
