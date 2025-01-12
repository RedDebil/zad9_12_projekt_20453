<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::factory()->create([
            'name' => 'Jan Kowalski',
            'email' => 'jan.kowalski@example.com',
            'password' => bcrypt('zaq1@WSX'),
            'role' => 'user',
        ]);

        User::factory()->create([
            'name' => 'Kamil Ślimak',
            'email' => 'kamil.slimak@example.com',
            'password' => bcrypt('zaq1@WSX'),
            'role' => 'user',
        ]);

        User::factory()->create([
            'name' => 'Anna Nowak',
            'email' => 'anna.nowak@example.com',
            'password' => bcrypt('zaq1@WSX'),
            'role' => 'mod',
        ]);

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('zaq1@WSX'),
            'role' => 'admin',
        ]);
    }
}
