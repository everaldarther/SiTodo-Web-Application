<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Ramadika Wijaya',
                'email' => 'dika@gmail.com',
                'password' => bcrypt('dika12345')
            ],
            [
                'name' => 'Everald Anthony',
                'email' => 'eve@gmail.com',
                'password' => bcrypt('eve12345')
            ],
            [
                'name' => 'Dimas Bintang',
                'email' => 'dims@gmail.com',
                'password' => bcrypt('dims12345')
            ],
            [
                'name' => 'Erlangga Bima',
                'email' => 'erlang@gmail.com',
                'password' => bcrypt('erlang12345')
            ],
        ]);
    }
}
