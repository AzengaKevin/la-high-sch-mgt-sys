<?php

namespace Tests\Feature\Users;

use Tests\TestCase;
use App\Models\User;
use App\Models\Student;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StudentManagementTest extends TestCase
{
    use RefreshDatabase;
     
    public function setUp():void 
    {
        parent::setUp();

        $this->be(User::factory()->create());

    }
    
    /** @group students */
    public function test_user_can_browse_all_students()
    {
        //Arrange
        $this->withoutExceptionHandling();
        $this->artisan('db:seed');

        //Act
        $response = $this->get(route('user.students.index'));

        //Assert
        $response->assertOk();
        $response->assertViewIs('user.students.index');
        $response->assertViewHas('students');
    }

    /** @group students */
    public function test_user_can_view_create_student_page()
    {
        //Arrange
        $this->withoutExceptionHandling();

        //Act
        $response = $this->get(route('user.students.create'));

        //Assert
        $response->assertOk();
        $response->assertViewIs('user.students.create');
        $response->assertViewHasAll(['streams', 'levels']);
    }

    /** @group students */
    public function test_user_can_create_a_student()
    {
        //Arrange
        $this->artisan('db:seed --class=LevelsTableSeeder');
        $this->artisan('db:seed --class=StreamsTableSeeder');

        $studentData = Student::factory()->make()->toArray();

        unset($studentData['password']);

        //Act
        $response = $this->post(route('user.students.store', $studentData));

        //Assert
        $this->assertCount(1, Student::all());
        $this->assertEquals($studentData['admission_number'], Student::first()->admission_number);

        $response->assertRedirect(route('user.students.index'));
    }

    /** @group students */
    public function test_all_student_fields_are_required()
    {
        
        //Arrange
        $this->artisan('db:seed --class=LevelsTableSeeder');
        $this->artisan('db:seed --class=StreamsTableSeeder');

        $studentData = Student::factory()->make()->toArray();

        unset($studentData['password']);

        $fields = [
            'name', 'admission_number', 'stream_id', 'kcpe_marks', 
            'kcpe_grade', 'dob', 'join_level_id'
        ];

        foreach ($fields as $field) {
            //Act
            $response = $this->post(
                route('user.students.store', array_merge(
                    $studentData,
                    [$field => null]  
                ))
            );

            //Assert
            $response->assertSessionHasErrors($field);
        }
    }

    /** @group students */
    public function test_user_can_see_student_edit_page()
    {
        //Arrange
        $this->withoutExceptionHandling();
        
        //Arrange
        $this->artisan('db:seed --class=LevelsTableSeeder');
        $this->artisan('db:seed --class=StreamsTableSeeder');

        $student = Student::factory()->create();

        //Act
        $response = $this->get(route('user.students.edit', $student));

        //Assert
        $response->assertOk();
        $response->assertViewIs('user.students.edit');
        $response->assertViewHasAll(['streams', 'levels', 'student']);

    }
}
