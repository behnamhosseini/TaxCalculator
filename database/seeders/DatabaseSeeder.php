<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\State;
use App\Models\County;
use App\Models\CountyIncome;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $d=State::factory()
        ->count(50)
        ->has(
            County::factory()
            ->has(CountyIncome::factory())
        )->create();
    }
}
