<?php

namespace Database\Seeders;

use App\Models\Teacher;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = [
            [
                'name'=>"Rusman As'ari",
                'email'=>"rusmanasari75@gmail.com",
                'role'=>"admin",
                'password'=>bcrypt('rusmanyuli12'),
            ],
            [
                'name'=>"Anas",
                'email'=>"anas01@gmail.com",
                'role'=>"guru",
                'password'=>bcrypt('aisyah123'),
            ]
        ];
        $user = [
            ['name_teacher' => "Rusman As'ari",],
            ['name_teacher' => "Anas",],
        ];

        foreach ($user as $key => $val) {
            Teacher::create($val);
        }

        foreach ($admin as $key => $val) {
            User::create($val);
        }
    }


}
