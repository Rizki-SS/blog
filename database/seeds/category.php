<?php

use App\Category as AppCategory;
use Illuminate\Database\Seeder;

class category extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = AppCategory::create([
            'name' => 'Tech'
        ]);
    }
}
