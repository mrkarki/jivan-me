<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            [ 'meta_key'=>'site_title','meta_title' => 'Hamro Jutta','meta_value'=>'Hamro Jutta'],
            [ 'meta_key'=>'site_email','meta_title' => 'email','meta_value'=>'example@hamrojutta.com'],
            [ 'meta_key'=>'site_phone','meta_title' => 'phone','meta_value'=>'01-24567'],
            [ 'meta_key'=>'header_settings','meta_title' => 'header','meta_value'=>''],

        ];

        foreach ($items as $item) {
            Setting::create($item);
        }
    }
}
