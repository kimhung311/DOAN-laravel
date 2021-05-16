<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = date('Y-m-d H:i:s');
        $data = [
            ['name' => 'Admin', 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Editor', 'created_at' => $date, 'updated_at' => $date],
        ];

        DB::table('roles')->insert($data);
    }
}
