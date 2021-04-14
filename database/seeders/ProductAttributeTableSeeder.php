<?php

namespace Database\Seeders;

use App\Models\product_attribute;
use Illuminate\Database\Seeder;

class ProductAttributeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['id' => 1, 'type'=>'color','name' => 'Red','status'=>'1'],
            ['id' => 2, 'type' => 'size', 'name' => 'L', 'status'=>'1'],
        ];

        foreach ($items as $item) {
            product_attribute::create($item);
        }
    }
}
