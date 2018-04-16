<?php

use Illuminate\Database\Seeder;

class TheClass extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('the_classes')->insert([
            'name' => 'CP-1'
        ]);

        DB::table('the_classes')->insert([
            'name' => 'CE1-1'
        ]);

        DB::table('the_classes')->insert([
            'name' => 'CE2-1'
        ]);

        DB::table('the_classes')->insert([
            'name' => 'CM1-1'
        ]);

        DB::table('the_classes')->insert([
            'name' => 'CmM2-1'
        ]);

        DB::table('the_classes')->insert([
            'name' => 'CE6-1'
        ]);

    }
}
