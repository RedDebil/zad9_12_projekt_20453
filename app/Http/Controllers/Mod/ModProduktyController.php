<?php
namespace App\Http\Controllers\Mod;

use App\Http\Controllers\Controller;
use App\Models\Produkty;
use App\Models\Kategoria;
use App\Models\Dostawca;
use Illuminate\Http\Request;

class ModProduktyController extends Controller
{
    public function index(Request $request)
    {
        // Pobierz wartość filtra z zapytania
        $kategoriaId = $request->input('kategoria');

        // Jeśli wybrano kategorię, filtruj produkty
        if ($kategoriaId) {
            $produkty = Produkty::with(['kategoria', 'dostawca'])
                ->where('kategoria_id', $kategoriaId)
                ->get();
        } else {
            // Jeśli brak filtra, pobierz wszystkie produkty
            $produkty = Produkty::with(['kategoria', 'dostawca'])->get();
        }

        // Pobierz listę kategorii do formularza filtrowania
        $kategorie = \App\Models\Kategoria::all();

        return view('mod.produkty.index', compact('produkty', 'kategorie', 'kategoriaId'));
    }


    public function create()
    {
        $kategorie = Kategoria::all();
        $dostawcy = Dostawca::all();
        return view('mod.produkty.create', compact('kategorie', 'dostawcy'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nazwa' => 'required|string|max:255',
            'opis' => 'nullable|string',
            'cena' => [
                'required',
                'regex:/^\d+([.,]\d{1,2})?$/', // Akceptuj liczby z kropką lub przecinkiem jako separator
            ],
            'kategoria_id' => 'required|exists:kategoria,id',
            'dostawca_id' => 'required|exists:dostawca,id',
        ]);

        // Zamień przecinek na kropkę, aby zapisać w standardzie liczbowym
        $validated['cena'] = str_replace(',', '.', $validated['cena']);

        Produkty::create($validated);
        return redirect()->route('mod.produkty.index')->with('success', 'Produkt został dodany.');
    }

    public function edit(Produkty $produkty)
    {
        $kategorie = Kategoria::all();
        $dostawcy = Dostawca::all();
        return view('mod.produkty.edit', compact('produkty', 'kategorie', 'dostawcy'));
    }

    public function update(Request $request, Produkty $produkty)
    {
        $validated = $request->validate([
            'nazwa' => 'required|string|max:255',
            'opis' => 'nullable|string',
            'cena' => [
                'required',
                'regex:/^\d+([.,]\d{1,2})?$/', // Akceptuj liczby z kropką lub przecinkiem jako separator
            ],
            'kategoria_id' => 'required|exists:kategoria,id',
            'dostawca_id' => 'required|exists:dostawca,id',
        ]);

        // Zamień przecinek na kropkę
        $validated['cena'] = str_replace(',', '.', $validated['cena']);

        $produkty->update($validated);
        return redirect()->route('mod.produkty.index')->with('success', 'Produkt został zaktualizowany.');
    }
}
