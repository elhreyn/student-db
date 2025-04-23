<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        // Use firstOrCreate to avoid duplicates based on email
        Student::firstOrCreate([
            'email' => 'john.doe@example.com',
        ], [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'address' => '1234 Main St',
        ]);

        Student::firstOrCreate([
            'email' => 'jane.smith@example.com',
        ], [
            'first_name' => 'Jane',
            'last_name' => 'Smith',
            'address' => '5678 Elm St',
        ]);

        Student::firstOrCreate([
            'email' => 'alice.johnson@example.com',
        ], [
            'first_name' => 'Alice',
            'last_name' => 'Johnson',
            'address' => '91011 Oak St',
        ]);
    }
}
