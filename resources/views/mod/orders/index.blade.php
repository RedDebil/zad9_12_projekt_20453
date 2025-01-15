<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Zarządzaj Zamówieniami') }}
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
                        <p>Nie znaleziono zamówień.</p>
                    @else
                        <table class="table-auto w-full text-left border-collapse">
                            <thead>
                                <tr>
                                    <th class="border-b-2 p-2">#</th>
                                    <th class="border-b-2 p-2">Klient</th>
                                    <th class="border-b-2 p-2">Produkt</th>
                                    <th class="border-b-2 p-2">Status</th>
                                    <th class="border-b-2 p-2">Akcja</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td class="border-b p-2">{{ $loop->iteration }}</td>
                                        <td class="border-b p-2">{{ $order->user->name }}</td>
                                        <td class="border-b p-2">
                                            @foreach ($order->products as $product)
                                                {{ $product->nazwa }} (x{{ $product->pivot->ilosc }})<br>
                                            @endforeach
                                        </td>
                                        <td class="border-b p-2">
                                            @if($order->status == 'zrealizowane')
                                                <span class="text-green-600 font-semibold">Zakończone</span>
                                            @elseif($order->status == 'w trakcie')
                                                <span class="text-yellow-600 font-semibold">W trakcie realizacji</span>
                                            @elseif($order->status == 'odwołany')
                                                <span class="text-red-600 font-semibold">Anulowane</span>
                                            @endif
                                        </td>
                                        <td class="border-b p-2">
                                            <form method="POST" action="{{ route('mod.orders.updateStatus', $order) }}">
                                                @csrf
                                                <select name="status" class="border rounded p-2 mr-2">
                                                    <option value="w trakcie" {{ $order->status === 'w trakcie' ? 'selected' : '' }}>W trakcie</option>
                                                    <option value="zrealizowane" {{ $order->status === 'zrealizowane' ? 'selected' : '' }}>Zrealizowane</option>
                                                    <option value="odwołany" {{ $order->status === 'odwołany' ? 'selected' : '' }}>Odwołane</option>
                                                </select>
                                                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
                                                    Zmień
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
