<?php

namespace App\Http\Controllers\Mod;

use App\Models\Adres;
use App\Models\Kurierzy;
use App\Models\Zamowienia;
use App\Models\IloscZamowienie;
use App\Models\Produkty;
use App\Models\Opinie;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ModOrderController extends Controller
{
    public function index()
    {
        $orders = Zamowienia::with(['user', 'adres', 'kurier', 'products'])->get();
        return view('mod.orders.index', compact('orders'));
    }

    public function updateStatus(Request $request, Zamowienia $zamowienie)
    {
        $request->validate([
            'status' => 'required|in:zrealizowane,w trakcie,odwołany',
        ]);

        $zamowienie->update(['status' => $request->status]);

        return redirect()->route('mod.orders.index')->with('success', 'Status zamówienia został zaktualizowany.');
    }

}
