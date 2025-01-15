<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produkty;

class ProduktySeeder extends Seeder
{
    public function run()
    {
        $produkty = [
            [
                'nazwa' => 'Nóż myśliwski',
                'opis' => 'Wytrzymały nóż do polowań.',
                'cena' => 150.99,
                'kategoria_id' => 1, // Broń
                'dostawca_id' => 1,
            ],
            [
                'nazwa' => 'Lornetka',
                'opis' => 'Profesjonalna lornetka o dużym zasięgu.',
                'cena' => 499.99,
                'kategoria_id' => 2, // Narzędzie
                'dostawca_id' => 2,
            ],
            [
                'nazwa' => 'Kamuflaż',
                'opis' => 'Ubranie maskujące dla myśliwych.',
                'cena' => 250.00,
                'kategoria_id' => 3, // Odzież
                'dostawca_id' => 3,
            ],
            [
                'nazwa' => 'Siekiera myśliwska',
                'opis' => 'Niezbędna do przygotowywania obozu.',
                'cena' => 180.50,
                'kategoria_id' => 2, // Narzędzie
                'dostawca_id' => 1,
            ],
            [
                'nazwa' => 'Latarka czołowa',
                'opis' => 'Wodoodporna latarka LED o dużej jasności.',
                'cena' => 75.99,
                'kategoria_id' => 2, // Narzędzie
                'dostawca_id' => 2,
            ],
            [
                'nazwa' => 'Strzelba myśliwska',
                'opis' => 'Klasyczna strzelba o wysokiej precyzji.',
                'cena' => 1200.00,
                'kategoria_id' => 1, // Broń
                'dostawca_id' => 3,
            ],
            [
                'nazwa' => 'Kapelusz maskujący',
                'opis' => 'Kapelusz z siatką maskującą na twarz.',
                'cena' => 60.00,
                'kategoria_id' => 3, // Odzież
                'dostawca_id' => 1,
            ],
            [
                'nazwa' => 'Plecak myśliwski',
                'opis' => 'Duży plecak z wieloma kieszeniami na ekwipunek.',
                'cena' => 299.99,
                'kategoria_id' => 3, // Odzież
                'dostawca_id' => 2,
            ],
            [
                'nazwa' => 'Noktowizor',
                'opis' => 'Urządzenie noktowizyjne o dalekim zasięgu.',
                'cena' => 2100.00,
                'kategoria_id' => 2, // Narzędzie
                'dostawca_id' => 3,
            ],
            [
                'nazwa' => 'Pas na amunicję',
                'opis' => 'Solidny pas do przenoszenia naboi.',
                'cena' => 120.00,
                'kategoria_id' => 3, // Odzież
                'dostawca_id' => 1,
            ],
            [
                'nazwa' => 'Karabin snajperski',
                'opis' => 'Karabin z lunetą, idealny na długie dystanse.',
                'cena' => 3000.00,
                'kategoria_id' => 1, // Broń
                'dostawca_id' => 2,
            ],
        ];

        foreach ($produkty as $produkt) {
            Produkty::factory()->create($produkt);
        }
    }
}
