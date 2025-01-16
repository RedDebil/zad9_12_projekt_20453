<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dodaj Firmę Kurierską
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('kurierzy.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="nazwa" class="block text-gray-700">Nazwa firmy</label>
                            <input type="text" id="nazwa" name="nazwa" value="{{ old('nazwa') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                        </div>

                        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700">
                            Zapisz
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
