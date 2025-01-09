<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Dostawca;

class DostawcaSeeder extends Seeder
{
    public function run()
    {
        $dostawcy = [
            ['nazwa' => 'Hunting Supplies Inc.', 'nr_telefonu' => '123456789'],
            ['nazwa' => 'Wild Gear Ltd.', 'nr_telefonu' => '987654321'],
            ['nazwa' => 'Forest Adventures Co.', 'nr_telefonu' => '112233445'],
        ];

        foreach ($dostawcy as $dostawca) {
            Dostawca::factory()->create($dostawca);
        }
    }
}
