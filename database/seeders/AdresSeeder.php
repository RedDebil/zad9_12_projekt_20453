<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Adres;

class AdresSeeder extends Seeder
{
    public function run()
    {
        $adresy = [
            [
                'miejscowosc' => 'Warszawa',
                'nazwa_ulicy' => 'Marszałkowska',
                'nr_ulicy' => 15,
                'nr_mieszkania' => 5,
                'typ_adresu' => 'dom',
            ],
            [
                'miejscowosc' => 'Kraków',
                'nazwa_ulicy' => 'Floriańska',
                'nr_ulicy' => 20,
                'nr_mieszkania' => 10,
                'typ_adresu' => 'mieszkanie',
            ],
            [
                'miejscowosc' => 'Gdańsk',
                'nazwa_ulicy' => 'Długa',
                'nr_ulicy' => 35,
                'nr_mieszkania' => 7,
                'typ_adresu' => 'biuro',
            ],
        ];

        foreach ($adresy as $adres) {
            Adres::factory()->create($adres);
        }
    }
}
