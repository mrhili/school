<?php

use Illuminate\Database\Seeder;

class EtagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('etages')->insert([
            'number' => 0,
        ]);
        DB::table('etages')->insert([
            'number' => 1,
        ]);
        DB::table('etages')->insert([
            'number' => 2,
        ]);
        DB::table('etages')->insert([
            'number' => 3,
        ]);
    }
}
