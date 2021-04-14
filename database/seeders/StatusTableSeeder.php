<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status')->insert(
            [
                'name' => 'active',
                'desc' => 'Active',
            ],

        );
        DB::table('status')->insert(
            [
                'name' => 'inactive',
                'desc' => 'Inactive',
            ]

        );
    }
}
