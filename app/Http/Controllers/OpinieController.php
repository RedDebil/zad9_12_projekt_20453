<?php

namespace App\Http\Controllers;

use App\Models\Opinie;
use App\Models\Produkty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OpinieController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'ocena' => 'required|integer|between:1,5',
            'komentarz' => 'required|string|max:500',
            'product_id' => 'required|exists:produkty,id',
            'order_id' => 'required|exists:zamowienia,id',
        ]);

        Opinie::create([
            'ocena' => $request->ocena,
            'komentarz' => $request->komentarz,
            'produkty_id' => $request->product_id,
            'users_id' => Auth::id(),
        ]);

        session()->flash('success', 'Opinia została wysłana!');

        return redirect()->route('orders.index');
    }
}
