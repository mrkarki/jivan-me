<?php

namespace Database\Seeders;

use App\Models\Role as ModelsRole;
use App\Models\User as ModelsUser;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        ModelsUser::truncate();
        DB::table('role_user')->truncate();

        $adminRole= ModelsRole::where('name','admin')->first();
        $manuRole= ModelsRole::where('name','manu')->first();
        $wholeRole= ModelsRole::where('name','whole')->first();
        $userRole= ModelsRole::where('name','user')->first();

        $admin = ModelsUser::create([
            'name'=>'Admin User',
            'email'=>'admin@example.com',
            'password' => bcrypt('admin@123'),
            'user_role' => '1',
            'status' => '1'
        ]);
        $manu = ModelsUser::create([
            'name'=>'Manufacturer User',
            'email'=>'manu@example.com',
            'password' => bcrypt ('admin@123'),
            'user_role' => '2',
            'status' => '1'
        ]);
        $whole = ModelsUser::create([
            'name'=>'Wholesaler User',
            'email'=>'whole@example.com',
            'password' => bcrypt('admin@123'),
            'user_role' => '3',
            'status' => '1'
        ]);
        $user = ModelsUser::create([
            'name'=>'User User',
            'email'=>'user@example.com',
            'password' => bcrypt('admin@123'),
            'user_role' => '4',
            'status' => '1'
        ]);
        $admin->roles()->attach($adminRole);
        $manu->roles()->attach($manuRole);
        $whole->roles()->attach($wholeRole);
        $user->roles()->attach($userRole);
    }
}
