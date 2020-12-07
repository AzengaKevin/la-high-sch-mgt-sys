<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    /** @group login */
    public function test_login_screen_can_be_rendered()
    {
        $response = $this->get('/login');
        
        $response->assertStatus(200);
    }
    
    /** @group login */
    public function test_users_can_authenticate_using_the_login_screen()
    {
        $user = User::factory()->create();
        
        $response = $this->post('/login', [
            'login' => $user->email,
            'password' => 'password',
        ]);
            
        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::HOME);
    }
        
    /** @group login */
    public function test_users_can_not_authenticate_with_invalid_password()
    {
        $user = User::factory()->create();

        $this->post('/login', [
            'login' => $user->email,
            'password' => 'wrong-password',
        ]);

        $this->assertGuest();
    }

    /** @group login */
    public function test_student_can_login_using_the_login_screen()
    {
        //Arrange
        $this->artisan('db:seed --class=StreamsTableSeeder');
        $this->artisan('db:seed --class=LevelsTableSeeder');
        $student = Student::factory()->create();

        //Act
        $response = $this->post(route('login'), [
            'login' => $student->admission_number,
            'password' => 'password',
        ]);
            
        //Assert
        $this->assertNotNull(Auth::guard('student')->user());
        $response->assertRedirect(route('student.dashboard'));
    }
}
