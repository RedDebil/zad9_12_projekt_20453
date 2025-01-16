<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Szczegóły produktu') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg mb-4">{{ $produkt->nazwa }}</h3>
                    <p><strong>Opis:</strong> {{ $produkt->opis }}</p>
                    <p><strong>Cena:</strong> {{ number_format($produkt->cena, 2) }} zł</p>
                    <p><strong>Kategoria:</strong> {{ $produkt->kategoria->kategoria ?? 'Brak kategorii' }}</p>
                    <p><strong>Dostawca:</strong> {{ $produkt->dostawca->nazwa ?? 'Brak dostawcy' }}</p>

                    <h4 class="font-semibold text-lg mt-6">Opinie</h4>
                    @if($produkt->opinie->isEmpty())
                        <p>Brak opinii dla tego produktu.</p>
                    @else
                        <ul class="mt-4">
                            @foreach ($produkt->opinie as $opinia)
                                <li class="border-b py-4">
                                    <p><strong>Autor:</strong> {{ $opinia->user->name ?? 'Anonim' }}</p>
                                    <p><strong>Ocena:</strong> {{ $opinia->ocena }} / 5</p>
                                    <p><strong>Komentarz:</strong> {{ $opinia->komentarz }}</p>
                                    <p class="text-sm text-gray-500"><strong>Data dodania:</strong> {{ $opinia->created_at->format('d-m-Y H:i') }}</p>

                                    <!-- Dodanie przycisków edycji i usuwania tylko dla właściciela opinii -->
                                    @if (auth()->check() && auth()->id() === $opinia->users_id)
                                        <div class="mt-2">
                                            <a href="{{ route('opinie.edit', $opinia->id) }}" class="text-blue-500 hover:underline">Edytuj</a>
                                            <form action="{{ route('opinie.destroy', $opinia->id) }}" method="POST" class="inline-block ml-2">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:underline" onclick="return confirm('Czy na pewno chcesz usunąć tę opinię?')">Usuń</button>
                                            </form>
                                        </div>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-4">
                <div class="p-6 text-gray-900">
                    <!-- Link do formularza dodawania produktu -->
                    <a href="{{ route('produkty.index') }}" class="text-blue-500 hover:underline">
                        Wróć do przeglądywania produktów
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
