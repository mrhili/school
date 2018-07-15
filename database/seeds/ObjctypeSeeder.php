<?php

use Illuminate\Database\Seeder;

class ObjctypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('objctypes')->insert([
            'name' => 'Table deux personne'
        ]);

        DB::table('objctypes')->insert([
            'name' => 'Tableaux noire'
        ]);

        DB::table('objctypes')->insert([
            'name' => 'Imprimante canon ir2420'
        ]);
        DB::table('objctypes')->insert([
            'name' => 'Chaise blanche'
        ]);
        DB::table('objctypes')->insert([
            'name' => 'Buraux'
        ]);
        DB::table('objctypes')->insert([
            'name' => 'Chaise de fer'
        ]);
        DB::table('objctypes')->insert([
            'name' => 'Histoire'
        ]);
        

    }
}
