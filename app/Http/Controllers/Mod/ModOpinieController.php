<?php

namespace App\Http\Controllers\Mod;

use App\Models\Opinie;
use App\Models\Produkty;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ModOpinieController extends Controller
{
    public function index($produktId)
    {
        $produkt = Produkty::findOrFail($produktId);
        $opinie = Opinie::where('produkty_id', $produktId)->get();
        return view('mod.opinie.index', compact('produkt', 'opinie'));
    }

    public function destroy($id)
    {
        $opinia = Opinie::findOrFail($id);


        $opinia->delete();

        return redirect()->route('mod.opinie.index', $opinia->produkty_id)
            ->with('success', 'Opinia została usunięta.');
    }

}
