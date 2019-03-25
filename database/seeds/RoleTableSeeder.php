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
        $role_user = new Role();
        $role_user->name = 'defaultUser';
        $role_user->description = 'A Default User sees default pages';
        $role_user->save();

        $role_admin = new Role();
        $role_admin->name = 'SuperAdmin';
        $role_admin->description = 'A SuperAdmin User can see everyThing';
        $role_admin->save();
    }
}
