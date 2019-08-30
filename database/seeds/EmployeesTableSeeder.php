<?php

use Illuminate\Database\Seeder;

use App\Employee;
class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Employee::class)->times(15)->create();
    }
}
