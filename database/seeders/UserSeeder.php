<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'milton',
            'cedula' => '7810344',
            'celular' => '59176644887',
            'direccion' => 'Barrio 8 de septiembre',
            'is_admin' => 1,
            'email' => 'milton@gmail.com',
            'password' => Hash::make('123123123'),
            'remember_token' => Str::random(10),
        ]);
    }
}
