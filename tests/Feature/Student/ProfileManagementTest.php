<?php

namespace Tests\Feature\Student;

use Tests\TestCase;
use App\Models\Student;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProfileManagementTest extends TestCase
{
    use RefreshDatabase;

    public function setUp() : void
    {
        parent::setUp();
        $this->artisan('db:seed --class=LevelsTableSeeder');
        $this->artisan('db:seed --class=StreamsTableSeeder');
    }
    
    /** @group students */
    public function test_a_student_should_be_able_to_view_own_profile()
    {
        //Arrange
        $this->withoutExceptionHandling();
        $student = Student::factory()->create();
        $this->be($student, 'student');

        //Act
        $response = $this->get(route('student.me.profile.show'));


        //Assert
        $response->assertOk();
        $response->assertViewIs('student.profile');
    }
}
