<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['id' => 1, 'title' => 'New Produt','slug'=>'new-product', 'status'=>'1'],
            ['id' => 2, 'title' => 'New arrival', 'slug'=>'new-arrival', 'status'=>'1'],
        ];

        foreach ($items as $item) {
            Tag::create($item);
        }
    }
}
