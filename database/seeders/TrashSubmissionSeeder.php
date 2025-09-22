<?php

namespace Database\Seeders;

use App\Models\TrashSubmission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TrashSubmissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         TrashSubmission::factory()->count(5)->create();
    }
}
