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
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
