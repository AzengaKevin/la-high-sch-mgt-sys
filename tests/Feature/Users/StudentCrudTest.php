<?php

namespace Tests\Feature\Users;

use Tests\TestCase;
use App\Models\User;
use App\Models\Student;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StudentCrudTest extends TestCase
{
    use RefreshDatabase;

    public function setUp():void 
    {
        parent::setUp();

        //Arrange
        $this->artisan('db:seed');
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_a_student_can_be_created()
    {
        //Arrange
        $studentData = Student::factory()->make()->toArray();
        
        //Act
        Student::create($studentData);

        //Assert
        $this->assertCount(1, Student::all());

        //Get the frst student
        $student = Student::first();

        $this->assertEquals($studentData['name'], $student->name);
        $this->assertEquals($studentData['admission_number'], $student->admission_number);
        $this->assertEquals($studentData['join_level_id'], $student->join_level_id);
        $this->assertEquals($studentData['stream_id'], $student->stream_id);
        // $this->assertEquals($studentData['dob'], $student->dob->format('Y-m-d'));
        $this->assertNotNull($student->dob);
        // $this->assertEquals($studentData['join_date'], $student->join_date->format('Y-m-d'));
        $this->assertNotNull($student->join_date);
        $this->assertEquals($studentData['kcpe_marks'], $student->kcpe_marks);
        $this->assertEquals($studentData['kcpe_grade'], $student->kcpe_grade);
    }
}
