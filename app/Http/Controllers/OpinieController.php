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

    public function edit($id)
    {
        $opinia = Opinie::where('id', $id)
            ->where('users_id', auth()->id())
            ->firstOrFail();

        return view('opinie.edit', compact('opinia'));
    }

    public function update(Request $request, $id)
    {
        $opinia = Opinie::where('id', $id)
            ->where('users_id', auth()->id())
            ->firstOrFail();

        $request->validate([
            'ocena' => 'required|integer|min:1|max:5',
            'komentarz' => 'required|string|max:255',
        ]);

        $opinia->update($request->only(['ocena', 'komentarz']));

        return redirect()->route('produkty.show', $opinia->produkty_id)
            ->with('success', 'Opinia została zaktualizowana.');
    }

    public function destroy($id)
    {
        $opinia = Opinie::where('id', $id)
            ->where('users_id', auth()->id())
            ->firstOrFail();

        $opinia->delete();

        return redirect()->route('produkty.show', $opinia->produkty_id)
            ->with('success', 'Opinia została usunięta.');
    }

}
