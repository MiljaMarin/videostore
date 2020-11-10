<?php

namespace Database\Seeders;

use App\Models\Todos;
use Illuminate\Database\Seeder;

class TodosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Todos::factory()
            ->count(10)
            ->create();
    }
}



