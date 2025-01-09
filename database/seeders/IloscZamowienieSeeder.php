<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\IloscZamowienie;

class IloscZamowienieSeeder extends Seeder
{
    public function run()
    {
        $ilosci = [
            [
                'ilosc' => 2,
                'zamowienia_id' => 1,
                'produkty_id' => 1,
            ],
            [
                'ilosc' => 1,
                'zamowienia_id' => 2,
                'produkty_id' => 2,
            ],
        ];

        foreach ($ilosci as $ilosc) {
            IloscZamowienie::factory()->create($ilosc);
        }
    }
}
