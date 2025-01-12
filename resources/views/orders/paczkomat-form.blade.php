@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Zamówienie - Paczkomat</h1>

    <form action="{{ route('orders.store') }}" method="POST">
        @csrf

        <input type="hidden" name="delivery_type" value="paczkomat">

        <div class="mb-3">
            <label for="address_id" class="form-label">Wybierz paczkomat</label>
            <select name="address_id" id="address_id" class="form-control" required>
                @foreach($lockerAddresses as $address)
                    <option value="{{ $address->id }}">
                        {{ $address->miejscowosc }}, {{ $address->nazwa_ulicy }} {{ $address->nr_ulicy }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Złóż zamówienie</button>
    </form>
</div>
@endsection
