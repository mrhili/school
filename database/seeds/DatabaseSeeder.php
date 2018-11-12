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
        $this->call(SchoolconfigSeeder::class);

        $this->call(EtagesSeeder::class);
        $this->call(RoomtypesSeeder::class);
        $this->call(RoomsSeeder::class);
        $this->call(ObjctypeSeeder::class);

        $this->call(RatingSeeder::class);

        $this->call(CatHistorySeed::class);
        $this->call(TheClass::class);
        $this->call(Month::class);
        $this->call(Year::class);
        $this->call(CategoryshipSeed::class);
        $this->call(FournitureSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(UnitySubunitySeeder::class);


        $this->call(CMSeeder::class);

        $this->call(VideoSeeder::class);
    }
}
