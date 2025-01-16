<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kurierzy;
use Illuminate\Http\Request;

class AdminKurierzyController extends Controller
{
    // Wyświetlanie listy kurierów
    public function index()
    {
        $kurierzy = Kurierzy::all();
        return view('admin.kurierzy.index', compact('kurierzy'));
    }

    // Przechodzenie do formularza tworzenia
    public function create()
    {
        return view('admin.kurierzy.create');
    }

    // Zapisywanie nowego kuriera
    public function store(Request $request)
    {
        $request->validate([
            'nazwa' => 'required|string|max:255',
        ]);

        Kurierzy::create($request->all());

        return redirect()->route('kurierzy.index')->with('success', 'Firma kurierska została dodana.');
    }

    // Przechodzenie do formularza edycji
    public function edit($id)
    {
        $kurier = Kurierzy::findOrFail($id);
        return view('admin.kurierzy.edit', compact('kurier'));
    }

    // Aktualizacja kuriera
    public function update(Request $request, $id)
    {
        $request->validate([
            'nazwa' => 'required|string|max:255',
        ]);
        $kurier = Kurierzy::findOrFail($id);
        $kurier->update($request->all());

        return redirect()->route('kurierzy.index')->with('success', 'Firma kurierska została zaktualizowana.');
    }

    // Usuwanie kuriera
    public function destroy($id)
    {
        $kurier = Kurierzy::findOrFail($id);
        $kurier->delete();
        return redirect()->route('kurierzy.index')->with('success', 'Firma kurierska została usunięta.');
    }
}
