<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class VerticeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('vertices')->insert([
            ['nombre' => 'Bolivia', 'marcado' => 0, 'ruta_id' => 1,'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Colombia', 'marcado' => 0, 'ruta_id' => 1,'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Venezuela', 'marcado' => 0,'ruta_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Argentina', 'marcado' => 0, 'ruta_id' => 1,'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Uruguay', 'marcado' => 0, 'ruta_id' => 1,'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
