<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subjects')->insert([
            [
                'name' => 'Mathematics',
                'slug' => 'maths',
                'department_id' => (rand() % 6) + 1,
                'description' => 'My best',
            ],
            [
                'name' => 'English',
                'slug' => 'eng',
                'department_id' => (rand() % 6) + 1,
                'description' => 'Awesome',
            ],
            [
                'name' => 'Kiswahili',
                'slug' => 'kisw',
                'department_id' => (rand() % 6) + 1,
                'description' => 'Got to know it in subsaharan Africa',
            ],
            [
                'name' => 'Physics',
                'slug' => 'phyc',
                'department_id' => (rand() % 6) + 1,
                'description' => 'Cool tables and normalization',
            ],
            [
                'name' => 'Biology',
                'slug' => 'bio',
                'department_id' => (rand() % 6) + 1,
                'description' => 'Living things',
            ],
            [
                'name' => 'Chemestry',
                'slug' => 'chem',
                'department_id' => (rand() % 6) + 1,
                'description' => 'All about checmical formular, periodic table and what have you',
            ],
            [
                'name' => 'Geography',
                'slug' => 'geog',
                'department_id' => (rand() % 6) + 1,
                'description' => 'The study of earth and whatever is in it',
            ],
            [
                'name' => 'History',
                'slug' => 'histo',
                'department_id' => (rand() % 6) + 1,
                'description' => 'Politicing',
            ],
            [
                'name' => 'Business',
                'slug' => 'bus',
                'department_id' => (rand() % 6) + 1,
                'description' => 'All you need to know about maoney and more money',
            ],
            [
                'name' => 'Agriculture',
                'slug' => 'agric',
                'department_id' => (rand() % 6) + 1,
                'description' => 'Study of the backbone of Kenya',
            ],
            [
                'name' => 'Computer',
                'slug' => 'comp',
                'department_id' => (rand() % 6) + 1,
                'description' => 'What am doing now',
            ],
            [
                'name' => 'Power Mechanics',
                'slug' => 'power',
                'department_id' => (rand() % 6) + 1,
                'description' => 'Motors, Engine and kinda stuff',
            ],
            [
                'name' => 'Christian Religous Education',
                'slug' => 'cre',
                'department_id' => (rand() % 6) + 1,
                'description' => 'The bible is the main theme',
            ],
            [
                'name' => 'Music',
                'slug' => 'music',
                'department_id' => (rand() % 6) + 1,
                'description' => 'Hey, can you sing, do you wanna sing and play piano, doremifasolatido',
            ],
        ]);
    }
}
