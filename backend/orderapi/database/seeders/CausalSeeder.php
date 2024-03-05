<?php

namespace Database\Seeders;

use App\Models\Causal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CausalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Causal::insert([
            ['description' => 'Reparacion contador'],
            ['description' => 'Suspencion del servicio'],
            ['description' => 'Reconexion del servicio'],
            ['description' => 'Instalacion del contador'],
            ['description' => 'Cambio del contador']
        ]);
    }
}
