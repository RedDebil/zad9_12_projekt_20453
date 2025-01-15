<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategoria;

class KategoriaSeeder extends Seeder
{
    public function run()
    {
        $kategorie = [
            ['kategoria' => 'Broń'],
            ['kategoria' => 'Narzędzia'],
            ['kategoria' => 'Odzież'],
        ];

        foreach ($kategorie as $kategoria) {
            Kategoria::factory()->create($kategoria);
        }
    }
}
