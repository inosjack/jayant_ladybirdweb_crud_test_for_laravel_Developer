<?php

use Illuminate\Database\Seeder;

class EmployeeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \DB::beginTransaction();

        factory(App\Employee::class, 20)->create();

        \DB::commit();
    }
}
