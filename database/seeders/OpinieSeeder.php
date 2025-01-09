<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Opinie;

class OpinieSeeder extends Seeder
{
    public function run()
    {
        $opinie = [
            [
                'ocena' => 5,
                'komentarz' => 'Świetny produkt, bardzo polecam!',
                'produkty_id' => 1,
                'users_id' => 1,
            ],
            [
                'ocena' => 4,
                'komentarz' => 'Dobra jakość, ale mogło być taniej.',
                'produkty_id' => 2,
                'users_id' => 2,
            ],
        ];

        foreach ($opinie as $opinia) {
            Opinie::factory()->create($opinia);
        }
    }
}
