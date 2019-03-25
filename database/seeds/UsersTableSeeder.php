<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = Role::where('username', 'username')->first();
        $role_admin  = Role::where('username', 'admin')->first();

        $user = new User();
        $user->fname = 'John';
        $user->lname = 'Doe';
        $user->national_id = '1234567';
        $user->username = 'username';
        $user->username = 'username';
        $user->email = 'user@example.com';
        $user->password = bcrypt('secret');
        $user->save();

        $user->roles()->attach($role_user);
        $admin = new User();
        $user->fname = 'John';
        $user->lname = 'Doe';
        $user->national_id = '2345678';
        $user->username = 'admin';
        $user->email = 'admin@example.com';
        $admin->password = bcrypt('secretadmin');
        $admin->save();
        $admin->roles()->attach($role_admin);
    }
}
