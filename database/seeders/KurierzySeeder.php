<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kurierzy;

class KurierzySeeder extends Seeder
{
    public function run()
    {
        $kurierzy = [
            ['nazwa' => 'DHL Express'],
            ['nazwa' => 'FedEx'],
            ['nazwa' => 'Poczta Polska'],
        ];

        foreach ($kurierzy as $kurier) {
            Kurierzy::factory()->create($kurier);
        }
    }
}
