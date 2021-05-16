<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class categorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $date = date('Y-m-d H:i:s');
        $data = [
            ['name' => 'Oganic', 'parent_id' => '2' , 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Meat', 'parent_id' => '2' , 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Vegetable', 'parent_id' => '2' , 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Hamburger', 'parent_id' => '2' , 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Pizza', 'parent_id' => '1' , 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Drink', 'parent_id' => '1' , 'created_at' => $date, 'updated_at' => $date],
            
        ];

        DB::table('categories')->insert($data);
    }
}

