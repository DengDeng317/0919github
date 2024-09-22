<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $array = [
            '未過期且未食用',
            '以食用',
            '已過期'
        ];
        foreach ($array as $value) {
            $state = new State();
            $state->name = $value;
            $state -> save();
        }
    }
}
