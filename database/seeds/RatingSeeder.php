<?php

use Illuminate\Database\Seeder;

class RatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('ratings')->insert([
            'star' => 0
        ]);
        DB::table('ratings')->insert([
            'star' => 0.5
        ]);
        DB::table('ratings')->insert([
            'star' => 1
        ]);
        DB::table('ratings')->insert([
            'star' => 1.5
        ]);
        DB::table('ratings')->insert([
            'star' => 2
        ]);
        DB::table('ratings')->insert([
            'star' => 2.5
        ]);
        DB::table('ratings')->insert([
            'star' => 3
        ]);
        DB::table('ratings')->insert([
            'star' => 3.5
        ]);
        DB::table('ratings')->insert([
            'star' => 4
        ]);
        DB::table('ratings')->insert([
            'star' => 4.5
        ]);
        DB::table('ratings')->insert([
            'star' => 5
        ]);

    }
}
