<?php

namespace Database\Seeders;

use App\Models\Dispositivo;
use App\Models\TipoDocumento;
use App\Models\Cliente;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // TipoDocumento::factory(7)->create();

        // Cliente::factory(100)->create();

        Dispositivo::factory(100)->create();
    }
}
