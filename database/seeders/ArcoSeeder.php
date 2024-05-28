<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class ArcoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('arcos')->insert([
            ['peso' => 20.00, 'vertice_origen_id' => 1, 'vertice_destino_id' => 2, 'created_at' => '2024-05-28 01:55:35', 'updated_at' => '2024-05-28 01:55:35'],
            ['peso' => 15.00, 'vertice_origen_id' => 2, 'vertice_destino_id' => 3, 'created_at' => '2024-05-28 01:55:49', 'updated_at' => '2024-05-28 01:55:49'],
            ['peso' => 25.00, 'vertice_origen_id' => 3, 'vertice_destino_id' => 5, 'created_at' => '2024-05-28 01:55:59', 'updated_at' => '2024-05-28 01:55:59'],
            ['peso' => 20.00, 'vertice_origen_id' => 2, 'vertice_destino_id' => 1, 'created_at' => '2024-05-28 01:56:10', 'updated_at' => '2024-05-28 01:56:10'],
            ['peso' => 21.00, 'vertice_origen_id' => 2, 'vertice_destino_id' => 4, 'created_at' => '2024-05-28 01:56:44', 'updated_at' => '2024-05-28 01:56:44'],
            ['peso' => 32.00, 'vertice_origen_id' => 4, 'vertice_destino_id' => 5, 'created_at' => '2024-05-28 01:57:03', 'updated_at' => '2024-05-28 01:57:03'],
            ['peso' => 12.00, 'vertice_origen_id' => 5, 'vertice_destino_id' => 1, 'created_at' => '2024-05-28 01:57:11', 'updated_at' => '2024-05-28 01:57:11'],
        ]);
    }
}
