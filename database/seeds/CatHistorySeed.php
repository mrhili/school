<?php

use Illuminate\Database\Seeder;

class CatHistorySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('history_categories')->insert([
            'name' => 'Payement d\'un éleve :',
            'model' => 'User'
        ]);

        DB::table('history_categories')->insert([
            'name' => 'Enregistrement d\'un éleve :',
            'model' => 'User'
        ]);

    }
}
