<?php

namespace IdentSpace\Ticky\Support\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use IdentSpace\Ticky\Models\TickyCategory;

class TickySeeder extends Seeder
{
    public function run(): void
    {
        TickyCategory::create([
            "name" => "Allgemeines"
        ]);
    }
}
