<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class AdminExterneTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins_externe')->insert([
            'full_name' => "Ahmed Salhi",
            'email' => "as@gmail.com",
            'password' => bcrypt('Wassef.007')
        ]);
    }
}
