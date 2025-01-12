<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Twoje Zamówienia') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (session('success'))
                        <div class="bg-green-100 text-green-800 p-4 mb-4 rounded">
                            {{ session('success') }}
                        </div>
                    @endif
                    <h3 class="font-semibold text-lg mb-4">Lista Zamówień</h3>
                    @if($orders->isEmpty())
                        <p>Nie masz jeszcze żadnych zamówień.</p>
                    @else
                        <table class="table-auto w-full text-left border-collapse">
                            <thead>
                                <tr>
                                    <th class="border-b-2 p-2">#</th>
                                    <th class="border-b-2 p-2">Produkt</th>
                                    <th class="border-b-2 p-2">Ilość</th>
                                    <th class="border-b-2 p-2">Cena</th>
                                    <th class="border-b-2 p-2">Status</th>
                                    <th class="border-b-2 p-2">Miejscowość</th>
                                    <th class="border-b-2 p-2">Nazwa Ulicy</th>
                                    <th class="border-b-2 p-2">Numer Domu</th>
                                    <th class="border-b-2 p-2">Numer mieszkania</th>
                                    <th class="border-b-2 p-2">Typ Dostawy</th>
                                    <th class="border-b-2 p-2">Firma Kurierska</th>
                                    <th class="border-b-2 p-2">Akcja</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($orders as $order)
                                @foreach ($order->products as $product)
                                    <tr>
                                        <td class="border-b p-2">{{ $loop->parent->iteration }}</td>
                                        <td class="border-b p-2">{{ $product->nazwa }}</td>
                                        <td class="border-b p-2">{{ $product->pivot->ilosc }}</td>
                                        <td class="border-b p-2">{{ number_format($product->cena * $product->pivot->ilosc, 2) }} zł</td>
                                        <td class="border-b p-2">
                                            @if($order->status == 'zrealizowane')
                                                <span class="text-green-600 font-semibold">Zakończone</span>
                                            @elseif($order->status == 'w trakcie')
                                                <span class="text-yellow-600 font-semibold">W trakcie realizacji</span>
                                            @elseif($order->status == 'odwołany')
                                                <span class="text-red-600 font-semibold">Anulowane</span>
                                            @else
                                                <span class="text-gray-500">Brak statusu</span>
                                            @endif
                                        </td>
                                        <td class="border-b p-2">{{ $order->adres->miejscowosc }}</td>
                                        <td class="border-b p-2">{{ $order->adres->nazwa_ulicy }}</td>
                                        <td class="border-b p-2">{{ $order->adres->nr_ulicy }}</td>
                                        <td class="border-b p-2">{{ $order->adres->nr_mieszkania }}</td>
                                        <td class="border-b p-2">{{ $order->adres->typ_adresu }}</td>
                                        <td class="border-b p-2">{{ $order->kurier->nazwa }}</td>
                                        <td class="border-b p-2">
                                            @if ($order->status === 'zrealizowane')
                                                <button 
                                                    onclick="openReviewModal('{{ $product->id }}', '{{ $order->id }}')"
                                                    class="bg-green-500 text-white px-4 py-2 rounded">
                                                    Dodaj opinię
                                                </button>
                                            @elseif ($order->status === 'w trakcie')
                                                <button 
                                                    onclick="confirmAction('{{ route('orders.update-status', ['order' => $order->id, 'status' => 'odwołany']) }}')"
                                                    class="bg-red-500 text-white px-4 py-2 rounded">
                                                    Anuluj zamówienie
                                                </button>
                                            @else
                                                <span class="text-gray-500">Brak akcji</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>

                <div id="confirmation-modal" class="hidden fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center z-50">
                    <div class="bg-white rounded-lg shadow-lg p-6 w-96">
                        <h2 class="text-lg font-semibold mb-4">Potwierdzenie akcji</h2>
                        <p class="text-gray-700 mb-4">Czy na pewno chcesz wykonać tę akcję?</p>
                        <div class="flex justify-end">
                            <button id="cancel-button" class="bg-gray-300 text-gray-800 px-4 py-2 rounded mr-2">
                                Anuluj
                            </button>
                            <a id="confirm-button" href="#" class="bg-red-500 text-white px-4 py-2 rounded">
                                Potwierdź
                            </a>
                        </div>
                    </div>
                </div>

                <div id="review-modal" class="hidden fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center z-50">
                    <div class="bg-white rounded-lg shadow-lg p-6 w-96">
                        <h2 class="text-lg font-semibold mb-4">Dodaj opinię</h2>
                        <form id="review-form" action="{{ route('opinie.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" id="product_id">
                            <input type="hidden" name="order_id" id="order_id">
                            
                            <div class="flex mb-4">
                                <label for="ocena" class="mr-2">Ocena:</label>
                                <select name="ocena" id="ocena" class="p-2 border rounded">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="komentarz" class="mr-2">Komentarz:</label>
                                <textarea name="komentarz" id="komentarz" class="p-2 border rounded w-full" rows="4"></textarea>
                            </div>
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Zapisz opinię</button>
                            <button type="button" id="close-modal" class="bg-gray-300 text-gray-800 px-4 py-2 rounded ml-2">
                                Anuluj
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    function confirmAction(url) {
        const modal = document.getElementById('confirmation-modal');
        const confirmButton = document.getElementById('confirm-button');
        const cancelButton = document.getElementById('cancel-button');
        
        confirmButton.href = url;
        modal.classList.remove('hidden');

        cancelButton.addEventListener('click', () => {
            modal.classList.add('hidden');
        });
    }

    function openReviewModal(productId, orderId) {
        document.getElementById('product_id').value = productId;
        document.getElementById('order_id').value = orderId;

        document.getElementById('review-modal').classList.remove('hidden');
    }

    document.getElementById('close-modal').addEventListener('click', function() {
        document.getElementById('review-modal').classList.add('hidden');
    });
</script>
