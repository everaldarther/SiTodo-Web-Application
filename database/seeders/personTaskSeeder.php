<?php

namespace Database\Seeders;

use App\Models\personTask;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class personTaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        personTask::factory()->count(10)->create();
    }
}
