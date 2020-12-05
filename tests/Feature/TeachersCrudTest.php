<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Teacher;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TeachersCrudTest extends TestCase
{
    use RefreshDatabase;
    
    /** @group teachers */
    public function test_a_teacher_can_successfully_be_created()
    {
        //Arrange 

        //Get the teacher data
        $teacherData = Teacher::factory()->make()->toArray();

        //Act
        Teacher::create($teacherData);

        //Assert
        $this->assertCount(1, Teacher::all());

        $teacher = Teacher::first();

        $this->assertEquals($teacherData['name'], $teacher->name);
        $this->assertEquals($teacherData['phone'], $teacher->phone);
        $this->assertEquals($teacherData['tsc_number'], $teacher->tsc_number);
        $this->assertEquals($teacherData['email'], $teacher->email);

    }
}
