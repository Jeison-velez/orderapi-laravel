<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Order::insert([
            [
                'legalization_date' => '2023-02-20',
                'address' => 'Av. siempre viva',
                'city' => 'springfield',
                'observation_id' => null,   
                'causal_id' => 1
            ],
            [
                'legalization_date' => '2023-02-20',
                'address' => 'Calle falsa 123',
                'city' => 'springfield',
                'observation_id' => null,   
                'causal_id' => 1
            ]
            ]);
    }
}
