<?php

namespace Tests\Feature\Admin;

use Tests\TestCase;
use App\Models\User;
use App\Models\Level;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LevelCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_level_can_be_create()
    {
        //Act
        Level::create([
            'numeric' => 1,
            'slug' => 'one',
            'name' => 'One'
        ]);

        //Asserttions
        $this->assertCount(1, Level::all());

        $level = Level::first();

        $this->assertEquals(1, $level->numeric);
        $this->assertEquals('one', $level->slug);
        $this->assertEquals('One', $level->name);
    }
}
