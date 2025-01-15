<?php

namespace App\Http\Controllers\Mod;

use App\Http\Controllers\Controller;
use App\Models\Adres;
use Illuminate\Http\Request;

class ModAdresController extends Controller
{
    // Wyświetlanie formularza dodawania nowego adresu
    public function create()
    {
        return view('mod.adres.create');  // Widok formularza tworzenia adresu
    }

    // Przechwytywanie i zapisanie nowego adresu
    public function store(Request $request)
    {
        // Walidacja danych
        $request->validate([
            'miejscowosc' => [
                'required', 
                'string', 
                'max:255',
                'regex:/^[\pL\s\-]+$/u' // Tylko litery, spacje i myślniki
            ],
            'nazwa_ulicy' => [
                'required', 
                'string', 
                'max:255',
                'regex:/^[\pL\s\-]+$/u' // Tylko litery, spacje i myślniki
            ],
            'nr_ulicy' => 'required|numeric|digits_between:1,5', // Tylko cyfry, maksymalnie 5 cyfr
            'nr_mieszkania' => 'nullable|numeric|digits_between:1,5', // Tylko cyfry, maksymalnie 5 cyfr
        ]);
    
        // Tworzenie nowego adresu
        Adres::create([
            'miejscowosc' => $request->miejscowosc,
            'nazwa_ulicy' => $request->nazwa_ulicy,
            'nr_ulicy' => $request->nr_ulicy,
            'nr_mieszkania' => $request->nr_mieszkania,
            'typ_adresu' => 'paczkomat', // Typ adresu zawsze ustawiamy na "paczkomat"
        ]);
    
        // Przekierowanie po zapisaniu
        return redirect()->route('mod.dashboard')->with('success', 'Adres został dodany.');
    }

}
