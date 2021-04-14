<?php

namespace Database\Seeders;

use App\Models\Role as ModelsRole;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        ModelsRole::truncate();

        ModelsRole::create(['name'=>'admin','desc'=>'Admin']);
        ModelsRole::create(['name'=>'manu','desc'=>'Manufacturer']);
        ModelsRole::create(['name'=>'whole','desc'=>'Wholesaler']);
        ModelsRole::create(['name'=>'user','desc'=>'User']);

    }
}
