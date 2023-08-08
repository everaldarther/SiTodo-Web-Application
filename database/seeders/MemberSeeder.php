<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('members')->insert([
            [
                'workspace_id' => 1,
                'user_id' => 1,
                'level' => '1',
            ],
            [
                'workspace_id' => 1,
                'user_id' => 2,
                'level' => '0',
            ],
        ]);
    }
}
