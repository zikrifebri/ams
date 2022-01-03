<?php

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
        $this->call(usersSeeder::class);
        $this->call(departementSeeder::class);
        $this->call(smSeeder::class);
        $this->call(skSeeder::class);
    }
}
