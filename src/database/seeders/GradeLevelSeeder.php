<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GradeLevelSeeder extends Seeder
{
    public function run(): void
    {
        $levels = [
            'Grade 7',
            'Grade 8',
            'Grade 9',
            'Grade 10',
            'Grade 11',
            'Grade 12',
        ];

        foreach ($levels as $name) {
            DB::table('grade_levels')->insertOrIgnore([
                'grade_level_name' => $name,
                'created_at'       => now(),
                'updated_at'       => now(),
            ]);
        }
    }
}
