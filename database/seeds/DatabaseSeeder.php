<?php

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
        // $this->call(UserSeeder::class);
        $this->call(UsersSeeder::class);
        //$this->call(UserPermissionSeeder::class);
        //$this->call(RoleSeeder::class);
        //$this->call(UserAdminSeeder::class);
    }
}