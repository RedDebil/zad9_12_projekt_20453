<?php

namespace App\Http\Controllers;

use App\Models\Adres;
use App\Models\Kurierzy;
use App\Models\Zamowienia;
use App\Models\IloscZamowienie;
use App\Models\Produkty;
use App\Models\Opinie;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:produkty,id',
            'quantity' => 'required|integer|min:1',
            'delivery_type' => 'required|in:kurier,paczkomat',
        ]);

        $user = auth()->user();

        if ($request->delivery_type === 'kurier') {
            $request->validate([
                'courier_id' => 'required|exists:kurierzy,id',
            ]);
        
            $address = Adres::create([
                'miejscowosc' => $request->miejscowosc,
                'nazwa_ulicy' => $request->nazwa_ulicy,
                'nr_ulicy' => $request->nr_ulicy,
                'nr_mieszkania' => $request->nr_mieszkania,
                'typ_adresu' => 'kurier',
            ]);
        
            $courierId = $request->courier_id;
        } else {
            $address = Adres::findOrFail($request->address_id);
            $courierId = $request->courier_id;
        }

        $order = Zamowienia::create([
            'cena_totalna' => Produkty::find($request->product_id)->cena * $request->quantity,
            'status' => 'w trakcie',
            'users_id' => $user->id,
            'adres_id' => $address->id,
            'kurierzy_id' => $courierId,
        ]);

        IloscZamowienie::create([
            'zamowienia_id' => $order->id,
            'produkty_id' => $request->product_id,
            'ilosc' => $request->quantity,
        ]);

        return redirect()->route('orders.index')->with('success', 'Zamówienie zostało utworzone!');
    }

    public function storeOpinion(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:produkty,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:255',
        ]);

        $user = auth()->user();

        Opinie::create([
            'produkty_id' => $request->product_id,
            'users_id' => $user->id,
            'ocena' => $request->rating,
            'komentarz' => $request->comment,
        ]);

        return back()->with('success', 'Opinia została dodana!');
    }

    public function index()
    {
        $user = auth()->user();
        $orders = Zamowienia::with('products','kurier','adres')->where('users_id', $user->id)->get();

        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $products = Produkty::all();
        $lockers = Adres::where('typ_adresu', 'paczkomat')->get();
        $couriers = Kurierzy::all();

        return view('orders.create', compact('products', 'lockers','couriers'));
    }

    public function updateStatus(Request $request, $orderId, $status)
    {
        $user = auth()->user();
        $order = Zamowienia::where('id', $orderId)->where('users_id', $user->id)->firstOrFail();

        if (!in_array($status, ['zwrócony', 'odwołany'])) {
            return redirect()->route('orders.index')->with('error', 'Nieprawidłowy status.');
        }

        $order->update(['status' => $status]);

        return redirect()->route('orders.index')->with('success', 'Status zamówienia został zmieniony.');
    }

}
