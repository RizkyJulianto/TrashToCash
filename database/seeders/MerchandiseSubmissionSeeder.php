<?php

namespace Database\Seeders;

use App\Models\Merchandise;
use App\Models\MerchandiseSubmission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MerchandiseSubmissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         MerchandiseSubmission::factory()->count(5)->create();
    }
}
