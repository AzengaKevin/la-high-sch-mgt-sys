<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('levels')->insert([
            [
                'numeric' => 1,
                'slug' => 'one',
                'name' => 'One'
            ],
            [
                'numeric' => 2,
                'slug' => 'two',
                'name' => 'Two'
            ],
            [
                'numeric' => 3,
                'slug' => 'three',
                'name' => 'Three'
            ],
            [
                'numeric' => 4,
                'slug' => 'four',
                'name' => 'Four'
            ],
        ]);
    }
}
