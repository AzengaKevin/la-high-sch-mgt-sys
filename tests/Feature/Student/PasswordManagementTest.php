<?php

namespace Tests\Feature\Student;

use Tests\TestCase;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PasswordManagementTest extends TestCase
{
    use RefreshDatabase;

    public function setUp() : void
    {
        parent::setUp();
        $this->artisan('db:seed --class=LevelsTableSeeder');
        $this->artisan('db:seed --class=StreamsTableSeeder');
    }    
   
    /** @group students */
    public function test_student_can_update_own_password()
    {
        //Arrange
        //$this->withoutExceptionHandling();
        $student = Student::factory()->create();
        $this->be($student, 'student');
                
        //Act
        $response = $this->patch(route('student.me.password.update'), [
            'current_password' => 'password',
            'password' => 'elephant69',
            'password_confirmation' => 'elephant69',
        ]);

        $student = Student::first();

        $this->assertNotNull($student->password);

        //Assert
        $this->assertTrue(Hash::check('elephant69', $student->password));

        $response->assertRedirect(route('student.me.profile.show'));
    }
}
