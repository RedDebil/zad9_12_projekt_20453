<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nowe Zamówienie') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('orders.store') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label for="product_id" class="block text-sm font-medium text-gray-700">Wybierz Produkt</label>
                            <select name="product_id" id="product_id" class="block w-full border-gray-300 rounded-md shadow-sm">
                                @foreach($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->nazwa }} - {{ number_format($product->cena, 2) }} zł</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="quantity" class="block text-sm font-medium text-gray-700">Ilość</label>
                            <input type="number" name="quantity" id="quantity" value="1" min="1" class="block w-full border-gray-300 rounded-md shadow-sm">
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Typ Dostawy</label>
                            <div class="mt-2">
                                <label class="inline-flex items-center">
                                    <input type="radio" name="delivery_type" value="kurier" checked class="form-radio">
                                    <span class="ml-2">Kurier</span>
                                </label>
                                <label class="inline-flex items-center ml-6">
                                    <input type="radio" name="delivery_type" value="paczkomat" class="form-radio">
                                    <span class="ml-2">Paczkomat</span>
                                </label>
                            </div>
                        </div>

                        <div id="kurier-form" class="mb-4">
                            <h4 class="text-lg font-medium">Dane Adresowe (Kurier)</h4>
                            <div class="mt-2">
                                <input type="text" name="miejscowosc" placeholder="Miejscowość" class="block w-full mb-2 border-gray-300 rounded-md shadow-sm">
                                <input type="text" name="nazwa_ulicy" placeholder="Ulica" class="block w-full mb-2 border-gray-300 rounded-md shadow-sm">
                                <input type="text" name="nr_ulicy" placeholder="Numer ulicy" class="block w-full mb-2 border-gray-300 rounded-md shadow-sm">
                                <input type="text" name="nr_mieszkania" placeholder="Numer mieszkania" class="block w-full mb-2 border-gray-300 rounded-md shadow-sm">
                            </div>
                        </div>

                        <div id="paczkomat-form" class="mb-4 hidden">
                            <h4 class="text-lg font-medium">Wybierz Paczkomat</h4>
                            <div class="mt-2">
                                <select name="address_id" class="block w-full border-gray-300 rounded-md shadow-sm">
                                    @foreach($lockers as $locker)
                                        <option value="{{ $locker->id }}">
                                            {{ $locker->miejscowosc }}, {{ $locker->nazwa_ulicy }} {{ $locker->nr_ulicy }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-4">
                            <h4 class="text-lg font-medium">Wybierz Firmę Kurierską</h4>
                                <div class="mt-2">
                                    <select name="courier_id" class="block w-full border-gray-300 rounded-md shadow-sm">
                                        @foreach($couriers as $courier)
                                            <option value="{{ $courier->id }}">
                                                {{ $courier->nazwa }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                        </div>
                        
                        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700">
                            Złóż Zamówienie
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('input[name="delivery_type"]').forEach(input => {
            input.addEventListener('change', function() {
                document.getElementById('kurier-form').classList.toggle('hidden', this.value !== 'kurier');
                document.getElementById('paczkomat-form').classList.toggle('hidden', this.value !== 'paczkomat');
            });
        });
    </script>
</x-app-layout>
