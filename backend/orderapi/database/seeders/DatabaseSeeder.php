<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Observation;
use App\Models\Technician;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

       $this->call(RoleSeeder::class);
       $this->call(CausalSeeder::class);
       $this->call(ObservationSeeder::class);
       $this->call(TypeActivitySeeder::class);
        
        //Se crea un usuario con rol administrador
       user::factory()->create([
            'role_id' => 1
        ]);

        //se ccrean varios usuarios con rol supervisor
        user::factory(2)->create([
            'role_id' => 2
        ]);

        Technician::factory()->create([
            'especiality' => 'Instalacion de redes'
        ]);

        Technician::factory(2)->create([
            'especiality' => 'Construccion'
        ]);

        Technician::factory(2)->create([
            'especiality' => 'Lectura de redes'
        ]);

        Technician::factory(2)->create([]);

        $this->call(ActivitySeeder::class);
        $this->call(OrderSeeder::class);
        $this->call(OrderActivitySeeder::class);

    }
}