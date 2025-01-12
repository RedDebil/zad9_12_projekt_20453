@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Zamówienie - Kurier</h1>

    <form action="{{ route('orders.store') }}" method="POST">
        @csrf

        <input type="hidden" name="delivery_type" value="kurier">

        <div class="mb-3">
            <label for="courier_id" class="form-label">Wybierz kuriera</label>
            <select name="courier_id" id="courier_id" class="form-control" required>
                @foreach($couriers as $courier)
                    <option value="{{ $courier->id }}">{{ $courier->nazwa }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="miejscowosc" class="form-label">Miejscowość</label>
            <input type="text" name="miejscowosc" id="miejscowosc" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="nazwa_ulicy" class="form-label">Ulica</label>
            <input type="text" name="nazwa_ulicy" id="nazwa_ulicy" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="nr_ulicy" class="form-label">Numer ulicy</label>
            <input type="number" name="nr_ulicy" id="nr_ulicy" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="nr_mieszkania" class="form-label">Numer mieszkania</label>
            <input type="number" name="nr_mieszkania" id="nr_mieszkania" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Złóż zamówienie</button>
    </form>
</div>
@endsection
