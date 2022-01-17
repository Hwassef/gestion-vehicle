<?php

namespace Database\Seeders;

use App\Models\AdminExterne;
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
        $this->call(AdminTableSeeder::class);
        //$this->call(LocalitiesTableSeeder::class);
        // $this->call(AdminExterneTableSeeder::class);
    }
}
