<?php

use Illuminate\Database\Seeder;

class FournitureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*




        $table->float('average_price')->nullable();
        $table->smallInteger('got')->default(0)->unsigned();
        $table->timestamps();

        */
        DB::table('fournitures')->insert([
            'name' => 'Stylo bleu',
            'for' => 'Ecriture',
            'required' => true,
            'average_price' => 1.5,
            'got' => 100
        ]);
        DB::table('fournitures')->insert([
            'name' => 'Stylo vert',
            'for' => 'Ecriture',
            'required' => true,
            'average_price' => 1.5,
            'got' => 1000
        ]);
        DB::table('fournitures')->insert([
            'name' => 'Stylo noire',
            'for' => 'Ecriture',
            'required' => false,
            'average_price' => 1.5,
            'got' => 0
        ]);
    }
}
