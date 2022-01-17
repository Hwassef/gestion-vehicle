<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'full_name' => "Hassine Wassef",
            'email' => "hw@gmail.com",
            'password' => bcrypt('hw')
        ]);
    }
}
