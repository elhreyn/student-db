<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        // Example courses to seed
        Course::create([
            'name' => 'Math 101',
            'description' => 'Introduction to Mathematics',
        ]);

        Course::create([
            'name' => 'History 101',
            'description' => 'Introduction to History',
        ]);

        Course::create([
            'name' => 'Science 101',
            'description' => 'Introduction to Science',
        ]);
    }
}