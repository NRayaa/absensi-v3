<?php

namespace Database\Seeders;

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
                'email'=>"rusmanasari@gmail.com",
                'role'=>"admin",
                'password'=>bcrypt('rusmanyuli12'),
            ],
        ];

        foreach ($admin as $key => $val) {
            User::create($val);
        }
    }


}
