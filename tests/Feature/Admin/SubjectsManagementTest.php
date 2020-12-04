<?php

namespace Tests\Feature\Admin;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SubjectsManagementTest extends TestCase
{
    use RefreshDatabase;

    private $user = null;

    public function setUp(): void
    {
        parent::setUp();

        $this->be($this->user = User::factory()->create());
    }
    
    /** @group departments */
    public function test_admin_can_browse_all_subjects()
    {
        //Arrange
        $this->artisan('db:seed --class=DepartmentSeeder');
        $this->artisan('db:seed --class=SubjectsSeeder');

        //Act
        $response = $this->get(route('admin.subjects.index'));

        //Assert
        $response->assertOk();
        $response->assertViewIs('admin.subjects.index');
        $response->assertViewHas('subjects');
    }
}
