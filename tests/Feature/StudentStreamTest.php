<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Student;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StudentStreamTest extends TestCase
{
    use RefreshDatabase;

    public function setUp():void 
    {
        parent::setUp();

        $this->artisan('db:seed --class=LevelsTableSeeder');
        $this->artisan('db:seed --class=StreamsTableSeeder');
    }

    /** @group students */
    public function test_student_stream_relationship_works()
    {
        //Create student
        $student = Student::factory()->create();

        $this->assertNotNull($student->stream);
    }
}
