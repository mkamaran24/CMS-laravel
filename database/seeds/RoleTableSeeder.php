<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        

        $super_admin = \App\Role::create([
            'name'=>'super_admin',
            'display_name'=>'super admin',
            'description'=>'this role for admin panel'
        ]);

        $user = \App\Role::create([
            'name'=>'user',
            'display_name'=>'user',
            'description'=>'this role for users'
        ]);
    }
}
