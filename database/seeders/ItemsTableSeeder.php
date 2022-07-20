<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Item;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 
        \App\Models\Item::factory()->count(20)->create();

    }
}
