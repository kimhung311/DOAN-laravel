<?php

namespace Database\Seeders;

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
        \App\Models\User::factory(10)->create();
        $this->call(categorySeeder::class);
        // de em tao vidu 1 cai category_name
        \App\Models\Admin::factory(10)->create();
        $this->call(RoleSeeder::class);
        
        
    }
}
