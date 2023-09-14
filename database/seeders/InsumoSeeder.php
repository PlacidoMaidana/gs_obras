<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class InsumoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //factory(Insumo::class, 10)->create(); // Crea 10 registros de prueba utilizando la factoría
        \App\Models\Insumo::factory()->count(10)->create(); // Crea 10 registros de prueba

    }
}
