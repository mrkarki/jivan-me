<?php

namespace Database\Seeders;

use App\Models\Brands;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(RolesTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(StatusTableSeeder::class);
        $this->call(BrandTableSeeder::class);
        $this->call(TagTableSeeder::class);
        $this->call(SettingTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(ProductAttributeTableSeeder::class);
    }
}
