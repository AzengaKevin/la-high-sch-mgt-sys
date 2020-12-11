<?php

namespace Tests\Feature\Student;

use Tests\TestCase;
use App\Models\Student;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProfileManagementTest extends TestCase
{
    use RefreshDatabase;

    private $student;

    public function setUp() : void
    {
        parent::setUp();
        $this->artisan('db:seed --class=LevelsTableSeeder');
        $this->artisan('db:seed --class=StreamsTableSeeder');
        $this->be($this->student = Student::factory()->create(), 'student');
    }
    
    /** @group students */
    public function test_a_student_should_be_able_to_view_own_profile()
    {
        //Arrange
        $this->withoutExceptionHandling();

        //Act
        $response = $this->get(route('student.me.profile.show'));

        //Assert
        $response->assertOk();
        $response->assertViewIs('student.profile');
        $response->assertViewHas('student');
    }

    /** @group students */
    public function test_a_student_can_update_own_name()
    {
        //Arrange
        $this->withoutExceptionHandling();

        //Act
        $response = $this->patch(route('student.me.profile.update'), [
            'name' => 'John Doe'
        ]);


        //Assert
        $student = Student::first();
        $this->assertEquals('John Doe', $student->name);
        $response->assertRedirect(route('student.me.profile.show'));
    }


    /** @group students */
    public function test_student_can_school_details()
    {
        
        $this->withoutExceptionHandling();

        $response = $this->get(route('student.me.details.show'));

        $response->assertViewIs('student.details');

        $response->assertViewHas('student');

    }
}
