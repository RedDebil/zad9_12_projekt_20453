<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kategoria;
use Illuminate\Http\Request;

class AdminKategoriaController extends Controller
{
    public function index()
    {
        // Pobieranie wszystkich kategorii
        $kategorie = Kategoria::all();
        return view('admin.kategorie.index', compact('kategorie'));
    }

    public function create()
    {
        return view('admin.kategorie.create');
    }

    public function store(Request $request)
    {
        // Walidacja danych formularza
        $request->validate([
            'kategoria' => 'required|string|max:255',
        ]);

        // Tworzenie nowej kategorii
        Kategoria::create([
            'kategoria' => $request->kategoria,
        ]);

        return redirect()->route('kategorie.index')->with('success', 'Kategoria została dodana.');
    }

    public function edit($id)
    {
        // Pobranie kategorii do edycji
        $kategoria = Kategoria::findOrFail($id);
        return view('admin.kategorie.edit', compact('kategoria'));
    }

    public function update(Request $request, $id)
    {
        // Walidacja danych formularza
        $request->validate([
            'kategoria' => 'required|string|max:255',
        ]);

        // Aktualizacja kategorii
        $kategoria = Kategoria::findOrFail($id);
        $kategoria->update([
            'kategoria' => $request->kategoria,
        ]);

        return redirect()->route('kategorie.index')->with('success', 'Kategoria została zaktualizowana.');
    }

    public function destroy($id)
    {
        // Usuwanie kategorii
        $kategoria = Kategoria::findOrFail($id);
        $kategoria->delete();

        return redirect()->route('kategorie.index')->with('success', 'Kategoria została usunięta.');
    }
}
