<?php

namespace Tests\Feature\Admin;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DepartmentManagementTest extends TestCase
{
    use RefreshDatabase;

    private $user = null;

    public function setUp(): void
    {
        parent::setUp();

        $this->be($this->user = User::factory()->create());
    }
    
    /** @group departments */
    public function test_admin_can_browse_all_departments()
    {
        //Arrange
        $this->artisan('db:seed --class=DepartmentSeeder');

        //Act
        $response = $this->get(route('admin.departments.index'));

        //Assert
        $response->assertOk();
        $response->assertViewIs('admin.departments.index');
        $response->assertViewHas('departments');
    }
}
