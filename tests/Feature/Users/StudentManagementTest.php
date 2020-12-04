<?php

namespace Tests\Feature\Users;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StudentManagementTest extends TestCase
{
    use RefreshDatabase;
     
    public function setUp():void 
    {
        parent::setUp();

        $this->artisan('db:seed');
    }
    
    /** @group students */
    public function test_user_can_browse_all_students()
    {
        //Arrange
        $this->withoutExceptionHandling();
        $this->be(User::factory()->create());

        //Act
        $response = $this->get(route('user.students.index'));

        //Assert
        $response->assertOk();
        $response->assertViewIs('user.students.index');
        $response->assertViewHas('students');
    }
}
