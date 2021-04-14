<?php

namespace Database\Seeders;

use App\Models\Brands;
use Illuminate\Database\Seeder;

class BrandTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['id' => 1, 'title' => 'Goldstar','slug'=>'goldstar', 'status'=>'1'],
            ['id' => 2, 'title' => 'Addidas', 'slug'=>'addidas', 'status'=>'1'],
        ];

        foreach ($items as $item) {
            Brands::create($item);
        }
    }
}
