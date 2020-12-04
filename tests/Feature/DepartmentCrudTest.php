<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Department;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DepartmentCrudTest extends TestCase
{
    use RefreshDatabase;
    
    /** @group departments */
    public function test_a_department_can_be_created()
    {
        Department::create([
            'name' => 'Mathematics Department',
            'description' => 'A lot of contests than any other subject'
        ]);

        $this->assertCount(1, Department::all());

        $department = Department::first();

        $this->assertEquals('Mathematics Department', $department->name);
    }
}
