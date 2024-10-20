<?php

namespace Database\Seeders;

use App\Models\FoodCategory;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();
        $user->username = '測試';
        $user->password = bcrypt('12345678');
        $user->email = '123@c.c';
        $user->save();

    }
}
