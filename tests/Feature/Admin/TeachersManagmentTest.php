<?php

namespace Tests\Feature\Admin;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TeachersManagmentTest extends TestCase
{
    use RefreshDatabase;

    public function setUp() : void
    {
        parent::setUp();

        $this->be(User::factory()->create());
    }

    /** @group teachers */
    public function test_admin_can_browse_teachers()
    {
        //Arrange
        $this->withoutExceptionHandling();
        $this->artisan('db:seed --class=TeacherSeeder');

        //Act 
        $response = $this->get(route('admin.teachers.index'));

        //Assert
        $response->assertOk();
        $response->assertViewIs('admin.teachers.index');
        $response->assertViewHas('teachers');
    }
}
