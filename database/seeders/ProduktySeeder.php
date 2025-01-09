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
                'kategoria_id' => 1,
                'dostawca_id' => 1,
            ],
            [
                'nazwa' => 'Lornetka',
                'opis' => 'Profesjonalna lornetka o dużym zasięgu.',
                'cena' => 499.99,
                'kategoria_id' => 2,
                'dostawca_id' => 2,
            ],
            [
                'nazwa' => 'Kamuflaż',
                'opis' => 'Ubranie maskujące dla myśliwych.',
                'cena' => 250.00,
                'kategoria_id' => 3,
                'dostawca_id' => 3,
            ],
        ];

        foreach ($produkty as $produkt) {
            Produkty::factory()->create($produkt);
        }
    }
}
