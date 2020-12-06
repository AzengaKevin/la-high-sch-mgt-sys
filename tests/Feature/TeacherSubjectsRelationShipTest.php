<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TeacherSubjectsRelationShipTest extends TestCase
{

    use RefreshDatabase;

    /** @group teachers */
    public function test_teacher_subject_relationship()
    {
        //Arrange
        $this->artisan('db:seed --class=SubjectsSeeder');
        $this->artisan('db:seed --class=TeacherSeeder');

        $teacher = Teacher::first();
        $subjects = Subject::whereIn('slug', ['maths', 'comp'])->get();

        //Act
        $teacher->subjects()->attach($subjects);

        //Assert
        $this->assertCount(2, $teacher->subjects);

    }


    /** @group teachers */
    public function test_subject_teacher_relationship()
    {
        //Arrange
        $this->artisan('db:seed --class=SubjectsSeeder');
        $this->artisan('db:seed --class=TeacherSeeder');

        $subject = Subject::first();
        $teachers = Teacher::findMany([1,7]);

        //Act
        $subject->teachers()->attach($teachers);

        //Assert
        $this->assertCount(2, $subject->teachers);

    }    
}
