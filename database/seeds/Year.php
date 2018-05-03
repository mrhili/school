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
            'name' => '2018/2019',
            'min' => 2018,
            'max' => 2019
        ]);        
    }
}
