<?php

namespace Database\Seeders;

use App\Models\Teacher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            'name_teacher' => "Rusman As'ari",
        ];

        foreach ($user as $key => $val) {
            Teacher::create($val);
        }

    }
}
