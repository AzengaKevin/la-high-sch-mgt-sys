<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Subject;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SubjectCrudTest extends TestCase
{
    use RefreshDatabase;
    
    /** @group subjects */
    public function test_a_subject_can_be_created()
    {
        //Arrange
        $this->artisan('db:seed --class=DepartmentSeeder');

        //Act
        Subject::create([
            'name' => 'Mathematics',
            'slug' => 'maths',
            'department_id' => (rand() % 6) + 1,
            'description' => 'My favourite',
        ]);

        //Assert
        $this->assertCount(1, Subject::all());

        $subject = Subject::first();

        $this->assertEquals('Mathematics', $subject->name);
        $this->assertEquals('maths', $subject->slug);
    }
}
