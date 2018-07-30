<?php

use Illuminate\Database\Seeder;

class Year extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('years')->insert([
            'name' => '2017/2018',
            'min' => 2017,
            'max' => 2018
        ]);
        DB::table('years')->insert([
            'name' => '2017/2018',
            'min' => 2018,
            'max' => 2019
        ]);
    }
}
