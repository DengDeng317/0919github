<?php

namespace Database\Seeders;

use App\Models\FoodCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FoodCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $array = [
            '蔬菜',
            '水果',
            '餅乾',
            '飲料',
            '肉類',
        ];
        foreach ($array as $item) {
            $category = new FoodCategory();
            $category->name = $item;
            $category->save();
        }

    }
}
