<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edytuj opinię') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('opinie.update', $opinia->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Pole oceny -->
                        <div class="mb-4">
                            <label for="ocena" class="block text-sm font-medium text-gray-700">Ocena</label>
                            <select id="ocena" name="ocena" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-500">
                                @for ($i = 1; $i <= 5; $i++)
                                    <option value="{{ $i }}" {{ $opinia->ocena == $i ? 'selected' : '' }}>{{ $i }}</option>
                                @endfor
                            </select>
                        </div>

                        <!-- Pole komentarza -->
                        <div class="mb-4">
                            <label for="komentarz" class="block text-sm font-medium text-gray-700">Komentarz</label>
                            <textarea id="komentarz" name="komentarz" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-500">{{ $opinia->komentarz }}</textarea>
                        </div>

                        <div class="flex justify-end">
                            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Zapisz</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
