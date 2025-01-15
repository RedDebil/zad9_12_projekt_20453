<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Opinie dla produktu: ') . $produkt->nazwa }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h4 class="font-semibold text-lg mt-6">Opinie</h4>
                        @if($produkt->opinie->isEmpty())
                            <p>Brak opinii dla tego produktu.</p>
                        @else
                            <ul class="mt-4">
                                @foreach ($opinie as $opinia)
                                    <li class="border-b py-4">
                                        <p><strong>Autor:</strong> {{ $opinia->user->name ?? 'Anonim' }}</p>
                                        <p><strong>Ocena:</strong> {{ $opinia->ocena }} / 5</p>
                                        <p><strong>Komentarz:</strong> {{ $opinia->komentarz }}</p>
                                        <p class="text-sm text-gray-500"><strong>Data dodania:</strong> {{ $opinia->created_at->format('d-m-Y H:i') }}</p>
                                        <div class="mt-2">
                                        <form action="{{ route('mod.opinie.destroy', $opinia->id) }}" method="POST" class="inline-block ml-2">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:underline" onclick="return confirm('Czy na pewno chcesz usunąć tę opinię?')">Usuń</button>
                                        </form>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    <a href="{{ route('mod.produkty.index') }}" class="mt-4 inline-block text-indigo-600 hover:text-indigo-900">Powrót do listy produktów</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
