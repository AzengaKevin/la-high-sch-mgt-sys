<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Subject;
use App\Models\Department;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SubjectDepartmentTest extends TestCase
{
    use RefreshDatabase;

    /** @group subjects */
    public function test_subjects_department_relationship_works_well()
    {

        //Arrange
        $this->artisan('db:seed --class=DepartmentSeeder');

        //Act        
        $subject = Subject::create([
            'name' => 'Mathematics',
            'slug' => 'maths',
            'department_id' => (rand() % 6) + 1,
            'description' => 'My favourite'
        ]);

        $this->assertNotNull($subject->department);

        
    }

    /** @test departments */
    public function test_department_subjectsrelationship_works_well()
    {
        //Arrange
        $department = Department::create(['name' => 'Mathematics']);

        //Act        
        $department->subjects()->create([
            'name' => 'Mathematics',
            'slug' => 'maths',
            'department_id' => (rand() % 6) + 1,
            'description' => 'My favourite'
        ]);

        $this->assertCount(1, $department->subjects);
    }
}
