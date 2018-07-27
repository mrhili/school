<?php

use Illuminate\Database\Seeder;

class SchoolconfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('schoolconfigs')->insert([
            'slug' => 'price-month-primary',
            'nameSetting' => 'Price monthly for primary school',
            'value' => '350',
            'type' => 'number',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('schoolconfigs')->insert([
            'slug' => 'price-saving-primary',
            'nameSetting' => 'Price saving for primary school',
            'value' => '250',
            'type' => 'number',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('schoolconfigs')->insert([
            'slug' => 'price-assurence-primary',
            'nameSetting' => 'Price assurence for primary school',
            'value' => '250',
            'type' => 'number',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('schoolconfigs')->insert([
            'slug' => 'min-price-monthly-trans',
            'nameSetting' => 'Price minimum monthly for transport',
            'value' => '200',
            'type' => 'number',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('schoolconfigs')->insert([
            'slug' => 'min-price-assurence-trans',
            'nameSetting' => 'Price minimum assurence for transport',
            'value' => '200',
            'type' => 'number',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('schoolconfigs')->insert([
            'slug' => 'price-add-courses',
            'nameSetting' => 'Price  for additional courses',
            'value' => '100',
            'type' => 'number',
            'created_at' => date('Y-m-d H:i:s'),
        ]);


    }
}
