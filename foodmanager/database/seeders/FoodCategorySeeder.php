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
            ['name' => '蔬菜', 'img_url' => '01.png'],
            ['name' => '水果', 'img_url' => '02.png'],
            ['name' => '餅乾', 'img_url' => '03.png'],
            ['name' => '飲料', 'img_url' => '04.png'],
            ['name' => '肉類', 'img_url' => '05.png'],
        ];
        foreach ($array as $item) {
            $category = new FoodCategory();
            $category->name = $item['name'];
            $category->img_url = $item['img_url'];
            $category->user_id = 1;
            $category->save();
        }

    }
}
