<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        \App\Models\User::truncate();

        //\App\Models\User::factory(10)->create();
        \App\Models\User::insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => \Hash::make('passwordadmin'),
            'admine_id' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' =>date('Y-m-d H:i:s')
        ]);

        \App\Models\User::insert([
            'name' => 'normal',
            'email' => 'normal@gmail.com',
            'password' => \Hash::make('passwordnormal'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' =>date('Y-m-d H:i:s')
        ]);

        \App\Models\Item::factory(100)->create();
            
    }
}
