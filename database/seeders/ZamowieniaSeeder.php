<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Zamowienia;

class ZamowieniaSeeder extends Seeder
{
    public function run()
    {
        $zamowienia = [
            [
                'cena_totalna' => 200.00,
                'status' => 'zrealizowane',
                'users_id' => 1,
                'adres_id' => 1,
                'kurierzy_id' => 1,
            ],
            [
                'cena_totalna' => 499.99,
                'status' => 'w trakcie',
                'users_id' => 2,
                'adres_id' => 2,
                'kurierzy_id' => 2,
            ],
        ];

        foreach ($zamowienia as $zamowienie) {
            Zamowienia::factory()->create($zamowienie);
        }
    }
}
