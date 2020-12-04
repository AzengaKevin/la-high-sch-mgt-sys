<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //List of sample departments
        $departments = [
            'mathemetics', 'languages', 'sciences', 
            'industrials', 'humanities', 'religious'];

        //Creating the department
        foreach ($departments as $department) {
            Department::create(['name' => $department]);
        }
    }
}
