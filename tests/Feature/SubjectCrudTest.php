<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Subject;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SubjectCrudTest extends TestCase
{
    use RefreshDatabase;
    
    /** @group subjects */
    public function test_a_subject_can_be_created()
    {
        Subject::create([
            'name' => 'Mathematics',
            'slug' => 'maths',
            'description' => 'My favourite',
        ]);

        $this->assertCount(1, Subject::all());

        $subject = Subject::first();

        $this->assertEquals('Mathematics', $subject->name);
        $this->assertEquals('maths', $subject->slug);
    }
}
