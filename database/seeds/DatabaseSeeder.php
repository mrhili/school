<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         
        $this->call(ConfigSeeder::class);
        $this->call(CatHistorySeed::class);
        $this->call(TheClass::class);
        $this->call(Month::class);
        $this->call(Year::class);
        $this->call(CategoryshipSeed::class);
        $this->call(UsersTableSeeder::class);
        $this->call(SubjectSeeder::class);
    }
}
