<?php

namespace Tests\Feature\Admin;

use Tests\TestCase;
use App\Models\User;
use App\Models\Level;
use App\Models\Stream;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TeacherClassesManagementTest extends TestCase
{
    use RefreshDatabase;

    private ?User $user = null;

    public function setUp() : void
    {
        parent::setUp();

        $this->be($this->user = User::factory()->create());
    }

    /** @group teachers-classes */
    public function test_admin_can_assign_class_to_a_teacher()
    {
        //Arrange
        $this->withoutExceptionHandling();
        $this->artisan('db:seed');
        
        $teacher = Teacher::first();
        $level = Level::first();
        $subject = Subject::first();
        $stream = Stream::first();

        //Act
        $response = $this->post(route('admin.teachers.lestrsus.store', $teacher), [
            'level_id' => $level->id,
            'stream_id' => $stream->id,
            'subject_id' => $subject->id,
        ]);

        //Assert
        $this->assertCount(1, $teacher->lestrsus);     
    }
    
}
