<?php

use Illuminate\Database\Seeder;

class CategoryshipSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('categoryships')->insert([
            'name' => 'Père'
        ]);
        DB::table('categoryships')->insert([
            'name' => 'Mère'
        ]);
        DB::table('categoryships')->insert([
            'name' => 'Grand Père'
        ]);
        DB::table('categoryships')->insert([
            'name' => 'Grand Mère'
        ]);
        DB::table('categoryships')->insert([
            'name' => 'Tante'
        ]);
        DB::table('categoryships')->insert([
            'name' => 'Oncle'
        ]);
        DB::table('categoryships')->insert([
            'name' => 'Frère'
        ]);
        DB::table('categoryships')->insert([
            'name' => 'Soeur'
        ]);
        DB::table('categoryships')->insert([
            'name' => 'Cousin'
        ]);
        DB::table('categoryships')->insert([
            'name' => 'Cousine'
        ]);
        DB::table('categoryships')->insert([
            'name' => 'Autre'
        ]);

    }
}
