<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorkspaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('workspaces')->insert([
            [
                'user_id' => 1,
                'namaWorkspace' => 'Kampus',
                'deskWorkspace' => 'Workspace untuk kampus',
            ],
            [
                'user_id' => 1,
                'namaWorkspace' => 'Homework',
                'deskWorkspace' => 'Workspace untuk Tugas Rumah',
            ],
        ]);
    }
}
