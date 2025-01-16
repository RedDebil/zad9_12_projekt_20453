<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dostawca;
use Illuminate\Http\Request;

class AdminDostawcaController extends Controller
{
    // Wyświetlanie listy dostawców
    public function index()
    {
        $dostawcy = Dostawca::all();
        return view('admin.dostawcy.index', compact('dostawcy'));
    }

    // Przechodzenie do formularza tworzenia nowego dostawcy
    public function create()
    {
        return view('admin.dostawcy.create');
    }

    // Zapisywanie nowego dostawcy
    public function store(Request $request)
    {
        $request->validate([
            'nazwa' => 'required|string|max:255',
            'nr_telefonu' => 'required|numeric',
        ]);

        Dostawca::create($request->all());

        return redirect()->route('dostawcy.index')->with('success', 'Dostawca został dodany.');
    }

    // Przechodzenie do formularza edycji dostawcy
    public function edit($id)
    {
        $dostawca = Dostawca::findOrFail($id);
        return view('admin.dostawcy.edit', compact('dostawca'));
    }

    // Aktualizacja dostawcy
    public function update(Request $request, $id)
    {
        $request->validate([
            'nazwa' => 'required|string|max:255',
            'nr_telefonu' => 'required|numeric',
        ]);

        $dostawca = Dostawca::findOrFail($id);
        $dostawca->update($request->all());

        return redirect()->route('dostawcy.index')->with('success', 'Dostawca został zaktualizowany.');
    }

    // Usuwanie dostawcy
    public function destroy($id)
    {
        $dostawca = Dostawca::findOrFail($id);
        $dostawca->delete();
        return redirect()->route('dostawcy.index')->with('success', 'Dostawca został usunięty.');
    }
}
