<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;
use App\Models\Course;
class EnrollmentSeeder extends Seeder
{
    public function run(): void
    {
        $students = Student::all();
        $courses = Course::all();

        if ($students->count() > 0 && $courses->count() > 0) {
            foreach ($students as $student) {
                $student->courses()->attach(
                    $courses->random(2)->pluck('id')->toArray(), // Attach random 2 courses for each student
                    ['enrolled_at' => now()]
                );
            }
        } else {
            echo "No courses or students found. Skipping enrollments.\n";
        }
    }
}