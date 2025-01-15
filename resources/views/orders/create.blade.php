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
                                <div class="mb-4">
                                    <label for="miejscowosc" class="block text-sm font-medium text-gray-700">Miejscowość</label>
                                    <input 
                                        type="text" 
                                        name="miejscowosc" 
                                        id="miejscowosc" 
                                        placeholder="Miejscowość" 
                                        class="block w-full border-gray-300 rounded-md shadow-sm" 
                                        required
                                        pattern="^[\p{L}\s\-]+$" 
                                        title="Miejscowość może zawierać tylko litery, spacje i myślniki."
                                    >
                                </div>

                                <div class="mb-4">
                                    <label for="nazwa_ulicy" class="block text-sm font-medium text-gray-700">Ulica</label>
                                    <input 
                                        type="text" 
                                        name="nazwa_ulicy" 
                                        id="nazwa_ulicy" 
                                        placeholder="Ulica" 
                                        class="block w-full border-gray-300 rounded-md shadow-sm" 
                                        required
                                        pattern="^[\p{L}\s\-]+$" 
                                        title="Nazwa ulicy może zawierać tylko litery, spacje i myślniki."
                                    >
                                </div>

                                <div class="mb-4">
                                    <label for="nr_ulicy" class="block text-sm font-medium text-gray-700">Numer ulicy</label>
                                    <input 
                                        type="number" 
                                        name="nr_ulicy" 
                                        id="nr_ulicy" 
                                        placeholder="Numer ulicy" 
                                        class="block w-full border-gray-300 rounded-md shadow-sm" 
                                        required
                                        min="1" 
                                        max="99999" 
                                        title="Numer ulicy może zawierać tylko cyfry (maksymalnie 5 cyfr)."
                                    >
                                </div>

                                <div class="mb-4">
                                    <label for="nr_mieszkania" class="block text-sm font-medium text-gray-700">Numer mieszkania</label>
                                    <input 
                                        type="number" 
                                        name="nr_mieszkania" 
                                        id="nr_mieszkania" 
                                        placeholder="Numer mieszkania" 
                                        class="block w-full border-gray-300 rounded-md shadow-sm" 
                                        min="1" 
                                        max="99999" 
                                        title="Numer mieszkania może zawierać tylko cyfry (maksymalnie 5 cyfr)."
                                    >
                                </div>
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
            const kurierForm = document.getElementById('kurier-form');
            const paczkomatForm = document.getElementById('paczkomat-form');
            const miejscowoscInput = document.getElementById('miejscowosc');
            const nazwaUlInput = document.getElementById('nazwa_ulicy');
            const nrUlInput = document.getElementById('nr_ulicy');
            const nrMieszkaniaInput = document.getElementById('nr_mieszkania');

            // Toggle visibility of forms
            kurierForm.classList.toggle('hidden', this.value !== 'kurier');
            paczkomatForm.classList.toggle('hidden', this.value !== 'paczkomat');
            
            // Enable/Disable fields based on delivery type
            if (this.value === 'kurier') {
                miejscowoscInput.disabled = false;
                nazwaUlInput.disabled = false;
                nrUlInput.disabled = false;
                nrMieszkaniaInput.disabled = false;
            } else {
                miejscowoscInput.disabled = true;
                nazwaUlInput.disabled = true;
                nrUlInput.disabled = true;
                nrMieszkaniaInput.disabled = true;
            }
        });
        });
        
    </script>
</x-app-layout>
