<?php

use Illuminate\Database\Seeder;

class Month extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('months')->insert([
            'name' => 'January'
        ]);
        DB::table('months')->insert([
            'name' => 'February'
        ]);
        DB::table('months')->insert([
            'name' => 'March'
        ]);
        DB::table('months')->insert([
            'name' => 'April'
        ]);
        DB::table('months')->insert([
            'name' => 'May'
        ]);
        DB::table('months')->insert([
            'name' => 'June'
        ]);
        DB::table('months')->insert([
            'name' => 'July'
        ]);

        DB::table('months')->insert([
            'name' => 'August'
        ]);

        DB::table('months')->insert([
            'name' => 'September'
        ]);

        DB::table('months')->insert([
            'name' => 'October'
        ]);

        DB::table('months')->insert([
            'name' => 'November'
        ]);

        DB::table('months')->insert([
            'name' => 'December'
        ]);

        DB::table('months')->insert([
            'name' => 'Enregistrement'
        ]);

        DB::table('months')->insert([
            'name' => 'Assurance'
        ]);

        DB::table('months')->insert([
            'name' => 'Assurance trasport'
        ]);

    }
}
