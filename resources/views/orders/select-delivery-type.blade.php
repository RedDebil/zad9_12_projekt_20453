@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Wybierz sposób dostawy</h1>
    <a href="{{ route('orders.delivery-form', ['deliveryType' => 'kurier']) }}" class="btn btn-primary">Kurier</a>
    <a href="{{ route('orders.delivery-form', ['deliveryType' => 'paczkomat']) }}" class="btn btn-secondary">Paczkomat</a>
</div>
@endsection
