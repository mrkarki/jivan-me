<?php

namespace Database\Seeders;

use App\Models\Category;
use ElementorPro\Modules\Woocommerce\Widgets\Categories;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['id' => 1, 'title' => 'Mens','slug'=>'mens', 'parent_id'=>'0', 'rel_key'=>'0', 'status'=>'1'],
            ['id' => 2, 'title' => 'Womens', 'slug'=>'womens','parent_id'=>'0', 'rel_key'=>'0', 'status'=>'1'],
        ];

        foreach ($items as $item) {
            Category::create($item);
        }
    }
}
