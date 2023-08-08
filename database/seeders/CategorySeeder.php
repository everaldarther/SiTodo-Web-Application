<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'user_id' => 1,
                'categoryName' => 'Kampus',
            ],
            [
                'user_id' => 2,
                'categoryName' => 'Hobby',
            ],
            [
                'user_id' => 3,
                'categoryName' => 'Gaming',
            ],
            [
                'user_id' => 4,
                'categoryName' => 'Watch List',
            ],
        ]);
    }
}
