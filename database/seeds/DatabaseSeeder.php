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
        $this->call(UsersTableSeeder::class);
        $this->call(CompaniesTableSeeder::class);
        $this->call(EmployeesTableSeeder::class);
        // DB::table('users')->insert([
        //     'name' => 'Admin',
        //     'email' => 'admin@admin.com',
        //     'password' => bcrypt('password')
        // ]);
 
        
    }
}
