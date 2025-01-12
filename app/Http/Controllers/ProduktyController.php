<?php

namespace App\Http\Controllers;

use App\Models\Produkty;
use App\Models\Opinie;
use Illuminate\Http\Request;

class ProduktyController extends Controller
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

        return view('produkty.index', compact('produkty', 'kategorie', 'kategoriaId'));
    }

    public function show($id)
    {
        $produkt = Produkty::with(['kategoria', 'dostawca', 'opinie.user'])->findOrFail($id);
        return view('produkty.show', compact('produkt'));
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

}
