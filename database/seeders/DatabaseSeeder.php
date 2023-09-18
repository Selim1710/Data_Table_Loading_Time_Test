<?php

namespace Database\Seeders;

use App\Models\DataTable;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    
    public function run()
    {
        \App\Models\User::factory(10000)->create();
    }
}
